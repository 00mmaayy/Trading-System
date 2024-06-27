<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

if(isset($_REQUEST['item_add'])){
$username=$_SESSION['username'];
$po_no=$_REQUEST['po_no'];
$item=$_REQUEST['item'];
$qty=$_REQUEST['qty'];
mysqli_query($conn, "insert into m_purchasing_po_details (po_no,item,qty,add_by,add_date) values ('$po_no','$item','$qty','$username',now())") or die(mysqli_error($conn));

$trans="PO:$po_no  Item:$item  Qty:$qty";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));

header('Location: podetails.php?po_no='.$_REQUEST['po_no']);
}
?>
