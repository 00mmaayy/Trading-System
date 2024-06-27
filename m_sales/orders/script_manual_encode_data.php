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
$from_po_count=$_REQUEST['from_po_count'];
$unit=$_REQUEST['unit'];
$item_name=$_REQUEST['item_name'];
$qty_order=$_REQUEST['qty_order'];
$unit_cost=$_REQUEST['unit_cost'];

$converted_data="INSERT INTO special_job 
					(client_id,trans_type,po_name,from_po_count,unit,item_name,qty_order,unit_cost,datetime) 
				 VALUES 
				    ('$client_id','$trans_type','$po_number','$from_po_count','$unit','$item_name','$qty_order','$unit_cost',now())";

mysqli_query($conn,$converted_data) or die(mysqli_error());

header("Location: script_sales_add_order.php?manual_encode=success&po_name=".$_REQUEST['po_number']."&client_id=".$_REQUEST['client_id']."&trans_type=".$_REQUEST['trans_type']."&manual_encode=1");

?>
