<?php 
if(isset($_REQUEST['special_job'])) 
  { ?>   
	<div class="w3-col">
      <div class="w3-container w3-blue w3-padding-15">
	    <div class="w3-left w3-xlarge"><i class="fa fa-cart-plus w3-xlarge"></i>  Purchase Orders List</div>
      </div>
	 
	   <br />
	 
         <ul class="nav nav-tabs">
		 
		  <?php if($access['d2']==1){ ?>
		       <?php if(isset($_REQUEST['po_list'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
				<a href="admin.php?special_job=1&po_list=1"><i class='fa fa-file-text-o'></i> PO List</a></li>
		  <?php } ?>
		 
		 </ul>
     
<?php 

if($access['d2']==1) { 

include('po_list.php'); }

} ?>
