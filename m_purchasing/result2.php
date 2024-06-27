<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }
include("../css/css.php");

if($_REQUEST['s']=='')
{}
else
{	
	$po_no=$_REQUEST['s'];
	$sql=mysqli_query($conn, "select po_name from special_job where po_name like '%$po_no%' group by po_name order by po_name asc");
	while ($row = mysqli_fetch_array($sql))
	{ 
	?>
	
	<a href="script_rfpdetails.php?for_payment=1&rfp_no=<?php echo $_REQUEST['rfp_no']; ?>&po_name=<?php echo $row['po_name']; ?>"><?php echo $row['po_name']; ?></a><br/>
	
	<?php 
}
} 
?>
