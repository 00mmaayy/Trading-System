<?php
include('../conn/conn.php');
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

	
		//$user=$_SESSION['username'];
		//$id=$_REQUEST['id'];
		//$remarks=$_REQUEST['remarks'];
		//mysqli_query($conn, "update special_job set remarks='$remarks' where id=$id ") or die(mysqli_error($conn));
		
		//$username=$_SESSION['username'];
		//$trans="Add remarks on item id: $id remarks: $remarks";
		//$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		//$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
		
		//header('Location: podetails.php?po_name='.$_REQUEST['po_name'].'&editing_enabled=1');

?>