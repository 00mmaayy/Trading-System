<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">

<?php
include('../m_settings/access.php');

$s1=mysqli_query($conn, "select * from special_job where po_name='".$_REQUEST['po_name']."'") or die(mysqli_error($conn));
$r1=mysqli_fetch_assoc($s1);
$x=1;

		$s_po_name=$_REQUEST['po_name'];
		
		$s_po_amount="select ( select sum(qty_order*unit_cost) from special_job where po_name='$s_po_name') as po_amount,
							 ( select sum(qty_dr*supplier_cost) from special_job where po_name='$s_po_name') as supplier_amount,
							 ( select sum(qty_dr*unit_cost) from special_job where po_name='$s_po_name') as dr_amount
					  ";
		$q_po_amount=mysqli_query($conn, $s_po_amount) or die(mysqli_error($conn));
		$r_po_amount=mysqli_fetch_assoc($q_po_amount);
		

echo "<br/><div class='w3-container'>";
		
	if($access['d5']==1){	
		if(isset($_REQUEST['editing_enabled']))
			{
				echo "<a href='podetails.php?po_name=".$_REQUEST['po_name']."'>DISABLE P.O. UPDATING</a>";
			}
		else{ echo "<a href='podetails.php?po_name=".$_REQUEST['po_name']."&editing_enabled=1'>ENABLE P.O. UPDATING</a>"; }
	}
		
		
echo "<table class='w3-table w3-small' border='1'>
		<tr>";
		
			$x1 = $r_po_amount['dr_amount'];
			$total = $r_po_amount['po_amount'];
			$percentage = ($x1*100)/$total;
			
	  echo "<td colspan='19'>
		
				<b>PO NO: ".$_REQUEST['po_name']."</b> &nbsp;|&nbsp; 
				<b>DELIVERY: ".number_format($percentage,2)." %</b> &nbsp;|&nbsp; 
				<b>PO AMOUNT: ".number_format($r_po_amount['po_amount'],2)."</b> &nbsp;|&nbsp; 
				<b>SUPPLIER AMOUNT: ".number_format($r_po_amount['supplier_amount'],2)."</b> &nbsp;|&nbsp; ";
				
		if($access['d6']==1)
		{	
		  echo "<b>DIFFERENCE: ".number_format($r_po_amount['po_amount']-$r_po_amount['supplier_amount'],2)."</b> &nbsp;|&nbsp; ";
			
				$x2 = $r_po_amount['po_amount'];
				
				if($r_po_amount['supplier_amount']!=0)
				{
					$total2 = $r_po_amount['supplier_amount'];
				}
				else
				{
					$total2=1;
				}
				
				$percentage2 = ($x2*100)/$total2;
				
		  echo " <b>DIFFERENCE: ".number_format($percentage2-100,2)." %";
		}
		
		
	  echo "</td>
			
		</tr>
		<tr class='w3-tiny w3-light-gray'>
			<td>ITEM<br/>NO.</td>
			<td>PARTICULARS /<br/>SPECIFICATION</td>
			<td>UNIT</td>
			<td>TOTAL<br/>QUANTITY</td>
			<td>PLACED<br/>ORDERED QTY</td>
			<td>ONHAND QTY</td>
			<td>DELIVERED<br/>QUANTITY</td>
			<td>DELIVERY<br/>%</td>
			<td class='w3-text-indigo'>PO<br/>UNIT COST</td>
			<td class='w3-text-indigo'>PO<br/>TOTAL COST</td>
			<td class='w3-text-deep-purple'>AVERAGE<br/>PRICE<br/>SUPPLIER</b></td>
			<td class='w3-text-deep-purple'>TOTAL FOR<br/>SUPPLIER</td>
			<td class='w3-text-dark-gray'>PO & SUPPLIER<br/>DIFFERENCE</td>
			<td class='w3-text-dark-gray'>PERCENTAGE<br/>DIFFERENCE</td>
			<td>LATEST</br>REMARKS</td>";
			
		
	echo "</tr>";
do{
echo "<tr class='w3-hover-pale-green'>";
	
	echo "<td>";
		echo $r1['from_po_count'];
		
		if(isset($_REQUEST['editing_enabled']))
		{  ?>
		<a href="script_po_item_details.php?client_id=<?php echo $r1['client_id']; ?>&po_name=<?php echo $_REQUEST['po_name']; ?>&po_count=<?php echo $r1['from_po_count']; ?>" class="fa fa-search w3-large w3-link" title="VIEW DETAILS" target="_blank"></a>
		<?php
		}
	echo "</td>";
	
	echo "<td>";
			
			if($r1['qty_order']==$r1['qty_dr']){ echo "<span class='w3-yellow'>".$r1['item_name']."</span>"; }
			elseif($r1['qty_dr']!=0){ echo "<span class='w3-orange'>".$r1['item_name']."</span>"; }
			elseif($r1['order_to_supplier']==1 and $r1['qty_dr']==0){ echo "<span class='w3-green'>".$r1['item_name']."</span>"; }
			else{ echo $r1['item_name']; }
			
	echo "</td>";
	
	echo "<td>".$r1['unit']."</td>";
	
	echo "<td><b>".$r1['qty_order']."</b></td>";
	echo "<td><b>".$r1['qty_order_to_supplier']."</b><br/><i>(".($r1['qty_order']-$r1['qty_order_to_supplier']).")</i></td>";
	echo "<td><b></b></td>";
	echo "<td>z<b>".$r1['qty_dr']."</b></td>";
	
	
	//DELIVERY PERCENT AREA-------
	echo "<td class='w3-text-red'>
			<div class='w3-pale-red'>";
	
		$half=$r1['qty_order']/2;
		$fort=$r1['qty_order']/4;
		$eight=$r1['qty_order']/8;
		
		if($r1['qty_dr']==$r1['qty_order']){ echo "<div class='w3-green' style='height:24px;width:100%'>100%</div>"; }
		
		elseif($r1['qty_dr']>$half+$fort and $r1['qty_dr']<$r1['qty_order']){ echo "<div class='w3-red' style='height:24px;width:90%'>90%</div>"; }
		
		elseif($r1['qty_dr']>$half+$eight and $r1['qty_dr']<$r1['qty_order']){ echo "<div class='w3-red' style='height:24px;width:75%'>75%</div>"; }
		
		elseif($r1['qty_dr']>$half and $r1['qty_dr']<$r1['qty_order']){ echo "<div class='w3-red' style='height:24px;width:60%'>60%</div>"; }
		
		elseif($r1['qty_dr']==$half){ echo "<div class='w3-red' style='height:24px;width:50%'>50%</div>"; }
		
		elseif($r1['qty_dr']<$half and $r1['qty_dr']>0){ echo "<div class='w3-red' style='height:24px;width:25%'>40%</div>"; }
		
		elseif($r1['qty_dr']<$fort and $r1['qty_dr']>0){ echo "<div class='w3-red' style='height:24px;width:25%'>30%</div>"; }
		
		elseif($r1['qty_dr']<$eight and $r1['qty_dr']>0){ echo "<div class='w3-red' style='height:24px;width:25%'>10%</div>"; }
		
		elseif($r1['qty_dr']==0){ echo "<div class='w3-red' style='height:24px;width:0%'>0%</div>"; }
		
		else{}
	
	echo   "</div>
		 </td>";
	//DELIVERY PERCENT AREA END---------
	

	echo "<td class='w3-text-indigo'>".number_format($r1['unit_cost'],2)."</td>";
	echo "<td class='w3-text-indigo'>".number_format($r1['qty_order']*$r1['unit_cost'],2)."</td>";
	
	echo "<td class='w3-text-deep-purple'>".number_format($r1['supplier_cost'],2)."</td>";
	
	
	echo "<td class='w3-text-deep-purple'>".number_format($r1['qty_order']*$r1['supplier_cost'],2)."</td>";
	
	
	//difference PO and supplier-----
	echo "<td>";

		if($r1['supplier_cost']!=0)
		{
			echo "<span class='w3-text-dark-gray'>".number_format(($r1['qty_order']*$r1['unit_cost'])-($r1['qty_order']*$r1['supplier_cost']),2)."</span>";
		}else{}

	echo "</td>";
	//difference PO and supplier-----

	//percentage difference area----
	echo "<td>";
		
		if($r1['supplier_cost']!=0)
		{
			$x = $r1['qty_order'] * $r1['supplier_cost'];
			$total = $r1['qty_order'] * $r1['unit_cost'];
			$percentage = ($x*100)/$total;
			
			echo "<span class='w3-text-dark-gray'>".number_format(100-$percentage,2)." %</span>";
		}else{}
		
	echo "</td>";
	//percentage difference area end---
	
	//---remarks area----
	echo "<td class='w3-tiny'><i>";
		$po_name=$_REQUEST['po_name'];
		$po_count=$r1['from_po_count'];
		$client_id=$r1['client_id'];
		$s2="SELECT remarks FROM special_job_details WHERE client_id=$client_id AND po_name='$po_name' AND from_po_count=$po_count ORDER BY id DESC";
		$q2=mysqli_query($conn,$s2);
		$r2=mysqli_fetch_assoc($q2);
		echo $r2['remarks'];
	
	echo "</i></td>";
	//---remarks area end ----
	
echo "</tr>";
}while($r1=mysqli_fetch_assoc($s1));	
echo "</table>";
echo "</div><br/>";
?>