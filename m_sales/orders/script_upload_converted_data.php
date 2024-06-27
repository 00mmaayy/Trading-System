<?php 
session_start();
include('../../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); } ?>


<?php //Access level start
$username=$_SESSION['username'];
$spas="select * from user_access where username='$username'";
$qpas=mysqli_query($conn, $spas);
$access=mysqli_fetch_assoc($qpas);
// access level end 


$client_id=$_REQUEST['client_id'];
$trans_type=$_REQUEST['trans_type'];
$po_number=$_REQUEST['po_number'];
$converted_data="INSERT INTO special_job_temp (from_po_count,unit,item_name,qty_order,unit_cost) VALUES ".$_REQUEST['converted_data'];

mysqli_query($conn,$converted_data) or die(mysqli_error());
$sxx="UPDATE special_job_temp SET client_id=$client_id, trans_type=$trans_type, po_name='$po_number', datetime=now()";
mysqli_query($conn,$sxx) or die(mysqli_error());

$s="INSERT INTO special_job (client_id,trans_type,po_name,from_po_count,unit,item_name,qty_order,unit_cost,datetime)
	SELECT client_id,trans_type,po_name,from_po_count,unit,item_name,qty_order,unit_cost,datetime 
	FROM special_job_temp
	WHERE special_job_temp.po_name = '$po_number'";
$q=mysqli_query($conn,$s);

mysqli_query($conn,"TRUNCATE special_job_temp");

header("Location: ../../admin.php?special_job=1&po_list=1");

?>
