<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/w3.css">
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/ajaxloader.js"></script>
		<link rel="stylesheet" href="../css/style.css">
	</head>
<body>
<?php
$s_po="select approved_by from m_purchasing_po where po_no='".$_REQUEST['po_no']."'";
$q_po=mysqli_query($conn, $s_po) or die(mysqli_error($conn));
$r_po=mysqli_fetch_assoc($q_po);

$username=$_SESSION['username'];
if(isset($_REQUEST['set_client']))
{
	$client=$_REQUEST['set_client'];
	$po_no=$_REQUEST['po_no'];
	mysqli_query($conn, "update m_purchasing_po set client_id=$client where po_no='$po_no'") or die(mysqli_error($conn));
	
	$trans="po_no=$po_no client=$client";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
	
	header('Location: podetails.php?po_no='.$_REQUEST['po_no']);
}

if(isset($_REQUEST['set_supplier']))
{
	$supplier=$_REQUEST['set_supplier'];
	$po_no=$_REQUEST['po_no'];
	mysqli_query($conn, "update m_purchasing_po set supplier='$supplier' where po_no='$po_no'") or die(mysqli_error($conn));
	
	$trans="po_no=$po_no supplier=$supplier";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
	
	header('Location: podetails.php?po_no='.$_REQUEST['po_no']);
}

if(isset($_REQUEST['set_cargo']))
{
	$cargo=$_REQUEST['set_cargo'];
	$po_no=$_REQUEST['po_no'];
	mysqli_query($conn, "update m_purchasing_po set cargo='$cargo' where po_no='$po_no'") or die(mysqli_error($conn));
	
	$trans="po_no=$po_no cargo=$cargo";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
	
	header('Location: podetails.php?po_no='.$_REQUEST['po_no']);
}

if(isset($_REQUEST['set_term']))
{
	$term=$_REQUEST['set_term'];
	$po_no=$_REQUEST['po_no'];
	mysqli_query($conn, "update m_purchasing_po set terms='$term' where po_no='$po_no'") or die(mysqli_error($conn));
	
	$trans="po_no=$po_no term=$term";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
	
	header('Location: podetails.php?po_no='.$_REQUEST['po_no']);
}

if(isset($_REQUEST['pr_no']))
{
	$pr_no=$_REQUEST['pr_no'];
	$po_no=$_REQUEST['po_no'];
	mysqli_query($conn, "update m_purchasing_po set pr_no='$pr_no' where po_no='$po_no'") or die(mysqli_error($conn));
	
	$trans="po_no=$po_no cargo=$pr_no";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
	
	header('Location: podetails.php?po_no='.$_REQUEST['po_no']);
}

if(isset($_REQUEST['pr_referrence']))
{
	$pr_referrence=$_REQUEST['pr_referrence'];
	$po_no=$_REQUEST['po_no'];
	mysqli_query($conn, "update m_purchasing_po set pr_referrence='$pr_referrence' where po_no='$po_no'") or die(mysqli_error($conn));
	
	$trans="po_no=$po_no pr_referrence=$pr_referrence";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
	
	header('Location: podetails.php?po_no='.$_REQUEST['po_no']);
}

$po_no=$_REQUEST['po_no'];
?>

<script>
function showHint1(str)
{
var s=document.getElementById("search1").value;
var xmlhttp;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("view_result1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","result1.php?item_add=1&po_no=<?php echo $po_no; ?>&s="+s,true);
xmlhttp.send();
}
</script>

<?php include('../m_settings/access.php'); ?>

<table class='w3-table'>
	<tr>
		<td colspan='4' align='center' class='w3-indigo w3-large'>PO MANAGER</td>
	</tr>
	<tr>
		<td colspan='4' align='center'>
			<?php
			$xx=mysqli_query($conn, "select * from m_purchasing_po where po_no='$po_no'");
			$yy=mysqli_fetch_assoc($xx);
			?>
			<b>PO NO:</b> <b class='w3-text-red'><?php echo $po_no; ?></b><br/>
			<b>PO DATE:</b> <b class='w3-text-red'><?php echo date('m/d/Y',strtotime($yy['add_date'])); ?></b>
		</td>
	</tr>
	<tr>
		<td colspan='5'>
		
			<table class='w3-table'>
				<tr>
					<td>
								<span>FOR SUPPLY TO:</span><br/>
								<?php
									$po_no=$_REQUEST['po_no'];
									$gs1=mysqli_query($conn, "select b.name as name 
															  from m_purchasing_po as a 
															  inner join m_sales_clients as b 
															  on a.client_id=b.client_id 
															  where a.po_no='$po_no'") or die(mysqli_error($conn));
									$gr1=mysqli_fetch_assoc($gs1);
									echo "<b class='w3-text-blue w3-large'>".$gr1['name']."</b>"; ?>
					
								
						<?php if($access['b6']==1)
								{
									$sd=mysqli_query($conn, "select client_id,name from m_sales_clients order by name asc") or die(mysqli_error($conn));
									$rd=mysqli_fetch_assoc($sd);
							  
									if($r_po['approved_by']=="")
									{ 
									echo "<form>
											<select class='w3-select' name='set_client'><option></option>";
											do{ echo "<option value='".$rd['client_id']."'>".$rd['name']."</option>";
											}while($rd=mysqli_fetch_assoc($sd));
									  echo "</select>"; ?>
										<input name='po_no' type='hidden' value='<?php echo $_REQUEST['po_no']; ?>'>
										<input class='btn w3-blue w3-tiny' type='submit' value='SET'>
									</form>
							  <?php }else{} ?>	
						  <?php }else{ echo "<br/>"; } //access level ?>
					</td>
					<td>
									<span>PR NO:</span><br/>
									<b class='w3-text-blue w3-large'>
									<?php echo $yy['pr_no']; ?>
									</b>
					
									<tr>
					  <?php if($access['b6']==1)
							{ 
								if($r_po['approved_by']=="")
								{ ?>
									<tr class='w3-green w3-tiny'> 
								<form>
									<input class='w3-input' required name='pr_no' type='text' placeholder='Input PR Details'>
									<input name='po_no' type='hidden' value='<?php echo $po_no; ?>'>
									<input class='btn w3-tiny w3-blue' type='submit' value='SET'>
								</form>
						  <?php }else{} ?>		
					  <?php }else{ echo "<br/>"; } //access level ?>
					</td>
					<td>
									<span>PR REFERRENCE:</span><br/>
									<b class='w3-text-blue w3-large'>
									<?php echo $yy['pr_referrence']; ?>
									</b>
					
						<?php if($access['b6']==1)
								{ ?>
							
							
							  <?php if($r_po['approved_by']=="")
									{ ?>
										<form>
											<input class='w3-input' required name='pr_referrence' type='text' placeholder='Input Referrence'>
											<input name='po_no' type='hidden' value='<?php echo $po_no; ?>'>
											<input class='btn w3-tiny w3-blue' type='submit' value='SET'>
										</form>
							  <?php }else{} ?>		
						  <?php }else{ echo "<br/>"; } //access level ?>
					</td>
					<td>
						<span>SUPPLIER NAME:</span><br/>
						
						<?php
							$po_no=$_REQUEST['po_no'];
							$gs1=mysqli_query($conn, "select b.supplier as supplier 
											from m_purchasing_po as a 
											inner join m_purchasing_suppliers as b 
											on a.supplier=b.id 
											where a.po_no='$po_no'") or die(mysqli_error($conn));
							$gr1=mysqli_fetch_assoc($gs1);
							echo "<b class='w3-text-red w3-large'>".$gr1['supplier']."</b>"; ?>
					
				  <?php if($access['b6']==1)
						{
							$sd=mysqli_query($conn, "select id,supplier from m_purchasing_suppliers order by supplier asc") or die(mysqli_error($conn));
							$rd=mysqli_fetch_assoc($sd);
							
							
							
							if($r_po['approved_by']=="")
							{
							echo "<form>
									  <select class='w3-select' name='set_supplier'><option></option>";
								do{ echo "<option value='".$rd['id']."'>".$rd['supplier']."</option>";
								}while($rd=mysqli_fetch_assoc($sd));
								echo "</select>"; ?>
								<input name='po_no' type='hidden' value='<?php echo $_REQUEST['po_no']; ?>'>
								<input class='btn w3-tiny w3-red' type='submit' value='SET'>
								
							</form>
					  <?php }else { } ?>
							
				  <?php }else{ echo "<br/>"; } //access level ?>
			
					</td>
					<td>
					
						<span>SHIPPING INSTRUCTION:</span><br/>
						<?php 
						
							$po_no=$_REQUEST['po_no'];
							$gs2=mysqli_query($conn, "select b.cargo as cargo 
											from m_purchasing_po as a 
											inner join m_purchasing_cargo as b 
											on a.cargo=b.id 
											where a.po_no='$po_no'") or die(mysqli_error($conn));
							$gr2=mysqli_fetch_assoc($gs2);
							echo "<b class='w3-text-red w3-large'>".$gr2['cargo']."</b>"; ?>
							
					
				  <?php if($access['b6']==1)
						{
							$sd=mysqli_query($conn, "select id,cargo from m_purchasing_cargo order by cargo asc") or die(mysqli_error($conn));
							$rd=mysqli_fetch_assoc($sd);
							
							
							
							if($r_po['approved_by']==""){
							echo "<form>
									<select class='w3-select' name='set_cargo'><option></option>";
							do{ echo "<option value='".$rd['id']."'>".$rd['cargo']."</option>";
							}while($rd=mysqli_fetch_assoc($sd));
							  echo "</select>"; ?>
							<input name='po_no' type='hidden' value='<?php echo $_REQUEST['po_no']; ?>'>
							<input class='btn w3-tiny w3-red' type='submit' value='SET'>
							</form>
							<?php } else { } ?>
							
							
							
						<?php }else{ echo "<br/>"; } //access level ?>
					
					</td>
					<td>
					
						<span>TERMS TO SUPPLIER:</span></br>
			
					<?php   $po_no=$_REQUEST['po_no'];
							$gs2=mysqli_query($conn, "select b.terms_desc as terms_desc 
											from m_purchasing_po as a 
											inner join m_purchasing_terms as b 
											on a.terms=b.id 
											where a.po_no='$po_no'") or die(mysqli_error($conn));
							$gr2=mysqli_fetch_assoc($gs2);
					
						echo "<b class='w3-text-red w3-large'>".$gr2['terms_desc']."</b>"; ?>
						
				<?php if($access['b6']==1)
						{
							$sd=mysqli_query($conn, "select id,terms_desc from m_purchasing_terms order by terms asc") or die(mysqli_error($conn));
							$rd=mysqli_fetch_assoc($sd);
							
							
							if($r_po['approved_by']=="")
							{
							echo "<form>
									<select class='w3-select' name='set_term'><option></option>";
								do
								{ echo "<option value='".$rd['id']."'>".$rd['terms_desc']."</option>";
								}while($rd=mysqli_fetch_assoc($sd));
							  echo "</select>"; ?>
							<input name='po_no' type='hidden' value='<?php echo $_REQUEST['po_no']; ?>'>
							<input class='btn w3-tiny w3-red' type='submit' value='SET'>
							</form>
					  <?php }else{} ?>
							
				  <?php }else{echo "<br/>";} //access level ?>	
					</td>
				</tr>
			</table>
		
		</td>	
	</tr>
	
	<tr>
		<td>&nbsp;</td>
	</tr>
		
	<tr>
		<td>
			<?php if($access['b6']==1) { ?>
			
				<?php if($r_po['approved_by']==""){ ?>	
					<input class='w3-input' type="text" placeholder='&nbsp SEARCH ITEM' id="search1" name="search1" onkeyup="showHint1('x')"/>
					<div id="view_result1"></div>
				<?php } else { } ?> 
		
		<?php } ?>
		</td>
		<td>
		</td>
		<td>
				<table>
					<tr>
						<td>
							<?php if($r_po['approved_by']==""){ ?>
							<form method='get' action='script_submit_po.php'>
								<input name='po_no' type='hidden' value='<?php echo $_REQUEST['po_no']; ?>'>
								<input class='btn w3-yellow w3-large' name='print_po' type='submit' value='PLACE ORDER' onclick='return confirm("Place Order Now?")'>
							</form>
							<?php } else { echo "<br/><b class='w3-text-blue w3-large'>ORDER PLACED</b>"; } ?>
						</td>
						<td>
							
							<form method='get' action='print_po.php' target='_blank'>
								<input name='po_no' type='hidden' value='<?php echo $_REQUEST['po_no']; ?>'>
								<input class='btn w3-amber w3-large' name='print_po' type='submit' value='PRINT PO' onclick='return confirm("Initiate Print?")'>
							</form>
						</td>
					</tr>	
				</table>	
		</td>
		
	</tr>
		<td>
			&nbsp;
		</td>
	</tr>
		<td>ITEM</td>
		<td>QTY</td>
		<td>UNIT PRICE</td>
		<td>TOTAL</td>
	</tr>
	<?php
		$po_no=$_REQUEST['po_no'];
		$sm1="select y.category as brand, x.category as cat_sub1, b.item as item,
					 a.qty as qty,
					 a.id as id,
					 b.price as price
			    from m_purchasing_po_details as a
				left join m_purchasing_items as b on b.id=a.item
				left join m_purchasing_category_sub as x on b.category_sub=x.id
				left join m_purchasing_category_unique as y on b.category_unique=y.id
				where po_no='$po_no' 
				order by a.add_date desc";
		$qm1=mysqli_query($conn, $sm1) or die(mysqli_error($conn));
		$rm1=mysqli_fetch_assoc($qm1);
		$x=1;
		do{
			echo "<tr>
					<td>"; ?>
				
				<?php if($r_po['approved_by']==""){ ?>
				<a href="script_remove_po_item.php?po_no=<?php echo $po_no; ?>&id=<?php echo $rm1['id']; ?>&cat_sub1=<?php echo $rm1['cat_sub1']; ?>&brand=<?php echo $rm1['brand']; ?>&item=<?php echo $rm1['item']; ?>" class="fa fa-trash" onclick="return confirm('Remove item?')"></a>
				<?php } ?>		
						
	    <?php echo "&nbsp;&nbsp;<span class='w3-small w3-text-orange'>".$x++.". </span>".$rm1['cat_sub1'].": ".$rm1['brand']." ".$rm1['item']."</td>
					<td>".$rm1['qty']."</td>
					<td>".number_format($rm1['price'],2)."</td>
					<td>".number_format($rm1['qty']*$rm1['price'],2)."</td>
				</tr>";
		}while($rm1=mysqli_fetch_assoc($qm1));
	
	
		$sm2="select SUM(a.qty*b.price) as sum
			    from m_purchasing_po_details as a
				inner join m_purchasing_items as b
				on b.id=a.item
				where po_no='$po_no'";
		$qm2=mysqli_query($conn, $sm2) or die(mysqli_error($conn));
		$rm2=mysqli_fetch_assoc($qm2);
		
		echo "<tr><td colspan='4' align='right'>TOTAL:&nbsp;&nbsp;&nbsp;<b class='w3-text-red'>".number_format($rm2['sum'],2)."</b></td></tr>";
		
		$total1=$rm2['sum'];
		mysqli_query($conn, "update m_purchasing_po set po_amount='$total1' where po_no='$po_no'") or die(mysqli_error($conn));
	
	?>
</table>

</div>

</body>
</html>