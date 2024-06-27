<?php
//PO List Start-----
if(isset($_REQUEST['po_list']))
{ ?>

	<br>
	<table class='table'>
	  <tr class='w3-dark-gray w3-tiny'>
		<td class='w3-large'>PO NO 
		<?php 
		$sxx="select sum(qty_order*unit_cost) as po_grandtotal from special_job";
		$qxx=mysqli_query($conn, $sxx) or die(mysqli_error($conn));
		$rxx=mysqli_fetch_assoc($qxx);
		echo " | Grand Total: ".number_format($rxx['po_grandtotal'],2);
		?>
		</td>
		<td>AGING /</br>DAYS</td>
		<td>DELIVERY<br/>STATUS</td>
		<td>PO AMOUNT</td>
		<td>AMOUNT SERVED<br/>BASED ON PO UNIT PRICE</td>
		<td>AMOUNT SERVED<br/>BASED ON SUPPLIERS PRICE</td>
		<td>GP%</td>
		<td>STATUS</td>
	
		<?php if($access['d3']==1){ ?>
		<td>CHANGE<br/>PO NAME</td>
		<?php } ?>
		
		<?php if($access['d4']==1){ ?>
		<td>CHANGE<br/>STATUS</td>
		<?php } ?>
		
	 </tr>
	  
    <?php
	$s9=mysqli_query($conn, "select client_id, po_name, datetime, status from special_job group by po_name order by status,datetime asc") or die(mysqli_error($conn));
	$r9=mysqli_fetch_assoc($s9);
	do{
		echo "<tr>";
		echo "<td><b>";
			
			//show client name thru client id query
			$client_id=$r9['client_id']; 
			$q0=mysqli_query($conn,"select name from m_sales_clients where client_id=$client_id") or dir(mysqli_error());
			$r0=mysqli_fetch_assoc($q0);
			
			echo $r0['name']."&nbsp;&nbsp;&nbsp;";
				
		echo "<a href='m_special_job/podetails.php?po_name=".$r9['po_name']."' target='_blank'>".$r9['po_name']."</a></b></td>";
		
		$s_po_name=$r9['po_name'];
		
		$s_po_amount="select ( select sum(qty_order*unit_cost) from special_job where po_name='$s_po_name') as po_amount,
							 ( select sum(qty_dr*supplier_cost) from special_job where po_name='$s_po_name') as supplier_amount,
							 ( select sum(qty_dr*unit_cost) from special_job where po_name='$s_po_name') as dr_amount
					 ";			  
					  
		$q_po_amount=mysqli_query($conn, $s_po_amount) or die(mysqli_error($conn));
		$r_po_amount=mysqli_fetch_assoc($q_po_amount);
		
			$x1 = $r_po_amount['dr_amount'];
			$total = $r_po_amount['po_amount'];
			$percentage = ($x1*100)/$total;
		
		echo "<td>";
		
		switch($r9['status'])
		{
			case 0: echo (new DateTime($r9['datetime']))->diff(new DateTime(date('Y-m-d')))->days; break;
			case 1: echo ""; break;
		}
		echo "</td>";
		
		
		echo "<td>";
			if($percentage==100){ echo "<b class='w3-text-green'>".number_format($percentage,2)." %</b>"; }
			if($percentage>0 and $percentage<=99.9){ echo "<b class='w3-text-red'>".number_format($percentage,2)." %</b>"; }
			if($percentage==0){ echo "<b>".number_format($percentage,2)." %</b>"; }
		echo "</td>";
		
		echo "<td><b>".number_format($r_po_amount['po_amount'],2)."</b></td>";
		echo "<td class='w3-text-green'><b>".number_format($r_po_amount['dr_amount'],2)."</b></td>";
		echo "<td class='w3-text-green'><b>".number_format($r_po_amount['supplier_amount'],2)."</b></td>";
		echo "<td width='100'>";

			
			if($r_po_amount['supplier_amount']==0 || $r_po_amount['dr_amount']==0)
			{}
			
			else
			{
				$gp_percent=number_format(( ($r_po_amount['dr_amount']-$r_po_amount['supplier_amount']) / $r_po_amount['dr_amount'])*100,2);
				echo $gp_percent." %"; 
			}

		echo "</td>";
		echo "<td>";
			switch($r9['status'])
			{
				case 0: echo "<b class='w3-text-red'>Pending</b>"; break;
				case 1: echo "<b class='w3-text-green'>Completed</b>"; break;
			}
		echo "</td>";


		

		if($access['d3']==1)
		{ 
		echo "<td>"; 
		
				if(isset($_REQUEST['change_po']))
				  { ?>
					
						<form method='get' action='m_special_job/script_update.php'>
							<input name='po_name' type='hidden' value='<?php echo $r9['po_name']; ?>'>
							<input name='update_po_name' type='text' value='<?php echo $r9['po_name']; ?>' style='width: 100px'>
							<input class='w3-tiny w3-red w3-btn' type='submit' value='UPDATE' onclick='return confirm("Update Confirm?")'>
						</form>
			<?php 
				  }
			  else{ echo "<a class='fa fa-pencil' href='admin.php?special_job=1&po_list=1&change_po=1".$r9['po_name']."'></a>"; }
		
		echo "</td>";
		}
		
		if($access['d4']==1)
		{ 
		echo "<td>"; 
		
				if(isset($_REQUEST['change_status']))
				  { ?>
					
						<form method='get' action='m_special_job/script_update.php'>
							<input name='po_name' type='hidden' value='<?php echo $r9['po_name']; ?>'>
							<select name='update_po_status' style='width: 100px'>
								<option></option>
								<option value='0'>Pending</option>
								<option value='1'>Completed</option>
							</select>	
							<input class='w3-tiny w3-red w3-btn' type='submit' value='UPDATE' onclick='return confirm("Update Confirm?")'>
						</form>
			<?php 
				  }
			  else{ echo "<a class='fa fa-pencil' href='admin.php?special_job=1&po_list=1&change_status=1".$r9['po_name']."'></a>"; }
		
		echo "</td>";
		}
		
		
		echo "</tr>";
	
	}while($r9=mysqli_fetch_assoc($s9));
	?>
	  
	</table>

<?php 
}
//PO List End-----
?>
