<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

include("../css/css2.php");

if(isset($_REQUEST['print_rfp'])){ ?>
<style>
img.proc_rfp { position: absolute; z-index: -1; }
</style>
<!--<img class='proc_rfp' src='img/proc_rfp.jpg'>-->
<?php
}

if(isset($_REQUEST['print_po'])){ ?>
<style>
img.proc_po { position: absolute; z-index: -1; }
div.po_no { position: absolute; left: 700px; top: 80px; z-index: -1; }
div.pr_no { position: absolute; left: 580px; top: 160px; z-index: -1; }
div.add_date { position: absolute; left: 580px; top: 130px; z-index: -1; }
div.supplier { position: absolute; left: 155px; top: 200px; z-index: -1; }
div.supplier_address { position: absolute; left: 115px; top: 230px; z-index: -1; }
div.supplier_contact { position: absolute; left: 600px; top: 228px; z-index: -1; }
div.supplier_email { position: absolute; left: 600px; top: 238px; z-index: -1; }
div.cargo { position: absolute; left: 200px; top: 258px; z-index: -1; }
div.terms { position: absolute; left: 560px; top: 258px; z-index: -1; }
div.content { position: absolute; left: 110px; top: 335px; z-index: -1; }	 			 
div.total_text { position: absolute; left: 450px; top: 528px; }
div.total { position: absolute; left: 580px; top: 528px; }
div.apol { position: absolute; left: 0px; top: 595px; }	 
div.sharm { position: absolute; left: 200px; top: 595px; }	 
div.archie { position: absolute; left: 425px; top: 595px; }	 
div.don { position: absolute; left: 70px; top: 509px; }
div.noted { position: absolute; left: 0px; top: 509px; }
</style>

<img class='proc_po' src='../img/proc_po.jpg'>

<?php //PO and SUPPLIER

	$po_no=$_REQUEST['po_no'];
	
	$username=$_SESSION['username'];
	$trans="po_no=$po_no print initiated";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
	
	$gs1=mysqli_query($conn, "select a.pr_no as pr_no,
							 a.add_date as add_date,
							 b.supplier as supplier,
							 b.address as supplier_address,
							 b.contact as supplier_contact,
							 b.email as supplier_email,
							 c.cargo as cargo,
							 d.terms_desc as terms_desc 
					from m_purchasing_po as a
					inner join m_purchasing_suppliers as b on a.supplier=b.id 
					inner join m_purchasing_cargo as c on a.cargo=c.id 
					inner join m_purchasing_terms as d on a.terms=d.id 
					where a.po_no='$po_no'") or die(mysqli_error($conn));
	$gr1=mysqli_fetch_assoc($gs1);

    //echo "<div class='po_no w3-xlarge'><b>".$_REQUEST['po_no']."</b></div>";
	
	//PR NO
	echo "<div class='pr_no'>".$gr1['pr_no']."</div>";
	
	//ADD DATE
	echo "<div class='add_date'>".date('F d, Y',strtotime($gr1['add_date']))."</div>";
	
	//SUPPLIER
	echo "<div class='supplier'>".$gr1['supplier']."</div>";
	//echo "<div class='supplier_address'><span>".$gr1['supplier_address']."</span></div>";
	//echo "<div class='supplier_contact'><span class='w3-tiny'>".$gr1['supplier_contact']."</span></div>";
	//echo "<div class='supplier_email'><span class='w3-tiny'>".$gr1['supplier_email']."</span></div>";
	
	//CARGO
	echo "<div class='cargo'>".$gr1['cargo']."</div>";
	
    //TERMS
	echo "<div class='terms'>".$gr1['terms_desc']."</div>";
	
    //CONTENT
	echo "<div class='content'>";
	$po_no=$_REQUEST['po_no'];
	$sm1="select b.item as item,
					 a.qty as qty,
					 b.price as price
					from m_purchasing_po_details as a
					inner join m_purchasing_items as b
					on b.id=a.item
					where po_no='$po_no' 
					order by a.add_date desc";
	$qm1=mysqli_query($conn, $sm1) or die(mysqli_error($conn));
	$rm1=mysqli_fetch_assoc($qm1);
	
	echo "<table>";
  do{
	echo "<tr>
			<td class='w3-small' width='65'>".$rm1['qty']."</td>
			<td class='w3-small' width='385'>".$rm1['item']."</td>
			<td class='w3-small' width='120'>".number_format($rm1['price'],2)."</td>
			<td class='w3-small'>".number_format($rm1['qty']*$rm1['price'],2)."</td>
		  </td>";
	} while($rm1=mysqli_fetch_assoc($qm1));
	echo "</div>"; ?>
	
	
<?php //TOTAL
	$sm2="select SUM(a.qty*b.price) as sum
			    from m_purchasing_po_details as a
				inner join m_purchasing_items as b
				on b.id=a.item
				where po_no='$po_no'";
	$qm2=mysqli_query($conn, $sm2) or die(mysqli_error($conn));
	$rm2=mysqli_fetch_assoc($qm2);
	echo "<div class='total'>
			".number_format($rm2['sum'],2)."
		  </div>"; ?>

<div class='total_text'>TOTAL:</div>		  
<div class='apol'><span class='w3-small'>CHERYL P. FERRER</span></div>
<div class='sharm'><span class='w3-small'>SHARMAINE L. MANLAPAZ</span></div>
<div class='archie'><span class='w3-small'>ARCHIE BAYONA / ANGELA CASTRO</span></div>
<div class='noted'><span class='w3-small'>NOTED BY:</span></div>
<div class='don'><span class='w3-small'>ANTHONY ADONIS JUSTO<br/>PRODUCTION DEPARTMENT</span></div>
<?php } ?>