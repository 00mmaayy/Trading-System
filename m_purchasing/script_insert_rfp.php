<?php
include('../conn/conn.php');
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

	if(isset($_REQUEST['rfp_no']))
	{
		$user=$_SESSION['username'];
		$rfp_no=$_REQUEST['rfp_no'];
		mysqli_query($conn, "insert into m_purchasing_rfp (rfp_no,add_by,add_date) value ('$rfp_no','$user',now())") or die(mysqli_error($conn));
		
		$username=$_SESSION['username'];
		$trans="new RFP created: $rfp_no";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
		
		header('Location: ../admin.php?purchasing=1&rfp_list=1');
	}
?>