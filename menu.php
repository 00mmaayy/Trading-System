  						      <!-- <a href="admin.php?home=1" class="w3-padding" ><i class="fa fa-home fa-fw"></i>  Home</a> DEFAULT -->
<?php if($access['d1']==1){ ?><a href="admin.php?special_job=1&po_list=1" class="w3-padding"><i class="fa fa-money fa-fw"></i>  Sales PO Monitor</a><?php } ?> <!--ADD-ON MODULE-->							  
<?php if($access['a1']==1){ ?><a href="admin.php?sales=1&summary=1" class="w3-padding"><i class="fa fa-money fa-fw"></i>  Orders & Clients</a><?php } ?> <!--ADD-ON MODULE-->
<?php if($access['b1']==1){ ?><a href="admin.php?purchasing=1&summary=1" class="w3-padding"><i class="fa fa-cart-plus fa-fw"></i>  Purchasing</a><?php } ?> <!--ADD-ON MODULE-->							  
<?php if($access['c1']==1){ ?><a href="admin.php?inventory=1&summary=1" class="w3-padding"><i class="fa fa-cubes fa-fw"></i>  Inventory</a><?php } ?> <!--ADD-ON MODULE-->  
<?php if($access['z1']==1){ ?><a href="admin.php?settings=1" class="w3-padding" ><i class="fa fa-gear fa-fw"></i>  Settings</a><?php } ?> <!--DEFAULT-->
							  <a href="index.php?logout=1" class="w3-padding" ><i class="fa fa-power-off fa-fw"></i>  Logout</a>  <!--DEFAULT-->