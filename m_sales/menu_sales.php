<!--Sales Start-------->
<?php if(isset($_REQUEST['sales'])) { ?>   
<div class="w3-col">
      <div class="w3-container w3-blue w3-padding-15">
        <div class="w3-left w3-xlarge"><i class="fa fa-calculator w3-xlarge"></i>  Orders & Clients</div>
      </div>
	  
	  <br>
	  
		<ul class="nav nav-tabs">
        
			<?php if($access['a2']==1){ ?>
					 <?php if(isset($_REQUEST['orders'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
					 <a href="admin.php?sales=1&orders=1"><i class="fa fa-shopping-cart fa-fw"></i> Orders</a></li>
			<?php } ?>
			
			<?php if($access['a3']==1){ ?>
					 <?php if(isset($_REQUEST['clients'])) { echo "<li class='active'>"; } else { echo "<li class='inactive'>"; } ?>
					 <a href="admin.php?sales=1&clients=1"><i class="fa fa-user fa-fw"></i> Clients</a></li>
			<?php } ?>	
			
		</ul>

<?php include('orders.php'); ?>
<?php include('clients.php'); ?>
	
</div>  
<?php } ?>
<!--Sales End------------>