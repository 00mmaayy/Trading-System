<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

$new_user=$_GET['new_user'];
$password=$_GET['password'];
$new_first_name=$_GET['f_name'];
$new_middle_name=$_GET['m_name'];
$new_last_name=$_GET['l_name'];
$new_position=$_GET['position'];
$department=$_GET['department'];
$company=$_GET['company'];

$username=$_SESSION['username'];

$sql="insert into users (username,password,first_name,middle_name,last_name,position,department,company,date_created,time_created,created_by)
      values ('$new_user','$password','$new_first_name','$new_middle_name','$new_last_name',$new_position,'$department','$company',curdate(),curtime(),'$username')";
$query=mysqli_query($conn, $sql) or die(mysqli_error());

$sql1="insert into user_access (username) values ('$new_user')";
$query1=mysqli_query($conn, $sql1) or die(mysqli_error());

$username=$_SESSION['username'];
$trans="create system user $new_user $new_position";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());

$return='Location: ../admin.php?settings=1&createuser=1&success=1';
header($return);
?>
