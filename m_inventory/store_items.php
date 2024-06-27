<?php 
if(isset($_REQUEST['store_items']))
	{ ?>
	<br/>
	<table class='w3-table'>
		<tr>
			<td>
				Store From PO:<br/>
				<form>
					<input name='inventory' type='hidden' value='1'>
					<input name='store_items' type='hidden' value='1'>
					<select name='po_no' class='w3-select'>
						<option disabled selected></option>
				<?php 
					$q = mysqli_query($conn, "SELECT po_no FROM m_purchasing_po ORDER BY po_no DESC") or die(mysqli_error($conn));
					$r = mysqli_fetch_assoc($q);
					do{
						echo "<option>".$r['po_no']."</option>";
					}while($r = mysqli_fetch_assoc($q));
				?>
					</select>
					<input type='submit' value='SELECT PO'>
				</form>
			</td>
			<td>
				Manual Store to Inventory:
				<script src="../js/ajaxloader.js"></script>
				<script>
				function showHint4(str)
				{
				var s=document.getElementById("search4").value;
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
					document.getElementById("view_result4").innerHTML=xmlhttp.responseText;
					}
				  }
				xmlhttp.open("GET","m_inventory/result4.php?item_add=1&s="+s,true);
				xmlhttp.send();
				}
				</script>
				<input class='w3-input' type="text" placeholder='&nbsp; SEARCH ITEM' id="search4" name="search4" onkeyup="showHint4('x')"/>
				<div id="view_result4"></div>
			</td>
		</tr>
		
		
		
		
		
  <?php if(isset($_REQUEST['po_no']))
		{	?>
		<tr>
			<td>
			
				<table border='1' class='w3-table'>
					<tr>
						<td colspan = '9'>PO NO: <b class='w3-text-indigo'><?php echo $_REQUEST['po_no']; ?></b></td>
					</tr>
					<tr class='w3-tiny w3-pale-blue'>
						<td>MAIN CATEGORY</td>
						<td>SUB CATEGORY</td>
						<td>BRAND</td>
						<td>PARTICULAR</td>
						<td>UNIT</td>
						<td>QTY</td>
						<td>PRICE</td>
						<td>STORE QTY</td>
						<td>ACTION</td>
					</tr>
						<?php 
						$po_no = $_REQUEST['po_no'];
						$q = mysqli_query($conn, "SELECT b.item, 
														c.unit, 
														a.qty, 
														a.inv_storage, 
														b.id,
														b.price,
														d.category AS cat_main, 
														e.category AS cat_sub, 
														f.category AS cat_unique
													FROM m_purchasing_po_details a 
													LEFT JOIN m_purchasing_items b
														ON a.item = b.id
													LEFT JOIN m_purchasing_units c
														ON b.unit = c.id
													LEFT JOIN m_purchasing_category_main d
														ON b.category_main = d.id
													LEFT JOIN m_purchasing_category_sub e
														ON b.category_sub = e.id
													LEFT JOIN m_purchasing_category_unique f
														ON b.category_unique = f.id
													WHERE a.po_no = '$po_no'") or die(mysqli_error($conn));
						$r = mysqli_fetch_assoc($q);
						do{
			  echo "<tr>
						<td>".$r['cat_main']."</td>
						<td>".$r['cat_sub']."</td>
						<td>".$r['cat_unique']."</td>
						<td>".$r['item']."</td>
						<td>".$r['unit']."</td>
						<td>".$r['qty']."</td>
						<td>".number_format($r['price'],2)."</td>";
						
					if($r['inv_storage']==0)
					{   
						echo 	
						"<td>
							<form>
							<input name='inv_qty' size='3' type='number' step='any' value=".$r['qty']."></td>
						<td>
							<input class='w3-tiny' type='submit' value='STORE'>
							</form>
						</td>";
					}
					else
					{
						echo "<td>";
								
								$id=$r['id'];
								$inv_count="SELECT qty FROM m_inventory_items WHERE from_po = '$po_no' AND id_from_purch_items = '$id'";
								$q1=mysqli_query($conn, $inv_count) or die(mysqli_error($conn));
								$r1=mysqli_fetch_assoc($q1);
								
								echo $r1['qty'];
								
						echo "</td>
							  <td class='w3-text-green'>Stored to Inventory</td>";
					}						
					
				echo "</tr>";
					$total_amount += $r['price'];
						}while($r = mysqli_fetch_assoc($q));
						?>
					<tr><td colspan='6' align='right'></td><td colspan='3'><b class='w3-text-indigo'><?php echo number_format($total_amount,2); ?></b></td></tr>
				</table>
			
			</td>
		</tr>
		<tr>
			<td><a class='w3-button w3-blue' href='m_inventory/script_store_all_po_items.php?po_no=<?php echo $_REQUEST['po_no']; ?>' onclick='return confirm("Store All?")' >Store All PO: <b><?php echo $_REQUEST['po_no']; ?></b> Items to Inventory</a></td>
		</tr>
  <?php } ?>
	
	
	
	
	
	</table>
	
<?php
	}
?>