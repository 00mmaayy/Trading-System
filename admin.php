<?php
include('conn/conn.php');
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }
date_default_timezone_set("Asia/Manila");
$s="select * from company";
$q=mysqli_query($conn, $s) or die(mysqli_error());
$r=mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html>
<title><?php echo $r['company_name']; ?></title>

<?php include("css/css.php"); ?>

<body style='background:#f2f2f2'>

<!-- Top container ----->
<div class="w3-container w3-top w3-indigo w3-large w3-padding" style="z-index:4">
  <button class="w3-button w3-hide-large w3-padding-0 w3-indigo w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-right"><?php echo $r['company_name']; ?></span>
</div>
<!-- Top container ----->

<!-- Sidenav/menu -->
<?php include("m_settings/current_user.php"); ?>

<nav class="w3-sidenav w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidenav">
  <br/>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
	<i class='fa fa-address-book-o w3-text-gray w3-jumbo'></i>
	<!--<img src="img/default.png" class="w3-circle" style="width:80%">-->
	</div>
    <div class="w3-col s8 w3-bar">
	<span class="text-primary">Current User:</span><br>
    <span class="text-primary"><strong><?php echo $r9['first_name']." ".$r9['last_name'];?></strong><br>
   <?php echo $r8['pos_description']; ?>
	</span>
    </div>
  </div>
<hr>
<?php include("menu.php"); //SHOULD BE UPDATE IF A MODULE IS ADDED ?>
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="mySidenav"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:35px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px"></header>
 <div class="w3-row-padding w3-margin-bottom">
<?php 

//ADD-ON MODULES
include('m_special_job/menu_special_job.php');
include('m_sales/menu_sales.php');
include('m_purchasing/menu_purchasing.php');
include('m_inventory/menu_inventory.php');

//DEFAULT MODULE
include('m_home/menu_home.php');
include('m_settings/menu_settings.php');

?>
		
  </div>

</div>
</body>
</html>


<script>
// Get the Sidenav
var mySidenav = document.getElementById("mySidenav");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidenav, and add overlay effect
function w3_open() {
    if (mySidenav.style.display === 'block') {
        mySidenav.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidenav.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidenav with the close button
function w3_close() {
    mySidenav.style.display = "none";
    overlayBg.style.display = "none";
}
</script>