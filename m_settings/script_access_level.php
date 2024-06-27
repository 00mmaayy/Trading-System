<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); } ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<?php
//User access level update script start -----
if(isset($_REQUEST['user_access_update']))
{
	
$user_access=$_REQUEST['user_access'];
$username=$_SESSION['username'];



//PURCHASING--
if(isset($_REQUEST['b1']))
	{ 	mysqli_query($conn, "update user_access set b1=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b1=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b1=0 where username='$user_access' ");
		$trans="access_level update for $user_access b1=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['b2']))
	{ 	mysqli_query($conn, "update user_access set b2=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b2=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b2=0 where username='$user_access' ");
		$trans="access_level update for $user_access b2=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['b3']))
	{ 	mysqli_query($conn, "update user_access set b3=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b3=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b3=0 where username='$user_access' ");
		$trans="access_level update for $user_access b3=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['b4']))
	{ 	mysqli_query($conn, "update user_access set b4=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b4=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b4=0 where username='$user_access' ");
		$trans="access_level update for $user_access b4=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	

if(isset($_REQUEST['b5']))
	{ 	mysqli_query($conn, "update user_access set b5=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b5=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b5=0 where username='$user_access' ");
		$trans="access_level update for $user_access b5=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['b6']))
	{ 	mysqli_query($conn, "update user_access set b6=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b6=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b6=0 where username='$user_access' ");
		$trans="access_level update for $user_access b=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['b7']))
	{ 	mysqli_query($conn, "update user_access set b7=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b7=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b7=0 where username='$user_access' ");
		$trans="access_level update for $user_access b7=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['b8']))
	{ 	mysqli_query($conn, "update user_access set b8=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b8=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b8=0 where username='$user_access' ");
		$trans="access_level update for $user_access b8=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['b9']))
	{ 	mysqli_query($conn, "update user_access set b9=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b9=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b9=0 where username='$user_access' ");
		$trans="access_level update for $user_access b9=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	

if(isset($_REQUEST['b10']))
	{ 	mysqli_query($conn, "update user_access set b10=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b10=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b10=0 where username='$user_access' ");
		$trans="access_level update for $user_access b10=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	

if(isset($_REQUEST['b11']))
	{ 	mysqli_query($conn, "update user_access set b11=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b11=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b11=0 where username='$user_access' ");
		$trans="access_level update for $user_access b11=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['b12']))
	{ 	mysqli_query($conn, "update user_access set b12=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b12=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b12=0 where username='$user_access' ");
		$trans="access_level update for $user_access b12=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['b13']))
	{ 	mysqli_query($conn, "update user_access set b13=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b13=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b13=0 where username='$user_access' ");
		$trans="access_level update for $user_access b13=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['b14']))
	{ 	mysqli_query($conn, "update user_access set b14=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b14=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b14=0 where username='$user_access' ");
		$trans="access_level update for $user_access b14=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	

if(isset($_REQUEST['b15']))
	{ 	mysqli_query($conn, "update user_access set b15=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b15=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b15=0 where username='$user_access' ");
		$trans="access_level update for $user_access b15=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['b16']))
	{ 	mysqli_query($conn, "update user_access set b16=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b16=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b16=0 where username='$user_access' ");
		$trans="access_level update for $user_access b16=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['b17']))
	{ 	mysqli_query($conn, "update user_access set b17=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b17=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b17=0 where username='$user_access' ");
		$trans="access_level update for $user_access b17=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['b18']))
	{ 	mysqli_query($conn, "update user_access set b18=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b18=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b18=0 where username='$user_access' ");
		$trans="access_level update for $user_access b18=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['b19']))
	{ 	mysqli_query($conn, "update user_access set b19=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b19=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b19=0 where username='$user_access' ");
		$trans="access_level update for $user_access b19=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	

if(isset($_REQUEST['b20']))
	{ 	mysqli_query($conn, "update user_access set b20=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b20=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b20=0 where username='$user_access' ");
		$trans="access_level update for $user_access b20=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['b21']))
	{ 	mysqli_query($conn, "update user_access set b21=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b21=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b21=0 where username='$user_access' ");
		$trans="access_level update for $user_access b21=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['b22']))
	{ 	mysqli_query($conn, "update user_access set b22=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b22=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b22=0 where username='$user_access' ");
		$trans="access_level update for $user_access b22=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['b23']))
	{ 	mysqli_query($conn, "update user_access set b23=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b23=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b23=0 where username='$user_access' ");
		$trans="access_level update for $user_access b23=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['b24']))
	{ 	mysqli_query($conn, "update user_access set b24=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b24=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b24=0 where username='$user_access' ");
		$trans="access_level update for $user_access b24=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	

if(isset($_REQUEST['b25']))
	{ 	mysqli_query($conn, "update user_access set b25=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b25=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b25=0 where username='$user_access' ");
		$trans="access_level update for $user_access b25=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
//PURCHASING--


//PURCHASING SPECIAL JOB--

//PURCHASING--
if(isset($_REQUEST['c1']))
	{ 	mysqli_query($conn, "update user_access set c1=1 where username='$user_access' "); 
		$trans="access_level update for $user_access c1=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set c1=0 where username='$user_access' ");
		$trans="access_level update for $user_access c1=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['c2']))
	{ 	mysqli_query($conn, "update user_access set c2=1 where username='$user_access' "); 
		$trans="access_level update for $user_access c2=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set c2=0 where username='$user_access' ");
		$trans="access_level update for $user_access c2=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['c3']))
	{ 	mysqli_query($conn, "update user_access set c3=1 where username='$user_access' "); 
		$trans="access_level update for $user_access c3=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set c3=0 where username='$user_access' ");
		$trans="access_level update for $user_access c3=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['c4']))
	{ 	mysqli_query($conn, "update user_access set c4=1 where username='$user_access' "); 
		$trans="access_level update for $user_access c4=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set c4=0 where username='$user_access' ");
		$trans="access_level update for $user_access c4=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	

if(isset($_REQUEST['c5']))
	{ 	mysqli_query($conn, "update user_access set c5=1 where username='$user_access' "); 
		$trans="access_level update for $user_access c5=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set c5=0 where username='$user_access' ");
		$trans="access_level update for $user_access c5=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['c6']))
	{ 	mysqli_query($conn, "update user_access set c6=1 where username='$user_access' "); 
		$trans="access_level update for $user_access c6=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set c6=0 where username='$user_access' ");
		$trans="access_level update for $user_access c6=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
//PURCHASING SPECIAL JOB--


if(isset($_REQUEST['d1']))
	{ 	mysqli_query($conn, "update user_access set d1=1 where username='$user_access' "); 
		$trans="access_level update for $user_access d1=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set d1=0 where username='$user_access' ");
		$trans="access_level update for $user_access d1=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['d2']))
	{ 	mysqli_query($conn, "update user_access set d2=1 where username='$user_access' "); 
		$trans="access_level update for $user_access d2=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set d2=0 where username='$user_access' ");
		$trans="access_level update for $user_access d2=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
	if(isset($_REQUEST['d3']))
	{ 	mysqli_query($conn, "update user_access set d3=1 where username='$user_access' "); 
		$trans="access_level update for $user_access d3=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set d3=0 where username='$user_access' ");
		$trans="access_level update for $user_access d3=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
	if(isset($_REQUEST['d4']))
	{ 	mysqli_query($conn, "update user_access set d4=1 where username='$user_access' "); 
		$trans="access_level update for $user_access d4=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set d4=0 where username='$user_access' ");
		$trans="access_level update for $user_access d4=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
	if(isset($_REQUEST['d5']))
	{ 	mysqli_query($conn, "update user_access set d5=1 where username='$user_access' "); 
		$trans="access_level update for $user_access d5=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set d5=0 where username='$user_access' ");
		$trans="access_level update for $user_access d5=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
	if(isset($_REQUEST['d6']))
	{ 	mysqli_query($conn, "update user_access set d6=1 where username='$user_access' "); 
		$trans="access_level update for $user_access d6=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set d6=0 where username='$user_access' ");
		$trans="access_level update for $user_access d6=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}


//SALES--
if(isset($_REQUEST['a1']))
	{ 	mysqli_query($conn, "update user_access set a1=1 where username='$user_access' "); 
		$trans="access_level update for $user_access a1=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set a1=0 where username='$user_access' ");
		$trans="access_level update for $user_access a1=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['a2']))
	{ 	mysqli_query($conn, "update user_access set a2=1 where username='$user_access' "); 
		$trans="access_level update for $user_access a2=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set a2=0 where username='$user_access' ");
		$trans="access_level update for $user_access a2=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['a3']))
	{ 	mysqli_query($conn, "update user_access set a3=1 where username='$user_access' "); 
		$trans="access_level update for $user_access a3=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set a3=0 where username='$user_access' ");
		$trans="access_level update for $user_access a3=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['a4']))
	{ 	mysqli_query($conn, "update user_access set a4=1 where username='$user_access' "); 
		$trans="access_level update for $user_access a4=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set a4=0 where username='$user_access' ");
		$trans="access_level update for $user_access a4=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	

if(isset($_REQUEST['a5']))
	{ 	mysqli_query($conn, "update user_access set a5=1 where username='$user_access' "); 
		$trans="access_level update for $user_access a5=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set a5=0 where username='$user_access' ");
		$trans="access_level update for $user_access a5=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	

if(isset($_REQUEST['a6']))
	{ 	mysqli_query($conn, "update user_access set a6=1 where username='$user_access' "); 
		$trans="access_level update for $user_access a6=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set a6=0 where username='$user_access' ");
		$trans="access_level update for $user_access a6=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}		
//SALES--


//SETTING--
if(isset($_REQUEST['z1']))
	{ 	mysqli_query($conn, "update user_access set z1=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z1=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z1=0 where username='$user_access' ");
		$trans="access_level update for $user_access z1=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z2']))
	{ 	mysqli_query($conn, "update user_access set z2=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z2=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z2=0 where username='$user_access' ");
		$trans="access_level update for $user_access z2=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['z3']))
	{ 	mysqli_query($conn, "update user_access set z3=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z3=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z3=0 where username='$user_access' ");
		$trans="access_level update for $user_access z3=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z4']))
	{ 	mysqli_query($conn, "update user_access set z4=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z4=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z4=0 where username='$user_access' ");
		$trans="access_level update for $user_access z4=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}		
	
if(isset($_REQUEST['z5']))
	{ 	mysqli_query($conn, "update user_access set z5=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z5=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z5=0 where username='$user_access' ");
		$trans="access_level update for $user_access z5=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z6']))
	{ 	mysqli_query($conn, "update user_access set z6=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z6=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z6=0 where username='$user_access' ");
		$trans="access_level update for $user_access z6=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['z7']))
	{ 	mysqli_query($conn, "update user_access set z7=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z7=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z7=0 where username='$user_access' ");
		$trans="access_level update for $user_access z7=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z8']))
	{ 	mysqli_query($conn, "update user_access set z8=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z8=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z8=0 where username='$user_access' ");
		$trans="access_level update for $user_access z8=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z9']))
	{ 	mysqli_query($conn, "update user_access set z9=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z9=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z9=0 where username='$user_access' ");
		$trans="access_level update for $user_access z9=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['z10']))
	{ 	mysqli_query($conn, "update user_access set z10=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z10=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z10=0 where username='$user_access' ");
		$trans="access_level update for $user_access z10=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z11']))
	{ 	mysqli_query($conn, "update user_access set z11=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z11=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z11=0 where username='$user_access' ");
		$trans="access_level update for $user_access z11=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
//SETTING--

$loca='Location: ../m_settings/script_access_level.php?updated=1&user_access='.$_REQUEST['user_access'];
header($loca);
}
//User access level update script end -----
?>

<?php echo "<div align='center'><br><strong><a href='../admin.php?settings=1'>RETURN</a></strong></div>";?>
<hr>
<div align='center' class='w3-text-red'><strong>ACCESS LEVEL EDITOR</strong></div><br>

<?php
$s="select username from users order by username asc";
$q=mysqli_query($conn, $s) or die(mysqli_error());
$r=mysqli_fetch_assoc($q);

if(isset($_REQUEST['user_access'])) 
{
$user_access=$_REQUEST['user_access'];
$s1="select * from user_access where username='$user_access' ";
$q1=mysqli_query($conn, $s1) or die(mysqli_error());
$access=mysqli_fetch_assoc($q1);
}

echo "<form align='center' method='get'>
      <select name='user_access'><option disabled selected>select user</option>";
do{
echo "<option>".$r['username']."</option>";	
}while($r=mysqli_fetch_assoc($q));
echo "</select>
      <input type='submit' value='Show / Edit Access'>
      </form>";
?>

<hr>

<div class='w3-container' align='center'><strong>USER ACCESS LIST FOR ACCOUNT&nbsp;&nbsp;<?php echo "<span class='w3-xlarge w3-text-red'>".$_REQUEST['user_access']."</span>";  if(isset($_REQUEST['updated'])) { echo "&nbsp;&nbsp;<span class='w3-xlarge w3-text-green'>Updated!</span>"; } ?></strong></div>

<br>
<div class='w3-container'>
<form method='get'>
<input name='user_access' type='hidden' value='<?php echo $user_access; ?>'>
<input name='user_access_update' type='hidden' value='1'>


<table class="w3-table w3-border" border="1">
	<tr>
		<td>
	
		<!--Access checkbox for Purchasing Start ----->
			<table>
				<tr><td colspan='2'><input name='b1' type='checkbox' <?php if($access['b1']==1){ echo "checked";} ?> >&nbsp;<strong>PURCHASING</strong>&nbsp;<span class='w3-tiny'>b1</td></tr>
				<!--<tr><td colspan='2'><input name='b2' type='checkbox' <?php // if($access['b2']==1){ echo "checked";} ?> >&nbsp;View PO&nbsp;<span class='w3-tiny'>b2</td></tr>-->
				<!--<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='b3' type='checkbox' <?php// if($access['b3']==1){ echo "checked";} ?> >&nbsp;Create PO&nbsp;<span class='w3-tiny'>b3</td></tr>-->
				<!--<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='b6' type='checkbox' <?php// if($access['b6']==1){ echo "checked";} ?> >&nbsp;Manage PO&nbsp;<span class='w3-tiny'>b6</td></tr>-->
				<tr><td colspan='2'><input name='b4' type='checkbox' <?php  if($access['b4']==1){ echo "checked";} ?> >&nbsp;View RFP&nbsp;<span class='w3-tiny'>b4</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='b5' type='checkbox' <?php if($access['b5']==1){ echo "checked";} ?> >&nbsp;Create RFP&nbsp;<span class='w3-tiny'>b5</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='b7' type='checkbox' <?php if($access['b7']==1){ echo "checked";} ?> >&nbsp;Manage RFP&nbsp;<span class='w3-tiny'>b7</td></tr>
				<!--<tr><td colspan='2'><input name='b8' type='checkbox' <?php // if($access['b8']==1){ echo "checked";} ?> >&nbsp;View Items&nbsp;<span class='w3-tiny'>b8</td></tr>-->
				<!--<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='b9' type='checkbox' <?php// if($access['b9']==1){ echo "checked";} ?> >&nbsp;Add Items&nbsp;<span class='w3-tiny'>b9</td></tr>-->
				<!--<tr><td colspan='2'><input name='b10' type='checkbox' <?php // if($access['b10']==1){ echo "checked";} ?> >&nbsp;View Units&nbsp;<span class='w3-tiny'>b10</td></tr>-->
				<!--<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='b11' type='checkbox' <?php// if($access['b11']==1){ echo "checked";} ?> >&nbsp;Add Units&nbsp;<span class='w3-tiny'>b11</td></tr>-->
				<!--<tr><td colspan='2'><input name='b12' type='checkbox' <?php // if($access['b12']==1){ echo "checked";} ?> >&nbsp;View Item Category&nbsp;<span class='w3-tiny'>b12</td></tr>-->
				<!--<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='b13' type='checkbox' <?php// if($access['b13']==1){ echo "checked";} ?> >&nbsp;Add Item Category&nbsp;<span class='w3-tiny'>b13</td></tr>-->
				<tr><td colspan='2'><input name='b14' type='checkbox' <?php if($access['b14']==1){ echo "checked";} ?> >&nbsp;View Suppliers&nbsp;<span class='w3-tiny'>b14</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='b15' type='checkbox' <?php if($access['b15']==1){ echo "checked";} ?> >&nbsp;Add Supplier&nbsp;<span class='w3-tiny'>b15</td></tr>
				<tr><td colspan='2'><input name='b18' type='checkbox' <?php if($access['b18']==1){ echo "checked";} ?> >&nbsp;View Supplier Terms&nbsp;<span class='w3-tiny'>b18</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='b19' type='checkbox' <?php if($access['b19']==1){ echo "checked";} ?> >&nbsp;Add Supplier Terms&nbsp;<span class='w3-tiny'>b19</td></tr>
				<tr><td colspan='2'><input name='b16' type='checkbox' <?php if($access['b16']==1){ echo "checked";} ?> >&nbsp;View Cargo Forwarders&nbsp;<span class='w3-tiny'>b16</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='b17' type='checkbox' <?php if($access['b17']==1){ echo "checked";} ?> >&nbsp;Add Cargo Forwarder&nbsp;<span class='w3-tiny'>b17</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
			</table>
			<!--Access checkbox for Purchasing End ---->
		</td>
		<td>
		<table>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='d1' type='checkbox' <?php if($access['d1']==1){ echo "checked";} ?> >&nbsp;<strong>Sales P.O. Monitor</strong>&nbsp;<span class='w3-tiny'>d1</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='d2' type='checkbox' <?php if($access['d2']==1){ echo "checked";} ?> >&nbsp;P.O. List&nbsp;<span class='w3-tiny'>d2</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='d3' type='checkbox' <?php if($access['d3']==1){ echo "checked";} ?> >&nbsp;Change P.O. Name&nbsp;<span class='w3-tiny'>d3</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='d4' type='checkbox' <?php if($access['d4']==1){ echo "checked";} ?> >&nbsp;Change P.O. Status&nbsp;<span class='w3-tiny'>d4</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='d5' type='checkbox' <?php if($access['d5']==1){ echo "checked";} ?> >&nbsp;Enable P.O. Details Updating&nbsp;<span class='w3-tiny'>d5</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='d6' type='checkbox' <?php if($access['d6']==1){ echo "checked";} ?> >&nbsp;Viewing of Comparisons&nbsp;<span class='w3-tiny'>d6</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
			</table>
	
	
		
		</td>
		<td>
	
	
			<!--Access checkbox for Sales Start ------->
			<table>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='a1' type='checkbox' <?php if($access['a1']==1){ echo "checked";} ?> >&nbsp;<strong>Orders & Clients</strong>&nbsp;<span class='w3-tiny'>a1</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='a2' type='checkbox' <?php if($access['a2']==1){ echo "checked";} ?> >&nbsp;Orders&nbsp;<span class='w3-tiny'>a2</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='a3' type='checkbox' <?php if($access['a3']==1){ echo "checked";} ?> >&nbsp;Clients&nbsp;<span class='w3-tiny'>a3</td></tr>
				<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='a5' type='checkbox' <?php if($access['a5']==1){ echo "checked";} ?> >&nbsp;Add Clients&nbsp;<span class='w3-tiny'>a5</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
			</table>
			<!--Access checkbox for Sales End ------->
	
	
		</td>
		<td>
		
	
			<!--Access checkbox for Setting Start ------->
			<table>
			<tr><td colspan='2'><input name='z1' type='checkbox' <?php if($access['z1']==1){ echo "checked";} ?> >&nbsp;<strong>SETTINGS</strong>&nbsp;<span class='w3-tiny'>z1</td></tr>
			   <tr><td>&nbsp;&nbsp;</td><td><input name='z2' type='checkbox' <?php if($access['z2']==1){ echo "checked";} ?> >&nbsp;User Maintenance&nbsp;<span class='w3-tiny'>z2</td></tr>
			   <tr><td>&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;<input name='z3' type='checkbox' <?php if($access['z3']==1){ echo "checked";} ?> >&nbsp;Change Password&nbsp;<span class='w3-tiny'>z3</td></tr>		   
			   <tr><td>&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;<input name='z4' type='checkbox' <?php if($access['z4']==1){ echo "checked";} ?> >&nbsp;Create User&nbsp;<span class='w3-tiny'>z4</td></tr>	
			   <tr><td>&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;<input name='z11' type='checkbox' <?php if($access['z11']==1){ echo "checked";} ?> >&nbsp;User Clear/Enable/Disable&nbsp;<span class='w3-tiny'>z11</td></tr>	
			   <tr><td>&nbsp;&nbsp;</td><td><input name='z5' type='checkbox' <?php if($access['z5']==1){ echo "checked";} ?> >&nbsp;User Position&nbsp;<span class='w3-tiny'>z5</td></tr>
			   <tr><td>&nbsp;&nbsp;</td><td><input name='z6' type='checkbox' <?php if($access['z6']==1){ echo "checked";} ?> >&nbsp;Company Details&nbsp;<span class='w3-tiny'>z6</td></tr>
			   <tr><td>&nbsp;&nbsp;</td><td><input name='z7' type='checkbox' <?php if($access['z7']==1){ echo "checked";} ?> >&nbsp;Create Access Level&nbsp;<span class='w3-tiny'>z7</td></tr>
			   <tr><td>&nbsp;&nbsp;</td><td><input name='z8' type='checkbox' <?php if($access['z8']==1){ echo "checked";} ?> >&nbsp;Backup Database&nbsp;<span class='w3-tiny'>z8</td></tr>
			   <tr><td>&nbsp;&nbsp;</td><td><input name='z9' type='checkbox' <?php if($access['z9']==1){ echo "checked";} ?> >&nbsp;Logbook Viewer&nbsp;<span class='w3-tiny'>z9</td></tr>
			   <tr><td>&nbsp;&nbsp;</td><td><input name='z10' type='checkbox' <?php if($access['z10']==1){ echo "checked";} ?> >&nbsp;Departments&nbsp;<span class='w3-tiny'>z10</td></tr>
			<tr><td colspan='2'>&nbsp;</td></tr>
			</table>
			<!--Access checkbox for Setting End ------->

		</td>
	</tr>
</table>	
<hr>		
	<div align='center'><input class='btn btn-danger w3-xlarge' type="submit" value="Update Access" onclick="return confirm('Update Access? Sigurado ka?')"></div>
</form>
</div>