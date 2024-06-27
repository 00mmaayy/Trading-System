<?php
include('../conn/conn.php');
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

//insert PO 
if(isset($_REQUEST['po_no']))
{
	$user=$_SESSION['username'];
	$po_no=$_REQUEST['po_no'];
	mysqli_query($conn, "insert into m_purchasing_po (po_no,add_by,add_date) value ('$po_no','$user',now())");
	
	$username=$_SESSION['username'];
	$trans="new PO created: $po_no";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
	
	header('Location: ../admin.php?purchasing=1&po_list=1');
}
?>