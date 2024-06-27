<!--Purchasing Start-->
<?php 
if(isset($_REQUEST['purchasing'])) 
  { ?>   
	<div class="w3-col">
      <div class="w3-container w3-blue w3-padding-15">
	    <div class="w3-left w3-xlarge"><i class="fa fa-cart-plus w3-xlarge"></i>  Purchasing</div>
      </div>
	 
	   <br />
	 
         <ul class="nav nav-tabs">
		 
		  <?php if($access['b2']==1){ ?>
		       <?php if(isset($_REQUEST['po_list'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
				<a href="admin.php?purchasing=1&po_list=1"><i class='fa fa-file-text-o'></i> PO Monitor</a></li>
		  <?php } ?>
		  
		  <?php if($access['b4']==1){ ?>
		       <?php if(isset($_REQUEST['rfp_list'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
				<a href="admin.php?purchasing=1&rfp_list=1"><i class='fa fa-file-text'></i> RFP Monitor</a></li>
		  <?php } ?>
		  
		  <?php if($access['b8']==1){ ?>
		       <?php if(isset($_REQUEST['items'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
				<a href="admin.php?purchasing=1&items=1"><i class='fa fa-dropbox'></i> Items</a></li>
		  <?php } ?>
		  
		  <?php if($access['b10']==1){ ?>
		       <?php if(isset($_REQUEST['units'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
				<a href="admin.php?purchasing=1&units=1"><i class='fa fa-cube'></i> Units</a></li>
		  <?php } ?>
		  
		  <?php if($access['b12']==1){ ?>
		       <?php if(isset($_REQUEST['category'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
				<a href="admin.php?purchasing=1&category=1"><i class='fa fa-gears'></i> Category</a></li>
		  <?php } ?>
		  
		  <?php if($access['b14']==1){ ?>
		       <?php if(isset($_REQUEST['suppliers'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
				<a href="admin.php?purchasing=1&suppliers=1"><i class='fa fa-list-alt'></i> Suppliers</a></li>
		  <?php } ?>
		  
		  <?php if($access['b16']==1){ ?>
		       <?php if(isset($_REQUEST['cargo'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
				<a href="admin.php?purchasing=1&cargo=1"><i class='fa fa-truck'></i> Cargo Forwarder</a></li>
		  <?php } ?>
		  
		  <?php if($access['b18']==1){ ?>
		       <?php if(isset($_REQUEST['terms'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
				<a href="admin.php?purchasing=1&terms=1"><i class='fa fa-credit-card'></i> Terms Maintenance</a></li>
		  <?php } ?>
		  
		  <?php if($access['b18']==1){ ?>
		       <?php if(isset($_REQUEST['sig'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
				<a href="admin.php?purchasing=1&sig=1"><i class='fa fa-credit-card'></i> Signatories</a></li>
		  <?php } ?>
		  
		  <?php //if($access['d2']==1){ ?>
		       <?php // if(isset($_REQUEST['reports'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
				<!--<a href="admin.php?purchasing=1&reports=1"><i class='fa fa-files-o'></i> Reports</a></li>-->
		  <?php //} ?>
          
		  </ul>
     
<?php 

if($access['b2']==1) { include('po_list.php'); }
if($access['b4']==1) { include('rfp_list.php'); }
if($access['b8']==1) { include('items.php'); }
if($access['b10']==1){ include('units.php'); }
if($access['b12']==1){ include('category.php'); }
if($access['b14']==1){ include('suppliers.php'); }
if($access['b16']==1){ include('cargo.php'); }
if($access['b18']==1){ include('terms.php'); }
if($access['b19']==1){ include('signatories.php'); }

} ?>
<!--Purchasing End-------->
