<?php
include('../conn/conn.php');
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }


	$username=$_SESSION['username'];
	$po_no=$_REQUEST['po_no'];
	mysqli_query($conn, "update m_purchasing_po set approved_by='$username', approved_date=now(), po_status = 1 where po_no='$po_no'");
	mysqli_query($conn, "update m_purchasing_po_details set status = 1 where po_no='$po_no'");
	
	$trans="po $po_no, approved by $username";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
	
	header('Location: ../m_purchasing/podetails.php?po_no='.$po_no);
?>