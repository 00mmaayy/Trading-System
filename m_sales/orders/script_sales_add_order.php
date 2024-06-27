<?php 
session_start();
include('../../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); } ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../css/w3.css">
<link rel="stylesheet" href="../../css/font-awesome.min.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<script src="../../js/jquery.min.js"></script>
<script src="../../js/ajaxloader.js"></script>
<script src="../../js/bootstrap.min.js"></script>

<?php //Access level start
$username=$_SESSION['username'];
$spas="select * from user_access where username='$username'";
$qpas=mysqli_query($conn, $spas);
$access=mysqli_fetch_assoc($qpas);
// access level end 

$client_id=$_REQUEST['client_id'];
$trans_type=$_REQUEST['trans_type'];


?>
<br/><br/><br/>
<div class="container">
<a href="../../admin.php?sales=1&orders=1" onclick="return confirm('Leave this page?')">RETURN</a><br/>

<?php
	$s="select (select name from m_sales_clients where client_id = $client_id) as name,
				(select trans_desc from m_sales_transaction_type where trans_no = $trans_type) as trans_desc";
	$q=mysqli_query($conn,$s) or die(mysqli_error());
	$r=mysqli_fetch_assoc($q);
	
	echo "CLIENT: <b>".$r['name']."</b><br/>THRU: <b>".$r['trans_desc']."</b></br>";
?>
</br>
<a href="script_sales_add_order.php?client_id=<?php echo $_REQUEST['client_id']; ?>&trans_type=<?php echo $_REQUEST['trans_type']; ?>&manual_encode=1">MANUAL ENCODE PO ITEMS</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="script_sales_add_order.php?client_id=<?php echo $_REQUEST['client_id']; ?>&trans_type=<?php echo $_REQUEST['trans_type']; ?>&converted_encode=1">UPLOAD BULK PO ITEMS</a>

<?php 
	  if(isset($_REQUEST['manual_encode']))
		{
			if($_REQUEST['manual_encode']!=1)
			{
				 echo "<br/><span class='w3-text-green'>Encode Success for PO: <b>".$_REQUEST['po_name']."</b></span>"; 
			}	
		}else {}
	?>
<hr/>
<?php if(isset($_REQUEST['manual_encode'])){ ?>
<form method="get" action="script_manual_encode_data.php">

	<input name="client_id" type="hidden" value="<?php echo $_REQUEST['client_id']; ?>">
	<input name="trans_type" type="hidden" value="<?php echo $_REQUEST['trans_type']; ?>">

	<input name="po_number" type="text" placeholder="PO Number" required>
	<input name="from_po_count" type="text" placeholder="Item Number" required>
	<input name="unit" type="text" placeholder="Unit" required>
	<input name="item_name" type="text" placeholder="Description" required>
	<input name="qty_order" type="text" placeholder="Qty Order" required>
	<input name="unit_cost" type="text" placeholder="Unit Price" required>
	<br/><br/>
	<input type="submit" value="INSERT DATA" onclick="return confirm('Insert Data?')">
</form>
<?php } ?>

<?php if(isset($_REQUEST['converted_encode'])){ ?>
<form method="get" action="script_upload_converted_data.php">
	<input name="client_id" type="hidden" value="<?php echo $_REQUEST['client_id']; ?>">
	<input name="trans_type" type="hidden" value="<?php echo $_REQUEST['trans_type']; ?>">
	
	<input name="po_number" type="text" placeholder="Input PO Number Here" required></br></br>
	<a href="../converter/index.html" target="_blank">OPEN DATA CONVERTER APP</a><br/>
	<textarea name="converted_data" type="text" rows="10" cols="150" required></textarea>
	</br><br/>
	<input type="submit" value="UPLOAD DATA" onclick="return confirm('Upload Data?')">
</form>
<?php } ?>

</div>
