<?php 
include('../conn/conn.php');
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

	$username=$_SESSION['username'];
	$po_no=$_REQUEST['po_no'];
	
	$q = mysqli_query($conn, "SELECT item, qty FROM m_purchasing_po_details WHERE po_no = '$po_no'") or die(mysqli_error($conn));
	$r = mysqli_fetch_assoc($q);
	do{
		
		$item = $r['item'];
		$qty = $r['qty'];
		$q1 = mysqli_query($conn, "INSERT INTO m_inventory_items(id_from_purch_items, from_po, qty, item, unit, price, supplier, category_main, category_sub, category_unique, add_by, add_date) 
								   SELECT id, '$po_no', '$qty', item, unit, price, supplier, category_main, category_sub, category_unique, '$username', now() FROM m_purchasing_items WHERE id = $item") or die(mysqli_error($conn));
		
		mysqli_query($conn, "UPDATE m_purchasing_po_details SET inv_storage = 1 WHERE po_no = '$po_no'") or die(mysqli_error($conn));
	
	}while($r = mysqli_fetch_assoc($q));
	
	$trans="STORE ALL PO:$po_no ITEM TO INVENTORY";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
		
	header ('Location: ../admin.php?inventory=1&store_items=1&po_no='.$_REQUEST['po_no'].'&success=1');
?>