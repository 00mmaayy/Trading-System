<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

if($_REQUEST['s']==""){ }
else{
	$item=$_REQUEST['s'];
	$sql=mysqli_query($conn,"select a.id, a.item, b.category as category_sub, c.category as category_unique
							from m_purchasing_items a
							left join m_purchasing_category_sub b on a.id = b.id
							left join m_purchasing_category_unique c on a.id = c.id
							where a.item like '%$item%'
							order by a.item asc");
	while ($row = mysqli_fetch_array($sql))
	{
	?>
		&nbsp;&nbsp;<form method='get' action='script_podetails.php'>
						<input name='po_no' type='hidden' value='<?php echo $_REQUEST['po_no']; ?>'>
						<input name='item' type='hidden' value='<?php echo $row['id']; ?>'>
						<span class='w3-tiny'><?php echo $row['category_sub']; ?></span> | 
						<span class='w3-tiny'><?php echo $row['category_unique']; ?></span> | 
						<span class='w3-tiny'><?php echo $row['item']; ?></span>
						<input name='qty' class='btn w3-tiny' placeholder='Input Quantity' type='number' step='any' required>
						<input name='item_add' class='w3-tiny btn w3-red' type='submit' value='ADD ITEM' onclick='return confirm("ADD ITEM?")'>
					</form>
	<?php 
	}

}
?>