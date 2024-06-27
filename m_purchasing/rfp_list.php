<?php 
//RFP List Start-----
if(isset($_REQUEST['rfp_list']))
{ ?>
<br>
	<?php if($access['b5']==1)
	      { ?>
		<form method='get' action='m_purchasing/script_insert_rfp.php'>
			<input name='procurement' type='hidden' value='1'>
			<input name='rfp_list' type='hidden' value='1'>
			<input required class='btn' name='rfp_no' type='text' placeholder='RFP Number'>
			<input class='btn btn-danger' type='submit' value='CREATE RFP' onclick='return confirm("Create RFP Now?")'>
		</form>
	<?php } ?>
		
	<br>
	<table class='table'>
	  <tr class='w3-dark-gray w3-tiny'>
		<td>RFP NO.</td>
		<td>RFP AMOUNT</td>
		<td>CREATED INFO</td>
		<td>RECEIVED INFO</td>
		<td>CENCELLED INFO</td>
		<td>STATUS</td>
	 </tr>
	  
    <?php
	$s9=mysqli_query($conn, "select * from m_purchasing_rfp") or die(mysqli_error($conn));
	$r9=mysqli_fetch_assoc($s9);
	do{
		echo "<tr>";
		echo "<td><a href='m_purchasing/rfpdetails.php?rfp_no=".$r9['rfp_no']."' target='_blank'>".$r9['rfp_no']."</a></td>";
		echo "<td class='w3-text-red'>".number_format($r9['rfp_amount'],2)."</td>";
		echo "<td>".$r9['add_date']."</td>";
		echo "<td>".$r9['recieved_date']."</td>";
		echo "<td>".$r9['cancelled_date']."</td>";
		echo "<td>".$r9['status']."</td>";
		echo "</tr>";
	}while($r9=mysqli_fetch_assoc($s9));
	?>
	  
	</table>

<?php 
}
//RFP List End-----
?>