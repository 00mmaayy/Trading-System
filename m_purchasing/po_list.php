<?php
//PO List Start-----
if(isset($_REQUEST['po_list']))
{ ?>
<br>
<?php //create po access 
if($access['b3']==1){ ?>
		<form method='get' action='m_purchasing/script_insert_po.php'>
			<input name='purchasing' type='hidden' value='1'>
			<input name='po_list' type='hidden' value='1'>
			<input required class='btn' name='po_no' type='text' placeholder='PO Number'>
			<input class='btn btn-danger' type='submit' value='CREATE PO' onclick='return confirm("Create PO Now?")'>
		</form>
<?php } ?>

	<br>
	<table class='table'>
	  <tr class='w3-dark-gray w3-tiny'>
		<td>PO NO.</td>
		<td>PO AMOUNT</td>
		<td>CREATED INFO</td>
		<td>RECEIVED INFO</td>
		<td>CENCELLED INFO</td>
		<td>STATUS</td>
	 </tr>
	  
    <?php
	$s9=mysqli_query($conn, "select * from m_purchasing_po") or die(mysqli_error($conn));
	$r9=mysqli_fetch_assoc($s9);
	do{
		echo "<tr>";
		echo "<td><a href='m_purchasing/podetails.php?po_no=".$r9['po_no']."' target='_blank'>".$r9['po_no']."</a></td>";
		echo "<td class='w3-text-red'>".number_format($r9['po_amount'],2)."</td>";
		echo "<td>".$r9['add_date']."</td>";
		echo "<td>".$r9['recieved_date']."</td>";
		echo "<td>".$r9['cancelled_date']."</td>";
		echo "<td>";
		
				switch($r9['po_status'])
				{
					case 0: echo "Pending"; break;
					case 1: echo "Approved"; break;
					case 0: echo "Received"; break;
					case 0: echo "Cancelled"; break;
				}
		
		echo "</td>";
		echo "</tr>";
	}while($r9=mysqli_fetch_assoc($s9));
	?>
	  
	</table>

<?php 
}
//PO List End-----
?>
