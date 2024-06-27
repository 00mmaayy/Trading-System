<?php
include('../conn/conn.php');
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); } ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">

<?php
$client_id=$_REQUEST['client_id'];
$po_name=$_REQUEST['po_name'];
$po_count=$_REQUEST['po_count'];
$s="SELECT * FROM special_job WHERE client_id=$client_id AND po_name='$po_name' AND from_po_count=$po_count";
$q=mysqli_query($conn,$s);
$r=mysqli_fetch_assoc($q);


echo "<div class='w3-container'>
	  </br>";	
	  
echo "<table class='w3-table w3-border' border='1'>
		
		<tr><td class='w3-light-gray'>P.O. No.</td><td>".$po_name."</td></tr>
		<tr><td class='w3-light-gray'>ITEM No.</td><td>".$r['from_po_count']."</td></tr>
		<tr><td class='w3-light-gray'>ITEM NAME</td><td>".$r['item_name']."</td></tr>
		<tr><td class='w3-light-gray'>UNIT</td><td>".$r['unit']."</td></tr>
		<tr><td class='w3-light-gray'>ORDER QTY</td><td>".$r['qty_order']."</td></tr>
		<tr><td class='w3-light-gray'>UNIT PRICE</td><td>".number_format($r['unit_cost'],2)."</td></tr>";
			
echo "</table>";

echo "</br>";

echo "<table class='w3-table w3-border' border='1'>";
?>
		<form method="get" action="script_update.php">
		<input name="client_id" type="hidden" value="<?php echo $_REQUEST['client_id']; ?>">
		<input name="po_name" type="hidden" value="<?php echo $_REQUEST['po_name']; ?>">
		<input name="po_count" type="hidden" value="<?php echo $_REQUEST['po_count']; ?>">
		<tr>
			<td class='w3-pale-yellow'>SUPPLIER NAME</td>
			<td>
				<select name="supplier" required>
					<option selected>Choose Supplier</option>
					<?php
					$ss="select * from m_purchasing_suppliers";
					$qq=mysqli_query($conn,$ss);
					$rr=mysqli_fetch_assoc($qq);
					do{
					echo "<option>".$rr['supplier']."</option>";
					}while($rr=mysqli_fetch_assoc($qq));
					
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td class='w3-pale-yellow'>SUPPLIER PRICE</td>
			<td>
				<input name="supplier_price" type="number" step="any" required>
			</td>
		</tr>
		<tr>
			<td class='w3-pale-yellow'>PURCHASED QTY TO SUPPLIER</td>
			<td>
				<input name="supplier_qty" type="number" step="any" required>
			</td>
		</tr>

		<tr>
			<td class='w3-pale-yellow'>SUPPLIERS PAYMENT TERMS</td>
			<td>
				<select name="terms" required>
					<option selected>Choose Terms</option>
					<?php
					$ss="select * from m_purchasing_terms";
					$qq=mysqli_query($conn,$ss);
					$rr=mysqli_fetch_assoc($qq);
					do{
					echo "<option>".$rr['terms_desc']."</option>";
					}while($rr=mysqli_fetch_assoc($qq));
					
					?>
				</select>
			</td>
		</tr>
		
		
		<tr>
			<td class='w3-pale-yellow'>CARGO / SHIPPING</td>
			<td>
				<select name="cargo" required>
					<option selected>Choose Cargo</option>
					<?php
					$ss="select * from m_purchasing_cargo";
					$qq=mysqli_query($conn,$ss);
					$rr=mysqli_fetch_assoc($qq);
					do{
					echo "<option>".$rr['cargo']."</option>";
					}while($rr=mysqli_fetch_assoc($qq));
					
					?>
				</select>
			</td>
		</tr>
		
		
		<tr>
			<td class='w3-pale-yellow'>REMARKS</td>
			<td>
				<textarea name="remarks" rows="3" cols="50"></textarea>
			</td>
		</tr>
		<tr><td class='w3-pale-yellow'></td><td><input name="update_item_number" type="submit" value="SUBMIT DATA" onclick="return confirm('INSERT THIS DATA?')"></td></tr>
		</form>
<?php			
echo "</table>";

echo "</br>";

$s1="SELECT * FROM special_job_details WHERE client_id=$client_id AND po_name='$po_name' AND from_po_count=$po_count";
$q1=mysqli_query($conn,$s1);
$r1=mysqli_fetch_assoc($q1);

echo "<table class='w3-table w3-border' border='1'>";
	echo "<tr class='w3-small'>
			<td class='w3-pale-red'>TRANSACT BY / DATE / TIME</td>
			<td class='w3-pale-red'>SUPPLIER NAME</td>
			<td class='w3-pale-red'>SUPPLIER PRICE</td>
			<td class='w3-pale-red'>PURCHASED QTY</td>
			<td class='w3-pale-red'>TERMS / DAYS</td>
			<td class='w3-pale-red'>CARGO</td>
			<td class='w3-pale-red'>REMARKS</td>
			
			<td class='w3-light-blue'>DELIVERED QTY</td>
			<td class='w3-light-blue'>RECIEPT</td>
			<td class='w3-light-blue'>";
				if(isset($_REQUEST['action']))
				{ 
					echo "<a href='script_po_item_details.php?client_id=".$_REQUEST['client_id']."&po_name=".$_REQUEST['po_name']."&po_count=".$_REQUEST['po_count']."'>
							DISABLE ACTION
						  </a>";
				
				}
				else
				{ 
					echo "<a href='script_po_item_details.php?client_id=".$_REQUEST['client_id']."&po_name=".$_REQUEST['po_name']."&po_count=".$_REQUEST['po_count']."&action=1'>
						ENABLE</br>ACTION
					</a>";
		
				}	
	 echo "</td>
		  </tr>";
	do{
		echo "<tr>
				
				<td class='w3-small'>".$r1['update_by']."</br>".date('M d, Y H:i: A',strtotime($r1['datetime']))."</td>
				<td>".$r1['supplier']."</td>
				<td>".$r1['supplier_price']."</td>
				<td>".$r1['supplier_qty']."</td>	
				<td>".$r1['supplier_terms']."</td>	
				<td>".$r1['cargo']."</td>
				<td>".$r1['remarks']."</td>
				
				<td>".$r1['supplier_delivery_qty']."</td>
				<td>".$r1['supplier_reciept']."</td>";
		?>		
				<td>
				<?php if(isset($_REQUEST['action'])){ ?> 
						
							<form method="get" action="script_update.php">
								<input name="order_id" type="hidden" value="<?php echo $r1['id']; ?>">
								<input name="client_id" type="hidden" value="<?php echo $_REQUEST['client_id']; ?>">
								<input name="po_name" type="hidden" value="<?php echo $_REQUEST['po_name']; ?>">
								<input name="po_count" type="hidden" value="<?php echo $_REQUEST['po_count']; ?>">
								
								<input name="delivery_qty" type="number" required><i class="w3-tiny">QTY</i>
								<input name="dr_no" type="text" placeholder="DR / SI / OR" required><i class="w3-tiny">DR/SI/OR</i></br>
								<input name="update_delivery_recieving" type="submit" value="UPDATE" onclick="return confirm('UPDATE DELIVERY?')">
							</form>
						
						<?php if($r1['supplier_delivery_qty']==0){ ?>
							<form method="get" action="script_update.php">
								<input name="order_id" type="hidden" value="<?php echo $r1['id']; ?>">
								<input name="client_id" type="hidden" value="<?php echo $_REQUEST['client_id']; ?>">
								<input name="po_name" type="hidden" value="<?php echo $_REQUEST['po_name']; ?>">
								<input name="po_count" type="hidden" value="<?php echo $_REQUEST['po_count']; ?>">
								
								<input name="remove_order_id" type="hidden" value="<?php echo $r1['id']; ?>">
								<input name="remove_order" type="submit" class="w3-red" value="REMOVE ORDER" onclick="return confirm('REMOVE THIS ITEM FROM ORDERS?')">
							</form>
						<?php }else{}?>
						
						
				<?php }else{} ?>	
				</td>
		<?php  
	  echo "</tr>";
	}while($r1=mysqli_fetch_assoc($q1));


echo "</table>";

echo "</div>";
?>