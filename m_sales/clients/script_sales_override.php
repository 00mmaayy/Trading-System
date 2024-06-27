<?php 
session_start();
include('../../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); } 
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../css/w3.css">
<link rel="stylesheet" href="../../css/font-awesome.min.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>

<?php
$username=$_SESSION['username'];
$sx="select * from users where username='$username'";
$qx=mysqli_query($conn, $sx) or die(mysqli_error($conn));
$rx=mysqli_fetch_assoc($qx);

//OVERRIDE REQUEST SETTER START
			if(isset($_REQUEST['vip_x']))
			{ 
				$bch=$rx['bch'];
				$requester=$_SESSION['username'];
				$client_id=$_REQUEST['client_id'];
				$vip_x=$_REQUEST['vip_x'];
				$vip="vip";
				
				mysqli_query($conn, "insert into m_sales_client_override (bch,requester,request_datetime,client_id,trans,trans_vip) values ('$bch','$requester',now(),'$client_id','$vip',$vip_x)");
				header('location: script_sales_edit_clients.php?client_id='.$_REQUEST['client_id']);
			}

			if(isset($_REQUEST['terms_x']))
			{ 
				$bch=$rx['bch'];
				$requester=$_SESSION['username'];
				$client_id=$_REQUEST['client_id'];
				$terms_x=$_REQUEST['terms_x'];
				$terms="terms";
				
				mysqli_query($conn, "insert into m_sales_client_override (bch,requester,request_datetime,client_id,trans,trans_terms) values ('$bch','$requester',now(),'$client_id','$terms',$terms_x)");
				header('location: script_sales_edit_clients.php?client_id='.$_REQUEST['client_id']);
			}

			if(isset($_REQUEST['credit_limit_x']))
			{ 
				$bch=$rx['bch'];
				$requester=$_SESSION['username'];
				$client_id=$_REQUEST['client_id'];
				$credit_limit_x=$_REQUEST['credit_limit_x'];
				$credit_limit="credit_limit";
				
				mysqli_query($conn, "insert into m_sales_client_override (bch,requester,request_datetime,client_id,trans,trans_credit_limit) values ('$bch','$requester',now(),'$client_id','$credit_limit',$credit_limit_x)");
				header('location: script_sales_edit_clients.php?client_id='.$_REQUEST['client_id']);
			}
//OVERRIDE REQUEST SETTER END




//OVERRIDE APPROVAL AREA START
			$sx1="SELECT * FROM m_sales_client_override";
			$qx1=mysqli_query($conn, $sx1) or die(mysqli_error($conn));
			$rx1=mysqli_fetch_assoc($qx1);

			do{
				
				if($rx1['trans']=="vip")
				{
						$client_id=$rx1['client_id'];
						$vip1=$rx1['trans']; 
						
						$s="select name, vip from m_sales_clients where client_id=$client_id";
						$q=mysqli_query($conn, $s) or die(mysqli_error($conn));
						$r=mysqli_fetch_assoc($q);
						
						switch($r['vip'])
						{
							case 0: $vip="Cash"; break;
							case 1: $vip="VIP"; break;
							case 2: $vip="Government"; break;
							case 3: $vip="COD"; break;
							case 4: $vip="X-Deal"; break;
							case 5: $vip="Regular"; break;
						}
						
						switch($rx1['trans_vip'])
						{
							case 0: $vip1="Cash"; break;
							case 1: $vip1="VIP"; break;
							case 2: $vip1="Government"; break;
							case 3: $vip1="COD"; break;
							case 4: $vip1="X-Deal"; break;
							case 5: $vip1="Regular"; break;
						}
						?>
						
						<div class='container w3-xlarge' align='center'>
							<hr/>
							<span class='w3-text-red w3-xxlarge'>MSG: NEEDS OVERRIDE!</span>
							<br/>
							CLIENT: <b class='w3-text-indigo'><?php echo $r['name']; ?></b>
							<br/>
							<?php echo "CHANGE OF STATUS<br/>FROM <b class='w3-text-pink'>".$vip."</b> TO <b class='w3-text-pink'>".$vip1."</b>"; ?> 
							<br/>
							<br/>
							<form method='post'>
								<input name='client_id' type='hidden' value='<?php echo $rx1['client_id']; ?>'>
								<input name='vip' type='hidden' value='<?php echo $rx1['trans_vip']; ?>'>
								<input name='id' type='hidden' value='<?php echo $rx1['id']; ?>'>
								<input name='override' type='password' placeholder='Input Password'><br/><br/>
								<input class='btn btn-success w3-xlarge' type='submit' value='Approve' onclick='return confirm("Approve Request?")'>
							</form>
						<div>
					
					<?php
						if(isset($_REQUEST['override']))
						{	
							$username=$_SESSION['username'];
							$sx="select password from users where username='$username'";
							$qx=mysqli_query($conn, $sx) or die(mysqli_error($conn));
							$rx=mysqli_fetch_assoc($qx);
							
							if($rx['password']==md5($_REQUEST['override']))
							{	
								$trans="submit override to sales client id $client_id to change vip status";
								$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
								$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
								header('location: script_sales_edit_clients.php?client_id='.$_REQUEST['client_id'].'&vip='.$_REQUEST['vip'].'&id='.$_REQUEST['id']);
							}else{ echo "<span class='w3-text-red'>ERROR PASSWORD!<br/>PLEASE TRY AGAIN!</span>"; }
						}else{}
				}

				
				
				
				if($rx1['trans']=="terms")
				{
						$client_id=$rx1['client_id'];
						$terms=$rx1['trans'];
						$s="select name, terms from m_sales_clients where client_id=$client_id";
						$q=mysqli_query($conn, $s) or die(mysqli_error($conn));
						$r=mysqli_fetch_assoc($q);
						?>
						
						<div class='container w3-xlarge' align='center'>
							<br/>
							<br/>
							<span class='w3-text-red w3-xxlarge'>MSG: NEEDS OVERRIDE!</span>
							<br/>
							CLIENT: <b class='w3-text-indigo'><?php echo $r['name']; ?></b>
							<br/>
							<?php echo "CHANGE OF TERMS<br/>FROM <b class='w3-text-pink'>".$r['terms']."</b> DAYS TO <b class='w3-text-pink'>".$rx1['trans_terms']."</b> DAYS"; ?> 
							<br/>
							<?php echo "REQUESTED BY <b class='w3-text-green'>".$rx1['requester']."</b>"; ?>
							<br/>
							
							<form method='post'>
								<input name='client_id' type='hidden' value='<?php echo $rx1['client_id']; ?>'>
								<input name='terms' type='hidden' value='<?php echo $rx1['trans_terms']; ?>'>
								<input name='id' type='hidden' value='<?php echo $rx1['id']; ?>'>
								<input name='override' type='password' placeholder='Input Password'><br/><br/>
								<input class='btn btn-success w3-xlarge' type='submit' value='Approve' onclick='return confirm("Approve Request?")'>
							</form>
							
						<div>
					
					<?php
						if(isset($_REQUEST['override']))
						{	
							$username=$_SESSION['username'];
							$sx="select password from users where username='$username'";
							$qx=mysqli_query($conn, $sx) or die(mysqli_error($conn));
							$rx=mysqli_fetch_assoc($qx);
							
							if($rx['password']==md5($_REQUEST['override']))
							{	
								$trans="submit override to sales client id $client_id to change terms";
								$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
								$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
								header('location: script_sales_edit_clients.php?client_id='.$_REQUEST['client_id'].'&terms='.$_REQUEST['terms'].'&id='.$_REQUEST['id']);
							}else{ echo "<span class='w3-text-red'>ERROR PASSWORD!<br/>PLEASE TRY AGAIN!</span>"; }
						}else{}
				
				}

				
				
				
				if($rx1['trans']=="credit_limit")
				{
						$client_id=$rx1['client_id'];
						$credit_limit=$rx1['trans'];
						$s="select name, credit_limit from m_sales_clients where client_id=$client_id";
						$q=mysqli_query($conn, $s) or die(mysqli_error($conn));
						$r=mysqli_fetch_assoc($q);
						?>
						
						<div class='container w3-xlarge' align='center'>
							<br/>
							<br/>
							<span class='w3-text-red w3-xxlarge'>MSG: NEEDS OVERRIDE!</span>
							<br/>
							CLIENT: <b class='w3-text-indigo'><?php echo $r['name']; ?></b>
							<br/>
							<?php echo "CHANGE OF CREDIT LIMIT<br/>FROM <b class='w3-text-pink'>".number_format($r['credit_limit'],2)."</b> TO <b class='w3-text-pink'>".number_format($rx1['trans_credit_limit'],2)."</b>"; ?> 
							<br/>
							<?php echo "REQUESTED BY <b class='w3-text-green'>".$rx1['requester']."</b>"; ?>
							<br/>
							<form method='post'>
								<input name='client_id' type='hidden' value='<?php echo $rx1['client_id']; ?>'>
								<input name='credit_limit' type='hidden' value='<?php echo $rx1['trans_credit_limit']; ?>'>
								<input name='id' type='hidden' value='<?php echo $rx1['id']; ?>'>
								<input name='override' type='password' placeholder='Input Password'><br/><br/>
								<input class='btn btn-success w3-xlarge' type='submit' value='Approve' onclick='return confirm("Approve Request?")'>
							</form>
						<div>
					
					<?php
						if(isset($_REQUEST['override']))
						{	
							$username=$_SESSION['username'];
							$sx="select password from users where username='$username'";
							$qx=mysqli_query($conn, $sx) or die(mysqli_error($conn));
							$rx=mysqli_fetch_assoc($qx);
							
							if($rx['password']==md5($_REQUEST['override']))
							{	
								$trans="submit override to sales client id $client_id to change vip status";
								$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
								$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
								header('location: script_sales_edit_clients.php?client_id='.$_REQUEST['client_id'].'&credit_limit='.$_REQUEST['credit_limit'].'&id='.$_REQUEST['id']);
							}else{ echo "<span class='w3-text-red'>ERROR PASSWORD!<br/>PLEASE TRY AGAIN!</span>"; }
						} else{}
				}


				
				
			}while($rx1=mysqli_fetch_assoc($qx1));
			
//OVERRIDE APPROVAL AREA END

?>