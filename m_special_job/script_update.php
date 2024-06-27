<?php
include('../conn/conn.php');
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

//single line entry for ordered items-----
if(isset($_REQUEST['update_item_number']))
{
	//single line entry for ordered items-----
	$user=$_SESSION['username'];
	$po_name=$_REQUEST['po_name'];
	$client_id=$_REQUEST['client_id'];
	$po_count=$_REQUEST['po_count'];
	$supplier=$_REQUEST['supplier'];
	$supplier_qty=$_REQUEST['supplier_qty'];
	$supplier_price=$_REQUEST['supplier_price'];
	$supplier_reciept=$_REQUEST['supplier_reciept'];
	$terms=$_REQUEST['terms'];
	$cargo=$_REQUEST['cargo'];
	$remarks=$_REQUEST['remarks'];
	$update_item_number=$_REQUEST['update_item_number'];
	
	$s="INSERT INTO special_job_details 
			(po_name,client_id,from_po_count,supplier,supplier_qty,supplier_price,supplier_reciept,supplier_terms,cargo,remarks,datetime,update_by)
		VALUES
			('$po_name','$client_id','$po_count','$supplier','$supplier_qty','$supplier_price','$supplier_reciept','$terms','$cargo','$remarks',now(),'$user')";
	$q=mysqli_query($conn,$s);
	//single line entry for oreders items-----



	$s1="SELECT 
			sum(supplier_qty) as total_dr_qty,
			avg(supplier_price) as supplier_price_average
	     FROM special_job_details 
		 WHERE 
				po_name='$po_name' 
			AND client_id='$client_id' 
			AND from_po_count='$po_count'";
	$q1=mysqli_query($conn,$s1) or die(mysqli_error());
	$r1=mysqli_fetch_assoc($q1);
	
	
	$supplier_price_average=$r1['supplier_price_average'];
	$qty_order_to_supplier=$r1['total_dr_qty'];
	$x="UPDATE special_job 
		SET 
			qty_order_to_supplier='$qty_order_to_supplier', 
			supplier_cost='$supplier_price_average', 
			order_to_supplier='1' 
		WHERE 
				po_name='$po_name' 
			AND client_id='$client_id' 
			AND from_po_count='$po_count'";
	$y=mysqli_query($conn,$x) or die(mysqli_error());
	
	
	
header('Location: script_po_item_details.php?client_id='.$_REQUEST['client_id'].'&po_name='.$_REQUEST['po_name'].'&po_count='.$_REQUEST['po_count']);
}
//single line entry for ordered items-----

//remove wrong item for orders and deliveries----
if(isset($_REQUEST['remove_order']))
	{
		$id=$_REQUEST['order_id'];
		$user=$_SESSION['username'];
		$po_name=$_REQUEST['po_name'];
		$client_id=$_REQUEST['client_id'];
		$po_count=$_REQUEST['po_count'];
			
		$remove_order_id=$_REQUEST['remove_order_id'];
		mysqli_query($conn,"DELETE FROM special_job_details WHERE id='$remove_order_id'");
		
		$s1="SELECT 
			sum(supplier_qty) as total_dr_qty,
			avg(supplier_price) as supplier_price_average
	     FROM special_job_details 
		 WHERE 
				po_name='$po_name' 
			AND client_id='$client_id' 
			AND from_po_count='$po_count'";
	$q1=mysqli_query($conn,$s1) or die(mysqli_error());
	$r1=mysqli_fetch_assoc($q1);
	
	$supplier_price_average=$r1['supplier_price_average'];
	$qty_order_to_supplier=$r1['total_dr_qty'];
	$x="UPDATE special_job 
		SET 
			qty_order_to_supplier='$qty_order_to_supplier', 
			supplier_cost='$supplier_price_average', 
			order_to_supplier='1' 
		WHERE 
				po_name='$po_name' 
			AND client_id='$client_id' 
			AND from_po_count='$po_count'";
	$y=mysqli_query($conn,$x) or die(mysqli_error());	
header('Location: script_po_item_details.php?remove_item_success=1&client_id='.$_REQUEST['client_id'].'&po_name='.$_REQUEST['po_name'].'&po_count='.$_REQUEST['po_count']);
}	
//remove wrong item for orders and deliveries----

//--deliveries---------
if(isset($_REQUEST['update_delivery_recieving']))
{
	
		$id=$_REQUEST['order_id'];
		$user=$_SESSION['username'];
		$po_name=$_REQUEST['po_name'];
		$client_id=$_REQUEST['client_id'];
		$po_count=$_REQUEST['po_count'];
		$delivery_qty=$_REQUEST['delivery_qty'];
		$dr_no=$_REQUEST['dr_no'];

	$x="UPDATE special_job_details
		SET
			supplier_reciept='$dr_no',
			supplier_delivery_qty='$delivery_qty',
			delivery_recieved_by='$user',
			delivery_recieved_datetime=now()
		WHERE 
				po_name='$po_name' 
			AND client_id='$client_id' 
			AND from_po_count='$po_count'
			AND id='$id'";
	$y=mysqli_query($conn,$x) or die(mysqli_error());		
		
	
	
	$s1="SELECT 
			sum(supplier_delivery_qty) as total_delivery
	     FROM special_job_details 
		 WHERE 
				po_name='$po_name' 
			AND client_id='$client_id' 
			AND from_po_count='$po_count'";
	$q1=mysqli_query($conn,$s1) or die(mysqli_error());
	$r1=mysqli_fetch_assoc($q1);

	$total_delivery=$r1['total_delivery'];
	$s2="UPDATE special_job 
		SET 
			qty_dr='$total_delivery' 
		WHERE 
				po_name='$po_name' 
			AND client_id='$client_id' 
			AND from_po_count='$po_count'";
	$q2=mysqli_query($conn,$s2) or die(mysqli_error());
	

header('Location: script_po_item_details.php?dr_success=1&client_id='.$_REQUEST['client_id'].'&po_name='.$_REQUEST['po_name'].'&po_count='.$_REQUEST['po_count']);
}
//--deliveries---------

//---------------------------------------------------------
	if(isset($_REQUEST['update_po_name']))
	{
		$user=$_SESSION['username'];
		$po_name=$_REQUEST['po_name'];
		$update_po_name=$_REQUEST['update_po_name'];
		mysqli_query($conn, "update special_job set po_name='$update_po_name' where po_name='$po_name' ") or die(mysqli_error($conn));
		
		$username=$_SESSION['username'];
		$trans="change po_name from: $po_name to: $update_po_name";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
		
		header('Location: ../admin.php?special_job=1&po_list=1');
	}
	
	if(isset($_REQUEST['update_po_status']))
	{
		$user=$_SESSION['username'];
		$po_name=$_REQUEST['po_name'];
		
		if($_REQUEST['update_po_status']==0){
			mysqli_query($conn, "update special_job set status=0 where po_name='$po_name' ") or die(mysqli_error($conn));
		}else{
			mysqli_query($conn, "update special_job set status=1 where po_name='$po_name' ") or die(mysqli_error($conn));
		}
		
		$username=$_SESSION['username'];
		$trans="status change for po_no: $po_name";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
		
		header('Location: ../admin.php?special_job=1&po_list=1');
	}
//-------------------------------------


?>