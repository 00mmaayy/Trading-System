<?php 
include('../conn/conn.php');
if(isset($_REQUEST['username']))
{
	$username=$_REQUEST['username'];
	mysqli_query($conn, "update users set user_status=0 where username='$username' and user_status=1") or die(mysqli_error());
	header("Location: ../index.php?cleared=$username");
}
else
{ ?><br/><br/><br/><br/>
	<div align="center">
	<form>
		<input size="50" name="username" placeholder="input username to clear login" type="text">
		<input type="submit" value="clear user">
	</form>
	</div>
<?php 
}
?>
