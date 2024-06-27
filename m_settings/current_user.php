<?php $current_user=$_SESSION['username'];

	  $s9="select * from users where username='$current_user'";
	  $q9=mysqli_query($conn, $s9) or die(mysqli_error());
	  $r9=mysqli_fetch_assoc($q9);

	  $spas="select * from user_access where username='$current_user'";
	  $qpas=mysqli_query($conn, $spas) or die(mysqli_error());
	  $access=mysqli_fetch_assoc($qpas);
	  
	  $current_position=$r9['position'];
	  $s8="select * from user_positions where position='$current_position'";
	  $q8=mysqli_query($conn, $s8) or die(mysqli_error());
	  $r8=mysqli_fetch_assoc($q8);
?>