<?php 
//Add signatories Start-----
if(isset($_REQUEST['sig']))
{ ?>
<br>
	<table class='table'>
	
	
	<?php if($access['b19']){ ?>
		<tr class='w3-tiny w3-deep-purple w3-text-white'> 
			<td colspan='3'>SIGNATORIES</td>
		</tr>
		<?php if(isset($_REQUEST['success'])){ ?>
			<tr><td class='w3-text-green'>Add Success!</td></tr>
	    <?php } ?>
		<tr>
			<form method='get' action='m_purchasing/script_purchasing.php'>
			<td>
				<?php
				$qq=mysqli_query($conn, "SELECT * FROM m_purchasing_sig");
				$rr=mysqli_fetch_assoc($qq);
				?>
				<select class="form-control" name="sig_area" required>
				<?php do{
							echo "<option value='".$rr['id']."'>".$rr['sig_area']."</option>";
						}while($rr=mysqli_fetch_assoc($qq)); ?>
				</select>
			</td>
			<td><input required class='form-control w3-tiny' name='sig_name' type='text'></td>
			<td><input class='btn btn-success w3-tiny' name='update_sig' type='submit' value='UPDATE SIGNATORY' onclick='return confirm("UPDATE SIGNATORY NOW?")'></td>
			</form>
		</tr>
		<tr><td><td></tr>
	<?php } ?>	
		
		
		<tr class='w3-tiny w3-dark-gray w3-text-white'> 
			<td>SIGNATORIES ON SET</td>
		</tr>
		<tr>
			<td>
			<?php
				$q=mysqli_query($conn, "SELECT * FROM m_purchasing_sig");
				$r=mysqli_fetch_assoc($q);
				echo "<table class='table'>
						<tr class='w3-khaki w3-tiny'>
							<td>SIGNATURE AREA</td>
							<td>NAME ON SET</td>
						</tr>";
				do{
					echo "<tr class='w3-tiny'>
							<td>".$r['sig_area']."</td>
							<td>".$r['sig_name']."</td>
						  </tr>";
				}while($r=mysqli_fetch_assoc($q));
			    echo "</table>";
			?>
			</td>
		</tr>
	</table>
<?php 
}
//Add Terms End-----
?>