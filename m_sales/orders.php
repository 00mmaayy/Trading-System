<?php // Orders Start --->
	  if($access['a2']==1)
	    { 
	      if(isset($_REQUEST['orders'])) 
	        { ?> 
		
					  <br/>
					  <!---Ajax Search client Start--->
					   <script src="../js/ajaxloader.js"></script>
						<script>
						function showHint(str)
						{
						var s=document.getElementById("search").value;
						var xmlhttp;
						if (window.XMLHttpRequest)
						  {// code for IE7+, Firefox, Chrome, Opera, Safari
						  xmlhttp=new XMLHttpRequest();
						  }
						else
						  {// code for IE6, IE5
						  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						  }
						xmlhttp.onreadystatechange=function()
						  {
						  if (xmlhttp.readyState==4 && xmlhttp.status==200)
							{
							document.getElementById("view_result").innerHTML=xmlhttp.responseText;
							}
						  }
						xmlhttp.open("GET","m_sales/script_sales_client_result.php?s="+s,true);
						xmlhttp.send();
						}
						</script>
						
						<table><tr><td class='w3-text-red w3-tiny'><b>CLIENT SEARCH</b></td></tr>
							   <tr valign='top'>
								   <td><input class='form-control' type="text" placeholder='Input Client Name' id="search" name="search" onkeyup="showHint('x')"/>&nbsp;&nbsp;</td><td><div id="view_result"></div></td>
							   </tr>	   
						</table>
						<!---Ajax Search client End--->
						
				

		 <?php //<!--Order Start-----
			   if(isset($_REQUEST['create_order']))
			    { ?>
				  <table>
						<tr>
							<td width='400'>
						
								<!--Client Details Start-->
								<div>
								  <span class='w3-tiny'>JOB FOR CLIENT: <i class='w3-text-blue'>(Client ID: <?php echo $_REQUEST['client_id']; ?>)</i></span><br/>
								  <?php 
								  $client_id=$_REQUEST['client_id'];
								  $q_client=mysqli_query($conn, "select client_id, tin, name, mobile, telno, contact_person, email from m_sales_clients where client_id=$client_id") or die(mysqli_error($conn));
								  $r_client=mysqli_fetch_assoc($q_client);
								  echo "<b>".$r_client['name']."</b><br>";
								  echo "<span class='w3-tiny'>".$r_client['mobile']." | ".$r_client['telno']." | ".$r_client['tin']." | ".$r_client['email']." | Contact Person: ".$r_client['contact_person']."</span><br><br>";
								  ?>
								</div>
								<!--Client Details End-->
							
										<form method='get' action='m_sales/orders/script_sales_add_order.php'>
											<input name='client_id' type='hidden' value='<?php echo $r_client['client_id']; ?>'>
											
											  <span class='w3-tiny'>THRU: </span> 
											  <select required name='trans_type'>
												 <option disabled selected></option>
												 <?php
												 $sd=mysqli_query($conn, "select trans_no, trans_desc from m_sales_transaction_type order by trans_desc ASC") or die(mysqli_error($conn));
												 $rd=mysqli_fetch_assoc($sd);
												 do
												 {
													echo "<option value=".$rd['trans_no'].">".$rd['trans_desc']."</option>";
												 }while($rd=mysqli_fetch_assoc($sd));	 
												 ?>
											  </select>
											<!--Create Booking Button-->
											<input class='w3-tiny btn btn-primary' name='add_order' type='submit' value='PROCEED AND UPLOAD P.O. DATA' onclick='return confirm("Create Now? Are you sure?")'>
										</form>
						
							</td>
						</tr>	
					</table>		
		
		<hr>
			 
			<?php }
			
			
			} // Orders End ---> 			
		

	//start of client history of orders
	if(isset($_REQUEST['client_id']))
	{
		$client_id = $_REQUEST['client_id'];
		$s9=mysqli_query($conn, "select sum(unit_cost*qty_order) as total_amount, client_id, po_name, status from special_job where client_id = $client_id group by po_name order by id, status desc") or die(mysqli_error($conn));
	    $r9=mysqli_fetch_assoc($s9);
		
		
		echo "<table class='w3-table'>
				<tr>
					<td>PO NO</td>
					<td>PO AMOUNT</td>
					<td>STATUS</td>
				</tr>";
		do{		
			echo "<tr>";
				echo "<td><b><a href='m_special_job/podetails.php?po_name=".$r9['po_name']."' target='_blank'>".$r9['po_name']."</a></b></td>";
				echo "<td><b>Php ".number_format($r9['total_amount'],2)."</b></td>";
				echo "<td>";
						switch($r9['status'])
						{ 
							case 0: echo "<span class='w3-text-red'>Pending</span>"; break;
							case 1: echo "<span class='w3-text-green'>Done</span>"; break;
						}
						
				echo "</td>";
			   
		}while($r9=mysqli_fetch_assoc($s9));
	}



		
        } // Sales END ---->
?>