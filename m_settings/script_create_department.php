<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

$settings=$_GET['settings'];
$company=$_GET['company'];
$new_department=$_GET['new_department'];
$creator=$_SESSION['username'];

$sql="insert into departments (dept_code,dept_company,dept_name,created_by,created_date) values ('','$company','$new_department','$creator',curdate())";
$query=mysqli_query($conn, $sql) or die(mysqli_error());

$username=$_SESSION['username'];
$trans="create department $new_department";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());

$return='Location: ../admin.php?settings=1&createdepartment=1&possuccess=1';
header($return);
?>
