<?php 
session_start();
include('../../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../css/w3.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">


<?php
/*
0 = Cash
1 = VIP
2 = Government
3 = COD
4 = X-Deal
5 = Regular
*/

switch($_REQUEST['sort'])
{ 
	case "all": 		 $s="select * from m_sales_clients"; break;
	
	case "cash": 		 $s="select * from m_sales_clients where vip=0"; break;
	case "vip": 		 $s="select * from m_sales_clients where vip=1"; break;
	case "government": 	 $s="select * from m_sales_clients where vip=2"; break;
	case "COD": 		 $s="select * from m_sales_clients where vip=3"; break;
	case "X-Deal": 		 $s="select * from m_sales_clients where vip=4"; break;
	case "Regular": 	 $s="select * from m_sales_clients where vip=5"; break;	
	case "terms": 		 $s="select * from m_sales_clients where terms!=0"; break;
	case "credit_limit": $s="select * from m_sales_clients where credit_limit!=0"; break;
	case "no_jobs": 	 $s="select * from m_sales_clients where empty_jo=0"; break;
}	

$q=mysqli_query($conn, $s) or die(mysqli_error($conn));
$r=mysqli_fetch_assoc($q);
echo "<br/><div class='container'>";

		echo "<form class='w3-tiny'>";
			echo "<select name='sort'>";
				echo "<option disabled selected>".$_REQUEST['sort']."</option>";
				echo "<option>all</option>";
				
				echo "<option>cash</option>";
				echo "<option>vip</option>";
				echo "<option>government</option>";
				echo "<option>COD</option>";
				echo "<option>X-Deal</option>";
				echo "<option>Regular</option>";
				
				echo "<option>terms</option>";
				echo "<option>credit_limit</option>";
				echo "<option>no_jobs</option>";
			echo "</select>";
			echo "<input type='submit' value='SORT'>";
		echo "</form>";

echo "<table border='1'>
		<tr class='w3-gray'>
			<td>#</td>
			<td>client_id</td>
			<td>name</td>
			<td>mobile</td>
			<td>telno</td>
			<td>contact_person</td>
			<td>email</td>
			<td>address</td>
			<td>add_by</td>
			<td>add_date</td>
			<td>vip</td>
			<td>terms</td>
			<td>credit_limit</td>
		</tr>";
$x=1;
do{
	echo "<tr>";
	echo "<td class='w3-text-orange'>".$x++."</td>";
	echo "<td>".$r['client_id']."</td>";
	echo "<td>".$r['name']."</td>";
	echo "<td>".$r['mobile']."</td>";
	echo "<td>".$r['telno']."</td>";
	echo "<td>".$r['contact_person']."</td>";
	echo "<td>".$r['email']."</td>";
	echo "<td>".$r['address']."</td>";
	echo "<td>".$r['add_by']."</td>";
	echo "<td>".$r['add_date']."</td>";
	echo "<td>".$r['vip']."</td>";
	echo "<td align='center'>".$r['terms']."</td>";
	echo "<td align='right'>".number_format($r['credit_limit'],2)."</td></tr>";
}while($r=mysqli_fetch_assoc($q));
echo "</table>";
?>