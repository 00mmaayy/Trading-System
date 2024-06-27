<?php
date_default_timezone_set("Asia/Manila");
include('conn/conn.php');
session_start();

$s="select * from company";
$q=mysqli_query($conn, $s) or die(mysqli_error($conn));
$r=mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html>

	<head>
	    <?php echo "<title>".$r['company_name']."</title>"; ?>
		<link rel="stylesheet" href="css/style.css">
	</head>

<body bgcolor="#66ccff">
<style>div{font-size: 12px;}</style>
<div><a style='color:#4d4dff' href='m_settings/clearallusers.php'><i>clear</i></a></div>
<div class="login-page">
  <div class="form">
  <div align="center"><img src="img/<?php echo $r['company']; ?>.jpg" height="80" width="130"/><br><br/></div>
    <form class="login-form" method="post">
      <input name="username" type="text" placeholder="username"/>
      <input name="password" type="password" placeholder="password"/>
      <button>login</button>  
    </form>
	
<?php
if(isset($_REQUEST['username']))
   {   $username=addslashes($_REQUEST['username']);
       
	   if(isset($_REQUEST['password']))
	   { $password= md5($_REQUEST['password']); } 
		  
	   $sql1="select * from users where username='$username' and password='$password'" ;
	   $result1= mysqli_query($conn, $sql1) or die(mysqli_error());
	   $row1=mysqli_fetch_assoc($result1);
		
 	   $pos=$row1['position'];
	   $_SESSION['username']= $username;
				 
	   if($username!=$row1['username'] || $password!=$row1['password'])
		  { if($pos!=0)
				{ 
					echo "<br><div class='styles' align='center' style='color:#FF0000'>Login Failed! username or password is incorrect!!!!</div>";
					$username= $_SESSION['username'];
					$activity= "login error";
					$sql1="INSERT INTO access_log (username,activity,date) VALUES ('$username','$activity',now())" ;
					$result1= mysqli_query($conn, $sql1) or die(mysqli_error());
				}
		  }	  
							  
	   if($pos!=0)
		  { 
	        if($row1['user_status']==1)
			  { 
				echo "<br><div class='styles' align='center' style='color:#FF0000'>Login Failed! user is in use or you forgot to loggout properly! <br>please contact IT administrator</div>"; 
			    $username= $_SESSION['username'];
				$activity= "no logout";
				$sql1="INSERT INTO access_log (username,activity,date) VALUES ('$username','$activity',now())" ;
				$result1= mysqli_query($conn, $sql1) or die(mysqli_error());
			  }
	        
			else{
			$activity= "login";
            $sql1="INSERT INTO access_log (username,activity,date) VALUES ('$username','$activity',now())" ;
            $result1= mysqli_query($conn, $sql1) or die(mysqli_error());
			
			$sql2="UPDATE users SET user_status=1 where username='$username'";
            $result2= mysqli_query($conn, $sql2) or die(mysqli_error());
			
			header("location: admin.php?special_job=1&po_list=1"); }
		  }
	 else { 
			echo "<br><div class='styles' align='center' style='color:#FF0000'>Login Failed! username or password is incorrect!!!</div>"; 
			$username= $_SESSION['username'];
			$activity= "login error";
			$sql1="INSERT INTO access_log (username,activity,date) VALUES ('$username','$activity',now())" ;
			$result1= mysqli_query($conn, $sql1) or die(mysqli_error());
		  }	
}
?>

<?php
if (isset($_REQUEST['logout']))
   {
   $username= $_SESSION['username'];
   $activity= "logout";
   $sql1="INSERT INTO access_log (username,activity,date) VALUES ('$username','$activity',now())" ;
   $result1= mysqli_query($conn, $sql1) or die(mysqli_error());
   
   $sql2="UPDATE users SET user_status=0 where username='$username'" ;
   $result2= mysqli_query($conn, $sql2) or die(mysqli_error());
   
   unset($_SESSION['username']);
   header("Location: index.php");
   }   
?>     

<?php	
	if(isset($_REQUEST['cleared']))
	{
		echo "<br/>user: ".$_REQUEST['cleared']." Cleared!<br/>You can now login you account.";
		$username= $_REQUEST['cleared'];
		$activity= "clear user";
		$sql1="INSERT INTO access_log (username,activity,date) VALUES ('$username','$activity',now())" ;
		$result1= mysqli_query($conn, $sql1) or die(mysqli_error());
	}
?>	
	
  </div>  
</div>
</body>
</html>