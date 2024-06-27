<?php 
$current_user=$_SESSION['username'];
$spas="select * from user_access where username='$current_user'";
$qpas=mysqli_query($conn, $spas) or die(mysqli_error());
$access=mysqli_fetch_assoc($qpas);
?>