<!--Inventory Start-->
  <?php if(isset($_REQUEST['inventory'])) { ?>   
	<div class="w3-col">
      <div class="w3-container w3-blue w3-padding-15">
	    <div class="w3-left w3-xlarge"><i class="fa fa-cubes w3-xlarge"></i>  Inventory</div>
      </div>
	 
	 <br>
	  
		<ul class="nav nav-tabs">
        
			<?php //if($access['a2']==1){ ?>
					 <?php if(isset($_REQUEST['inventory_items'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
					 <a href="admin.php?inventory=1&inventory_items=1"><i class="fa fa-bank fa-fw"></i> Inventory Items</a></li>
			<?php //} ?>
		
		
			<?php //if($access['a4']==1){ ?>
					 <?php if(isset($_REQUEST['store_items'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
					 <a href="admin.php?inventory=1&store_items=1"><i class="fa fa-cubes fa-fw"></i> Store Items</a></li>
			<?php //} ?>
			
			
			<?php //if($access['a2']==1){ ?>
					 <?php if(isset($_REQUEST['inventory_reports'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
					 <a href="admin.php?inventory=1&inventory_reports=1"><i class="fa fa-calendar-check-o fa-fw"></i> Inventory Reports</a></li>
			<?php //} ?>
			
			
		</ul>

		
		
<?php include('store_items.php'); ?>
<?php include('inventory_items.php'); ?>
<?php //include('inventory_reports.php'); ?>
	
	
	 
    </div>
  <?php } ?>
<!--Inventory End-->