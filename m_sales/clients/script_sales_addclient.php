<?php 
session_start();
include('../../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

if(isset($_REQUEST['addclient']))
{
	$newclient=$_GET['newclient'];
	$cp=$_GET['cp'];
	$email=$_GET['email'];
	$telno=$_GET['telno'];
	$tin=$_GET['tin'];
	$clientaddr=$_GET['clientaddr'];
	$contact_person=$_GET['contact_person'];
	$username=$_SESSION['username'];

	$sql="insert into m_sales_clients (client_id,name,mobile,telno,tin,contact_person,email,address,add_by,add_date)
	     values ('','$newclient','$cp','$telno','$tin','$contact_person','$email','$clientaddr','$username',curdate())";
	$query=mysqli_query($conn, $sql) or die(mysqli_error($conn));

	
	$trans="create new sales client $newclient";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));

	$return='Location: ../../admin.php?sales=1&clients=1&add_success=1';
	header($return);
}
?>