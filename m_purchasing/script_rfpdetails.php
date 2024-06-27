<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

if(isset($_REQUEST['add_po'])){
$username=$_SESSION['username'];
$po_no=$_REQUEST['po_no'];
$rfp_no=$_REQUEST['rfp_no'];
mysqli_query($conn, "update m_purchasing_po set rfp_no='$rfp_no' where po_no='$po_no'") or die(mysqli_error($conn));

$sx="select sum(po_amount) as rfp_amount from m_purchasing_po where rfp_no='$rfp_no'";
$qx=mysqli_query($conn, $sx) or die(mysqli_error($conn));
$rx=mysqli_fetch_assoc($qx);
$rfp_amount=$rx['rfp_amount'];
mysqli_query($conn, "update m_purchasing_rfp set rfp_amount='$rfp_amount' where rfp_no='$rfp_no'") or die(mysqli_error($conn));

$trans="UPDATE RFP:$rfp_no RFP:$rfp_amount";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));

header('Location: rfpdetails.php?rfp_no='.$_REQUEST['rfp_no'].'&po_no='.$_REQUEST['po_no']);
}


if(isset($_REQUEST['for_payment']))
{
	$user=$_SESSION['username'];
	$rfp_no=$_REQUEST['rfp_no'];
	$po_name=$_REQUEST['po_name'];
	$s="INSERT INTO special_job_rfp (po_name,rfp_no,input_by,input_datetime) VALUES ('$po_name','$rfp_no','$user',now())";
	mysqli_query($conn,$s) or die(mysqli_error());
	
	$x="select (select sum(supplier_cost*qty_order_to_supplier) from special_job where po_name='$po_name') as dr_amount";
	$y=mysqli_query($conn, $x) or die(mysqli_error());
	$z=mysqli_fetch_assoc($y);
	$dr_amount=$z['dr_amount'];
	
	$x1="UPDATE special_job_rfp SET rfp_amount='$dr_amount' WHERE po_name='$po_name' AND rfp_no='$rfp_no'";
	mysqli_query($conn,$x1) or die(mysqli_error());
	
header('Location: rfpdetails.php?add_po_success=1&rfp_no='.$_REQUEST['rfp_no']);
}

if(isset($_REQUEST['remove_po']))
{
	$user=$_SESSION['username'];
	$rfp_no=$_REQUEST['rfp_no'];
	$rfp_id=$_REQUEST['rfp_id'];
	$s="DELETE FROM special_job_rfp WHERE id='$rfp_id' AND rfp_no='$rfp_no'";
	mysqli_query($conn,$s) or die(mysqli_error());
header('Location: rfpdetails.php?remove_po_success=1&rfp_no='.$_REQUEST['rfp_no']);
}


if(isset($_REQUEST['release_rfp']))
{
	$user=$_SESSION['username'];
	$rfp_no=$_REQUEST['rfp_no'];
	$s="UPDATE special_job_rfp SET released=1, released_by='$user', released_datetime=now()";
	mysqli_query($conn,$s) or die(mysqli_error());
header('Location: rfpdetails.php?remove_po_success=1&rfp_no='.$_REQUEST['rfp_no']);
}

?>
