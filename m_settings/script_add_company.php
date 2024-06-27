<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

$company=$_REQUEST['company'];
$company_name=$_REQUEST['company_name'];
$company_address=$_REQUEST['company_address'];
$company_tin=$_REQUEST['company_tin'];
$company_email=$_REQUEST['company_email'];
$company_tel=$_REQUEST['company_tel'];
$company_mobile=$_REQUEST['company_mobile'];

mysqli_query($conn, "insert into company (company,company_name,company_address,company_tin,company_email,company_tel,company_mobile) values ('$company','$company_name','$company_address','$company_tin','$company_email','$company_tel','$company_mobile')") or die(mysqli_error());

$username=$_SESSION['username'];
$trans="add new company $company_name";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());

$return='Location: ../admin.php?settings=1&updatecompany=1&addcompanysuccess=1';
header($return);
?>


