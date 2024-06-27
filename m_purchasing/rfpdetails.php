<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

include("../css/css2.php");
include("../m_settings/access.php");

$rfp_no=$_REQUEST['rfp_no'];

if(isset($_REQUEST['set_term'])){
$rfp_no=$_REQUEST['rfp_no'];
$term=$_REQUEST['set_term'];
mysqli_query($conn, "update m_purchasing_rfp set rfp_terms='$term' where rfp_no='$rfp_no'") or die(mysqli_error($conn));
header('Location: rfpdetails.php?rfp_no='.$_REQUEST['rfp_no']);
}

if(isset($_REQUEST['set_term'])){
$rfp_no=$_REQUEST['rfp_no'];
$term=$_REQUEST['set_term'];
mysqli_query($conn, "update m_purchasing_rfp set rfp_terms='$term' where rfp_no='$rfp_no'") or die(mysqli_error($conn));
header('Location: rfpdetails.php?rfp_no='.$_REQUEST['rfp_no']);
}

if(isset($_REQUEST['request_type'])){
$rfp_no=$_REQUEST['rfp_no'];
$term=$_REQUEST['request_type'];
mysqli_query($conn, "update m_purchasing_rfp set request_type='$term' where rfp_no='$rfp_no'") or die(mysqli_error($conn));
header('Location: rfpdetails.php?rfp_no='.$_REQUEST['rfp_no']);
}

if(isset($_REQUEST['date_needed'])){
$rfp_no=$_REQUEST['rfp_no'];
$date_needed=$_REQUEST['date_needed'];
mysqli_query($conn, "update m_purchasing_rfp set date_needed='$date_needed' where rfp_no='$rfp_no'") or die(mysqli_error($conn));
header('Location: rfpdetails.php?rfp_no='.$_REQUEST['rfp_no']);
}

if(isset($_REQUEST['rr'])){
$rfp_no=$_REQUEST['rfp_no'];
$rr=$_REQUEST['rr'];
$rr_date=$_REQUEST['rr_date'];
mysqli_query($conn, "update m_purchasing_rfp set RR='$rr', RR_date='$rr_date' where rfp_no='$rfp_no'") or die(mysqli_error($conn));
header('Location: rfpdetails.php?rfp_no='.$_REQUEST['rfp_no']);
}

if(isset($_REQUEST['si'])){
$rfp_no=$_REQUEST['rfp_no'];
$si=$_REQUEST['si'];
$si_date=$_REQUEST['si_date'];
mysqli_query($conn, "update m_purchasing_rfp set SI='$si', SI_date='$si_date' where rfp_no='$rfp_no'") or die(mysqli_error($conn));
header('Location: rfpdetails.php?rfp_no='.$_REQUEST['rfp_no']);
}
?>

<script>
function showHint2(str)
{
var s=document.getElementById("search2").value;
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
    document.getElementById("view_result2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","result2.php?rfp_no=<?php echo $rfp_no; ?>&s="+s,true);
xmlhttp.send();
}
</script>

<?php
$sm2="SELECT SUM(rfp_amount) as rfp_total_amount FROM special_job_rfp WHERE rfp_no='$rfp_no'";
$qm2=mysqli_query($conn, $sm2) or die(mysqli_error($conn));
$rm2=mysqli_fetch_assoc($qm2);

$x3="SELECT * FROM special_job_rfp WHERE rfp_no='$rfp_no'";
$y3=mysqli_query($conn, $x3) or die(mysqli_error($conn));
$z3=mysqli_fetch_assoc($y3);
?>

<br>
<div class='container'>

<table class='table' border='1'>
	<tr>
		<td colspan='3'>
			<?php
			$xx=mysqli_query($conn, "select * from m_purchasing_rfp where rfp_no='$rfp_no'");
			$yy=mysqli_fetch_assoc($xx);
			?>
			<span class='w3-tiny'>RFP NO:</span>&nbsp;<b class='w3-xlarge w3-text-blue'><?php echo $rfp_no; ?></b>&nbsp;&nbsp;&nbsp;
			<span class='w3-tiny'>RFP DATE:</span>&nbsp;<span class='w3-tiny w3-text-deep-orange'><?php echo date('m/d/Y',strtotime($yy['add_date'])); ?></span>
		</td>
	</tr>
	
	<tr>
		<td colspan="3">
		
				<table class='table'>
				<tr>
					<td>&nbsp;&nbsp;<br/>
					
					
					<?php
						if($z3['released']==1){}
						else
						{
								if($access['b7']==1){ ?>
								<input class='btn w3-pale-blue w3-tiny' type="text" placeholder='SEARCH PO' id="search2" name="search2" onkeyup="showHint2('x')"/>
								<div id="view_result2"></div>
				<?php   		}
						} ?>
					
					<td>
					<td>
						<span class='w3-tiny'>TERM/S:</span><br/>
						<?php 
						$gs2=mysqli_query($conn, "select b.terms_desc as terms_desc 
										from m_purchasing_rfp as a 
										inner join m_purchasing_terms as b 
										on a.rfp_terms=b.id 
										where a.rfp_no='$rfp_no'") or die(mysqli_error($conn));
						$gr2=mysqli_fetch_assoc($gs2);
						echo "<b class='w3-text-red w3-small'>".$gr2['terms_desc']."</b>";
						
					if($access['b7']==1)
						{
							if($z3['released']==1){}
							else
							{
								$sd=mysqli_query($conn, "select id,terms_desc from m_purchasing_terms order by terms asc") or die(mysqli_error($conn));
								$rd=mysqli_fetch_assoc($sd);
								echo "<form>
										<select required name='set_term' class='btn w3-light-gray w3-tiny'><option></option>";
								do{ echo "<option value='".$rd['id']."'>".$rd['terms_desc']."</option>";
								}while($rd=mysqli_fetch_assoc($sd));
								  echo "</select>"; ?>
								<input name='rfp_no' type='hidden' value='<?php echo $_REQUEST['rfp_no']; ?>'>
								<input class='btn w3-tiny w3-blue' type='submit' value='SET'>
								</form>
					<?php 	}
						} ?>
					
					</td>
					<td>
						<span class='w3-tiny'>TYPE OF REQUEST:</span><br/><b class='w3-text-red w3-small'><?php echo $yy['request_type']; ?></b>
						
				<?php if($access['b7']==1)
						{ 
							if($z3['released']==1){}
							else
							{ ?>	
							<form>
							<select required name='request_type' class='btn w3-light-gray w3-tiny'>
								<option></option>
								<option>PAYMENT</option>
								<option>CASH ADVANCE</option>
								<option>REIMBURSEMENT</option>
							</select>
							<input name='rfp_no' type='hidden' value='<?php echo $_REQUEST['rfp_no']; ?>'>
							<input class='btn w3-tiny w3-blue' type='submit' value='SET'>
							</form>
					<?php 	}
						} ?>
					
					</td>
					<td>
						<span class='w3-tiny'>DATE NEEDED:</span><br/><b class='w3-text-red w3-small'><?php echo date('m/d/Y',strtotime($yy['date_needed'])); ?></b>
					
					<?php if($access['b7']==1)
						  { 
							if($z3['released']==1){}
							else
							{ ?>
								<form>
								<input required name='date_needed' type='date' class='btn w3-light-gray w3-tiny'>
								<input name='rfp_no' type='hidden' value='<?php echo $_REQUEST['rfp_no']; ?>'>
								<input class='btn w3-tiny w3-blue' type='submit' value='SET'>
								</form>
						<?php }
						  } ?>
					
					</td>
					
					<td>
						<span class='w3-tiny'>RR:</span><b class='w3-text-red w3-small'><?php echo $yy['RR']; ?></b><br/>
						<span class='w3-tiny'>RR Date:</span><b class='w3-text-red w3-small'><?php echo date('m/d/Y',strtotime($yy['RR_date'])); ?></b>
						
				<?php if($access['b7']==1)
						{ 
					
							if($z3['released']==1){}
							else
							{	?>
								<form>
								<input required name='rr' type='text' placeholder='INPUT R.R.' class='btn w3-light-gray w3-tiny'>
								<input required name='rr_date' type='date' class='btn w3-light-gray w3-tiny'>
								<input name='rfp_no' type='hidden' value='<?php echo $_REQUEST['rfp_no']; ?>'>
								<input class='btn w3-tiny w3-blue' type='submit' value='SET'>
								</form>
					<?php   } 
						} ?>
					</td>
					
					
					<td>
						<span class='w3-tiny'>SI:</span><b class='w3-text-red w3-small'><?php echo $yy['SI']; ?></b><br/>
						<span class='w3-tiny'>SI Date:</span><b class='w3-text-red w3-small'><?php echo date('m/d/Y',strtotime($yy['SI_date'])); ?></b>
						
					<?php if($access['b7']==1)
						{ 
							if($z3['released']==1){}
							else
							{	?>	
								<form>
								<input required name='si' type='text' placeholder='INPUT S.I.' class='btn w3-light-gray w3-tiny'>
								<input required name='si_date' type='date' class='btn w3-light-gray w3-tiny'>
								<input name='rfp_no' type='hidden' value='<?php echo $_REQUEST['rfp_no']; ?>'>
								<input class='btn w3-tiny w3-blue' type='submit' value='SET'>
								</form>
					  <?php } 
						} ?>	
					</td>
				</tr>
				</table>
		
		
		</td>
	</tr>
	<tr>
		<td align='center' colspan="3">
			<form method='get' action='print_rfp.php' target='_blank'>
				<input name='rfp_total' type='hidden' value='<?php echo $rm2['rfp_total_amount']; ?>'>
				<input name='rfp_no' type='hidden' value='<?php echo $_REQUEST['rfp_no']; ?>'>
				<input class='btn w3-amber w3-tiny' name='print_rfp' type='submit' value='PRINT RFP'>
			</form>
		</td>
	</tr>
	
	
	
	
	
	
	
	<tr class='w3-green w3-tiny'>
		<td>PO NO</td>
		<td>AMOUNT FOR PAYMENT</td>
		<td align='right'>AMOUNT FOR RELEASE / STATUS</td>
	</tr>
	
	<?php
		
		$sm1="SELECT * FROM special_job_rfp WHERE rfp_no='$rfp_no'";
		$qm1=mysqli_query($conn, $sm1) or die(mysqli_error($conn));
		$rm1=mysqli_fetch_assoc($qm1);
		
		do{
			$po_name=$rm1['po_name'];
			$x="select ( select sum(qty_order*unit_cost) from special_job where po_name='$po_name') as po_amount,
							 ( select sum(qty_dr*supplier_cost) from special_job where po_name='$po_name') as supplier_amount,
							 ( select sum(supplier_cost*qty_order_to_supplier) from special_job where po_name='$po_name') as dr_amount
					  ";
			$y=mysqli_query($conn, $x) or die(mysqli_error());
			$z=mysqli_fetch_assoc($y);
			
			echo "<tr>
					<td>";
					
					if($rm1['released']==0){
					?>
					
					<a class='fa fa-trash' href='script_rfpdetails.php?remove_po=1&rfp_id=<?php echo $rm1['id']; ?>&rfp_no=<?php echo $_REQUEST['rfp_no']; ?>' title='REMOVE THIS PO' onclick="return confirm('REMOVE PO?')"></a>
				
				<?php 
					}else{}
				
					echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>".$rm1['po_name']."</b></td>
					<td align='right'><b>".number_format($z['dr_amount'],2)."</b></td>
					
					<td align='right'>";
					
						if($rm1['released']==1)
							{ echo "<b class='w3-text-GREEN'>RELEASED</b>"; }
						else{ echo "<b class='w3-text-red'>PENDING</b>"; }
				echo "</td>
				</tr>";
		
		
		}while($rm1=mysqli_fetch_assoc($qm1));
	
	
		echo "<tr><td colspan='2' align='right'>TOTAL:&nbsp;&nbsp;&nbsp;<b class='w3-text-red'>".number_format($rm2['rfp_total_amount'],2)."</b></td>
		<td align='right'>"; 
		echo $rm1['released'];
		
		if($z3['released']==0)
			{
		?>
			<a class='w3-button-red' href='script_rfpdetails.php?release_rfp=1&rfp_no=<?php echo $_REQUEST['rfp_no']; ?>' title='RELEASE FUND FOR THIS RFP' onclick="return confirm('RELEASE FUND?')">
			APPROVE AND RELEASE FUND
			</a>
	<?php   }else{ echo "Released by:&nbsp;".$z3['released_by']."<br/>".date('F d, Y H:i A', strtotime($z3['released_datetime'])); }
echo "</td>
		</tr>";
	?>
</table>
</div>