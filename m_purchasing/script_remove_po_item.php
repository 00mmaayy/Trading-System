<?php
include('../conn/conn.php');
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }


	$user=$_SESSION['username'];
	$po_no=$_REQUEST['po_no'];
	$id=$_REQUEST['id'];
	mysqli_query($conn, "delete from m_purchasing_po_details where id=$id");
	
	$username=$_SESSION['username'];
	
	$cat_sub1=$_REQUEST['cat_sub1'];
	$brand=$_REQUEST['brand'];
	$item=$_REQUEST['item'];
	
	$trans="item_no $id, item $cat_sub1 $brand $item removed on po $po_no";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
	
	header('Location: ../m_purchasing/podetails.php?po_no='.$po_no);
?>