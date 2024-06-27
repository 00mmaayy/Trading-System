<?php 
//Add Units Start-----
if(isset($_REQUEST['units']))
{ ?>
<br>
	<table class='table'>
		<?php if($access['b11'])
		      { ?>
		<tr class='w3-tiny w3-deep-purple w3-text-white'> 
			<td colspan='3'>UNIT OF MEASURE</td>
		</tr>
		<?php if(isset($_REQUEST['success'])){ ?>
			<tr><td class='w3-text-green'>Add Success!</td></tr>
	    <?php } ?>
		
		<tr>
			<form method='get' action='m_purchasing/script_purchasing.php'>
			<td><input required class='form-control w3-tiny' name='units_long' type='text' placeholder='Add Unit Long Name. Ex. Bottle'></td>
			<td><input required class='form-control w3-tiny' name='units' type='text' placeholder='Add Unit Short Name Ex. Bot'></td>
			<td><input class='btn btn-success w3-tiny' name='add_units' type='submit' value='ADD NEW UNIT' onclick='return confirm("ADD UNIT NOW?")'></td>
			</form>
		</tr>
		<tr><td><td></tr>
		<?php } ?>
		
		<tr class='w3-tiny w3-dark-gray w3-text-white'> 
			<td>UNIT OF MEASURE</td>
		</tr>
		<tr>
			<td>
			<?php
				$q=mysqli_query($conn, "SELECT * FROM m_purchasing_units ORDER BY unit asc");
				$r=mysqli_fetch_assoc($q);
				echo "<table class='table'><tr class='w3-khaki w3-tiny'><td>ID</td><td>UNIT SHORT</td><td>UNIT LONG</td><td>ADD BY</td><td>ADD DATE</td></tr>";
				do{
					echo "<tr class='w3-tiny'><td>".$r['id']."</td><td>".$r['unit']."</td><td>".$r['unit_long']."</td><td>".$r['add_by']."</td><td>".$r['add_date']."</td></tr>";
				}while($r=mysqli_fetch_assoc($q));
			    echo "</table>";
			?>
			</td>
		</tr>
	</table>
<?php 
}
//Add Units End-----
?>
