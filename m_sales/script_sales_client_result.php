<?php 
include('../conn/conn.php');
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }
$client=$_REQUEST['s'];
if($client==""){}
else
{
	$sql=mysqli_query($conn,"select client_id, name from m_sales_clients where name like '%$client%'");
	while ($row = mysqli_fetch_array($sql))
	{ 
		echo "&nbsp;&nbsp;&nbsp;<a href='admin.php?client_id=".$row['client_id']."&sales=1&orders=1&create_order=1'>".$row['name']."</a><br>";
	}
} ?>