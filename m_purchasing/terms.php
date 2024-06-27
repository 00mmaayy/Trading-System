<?php 
//Add Terms Start-----
if(isset($_REQUEST['terms']))
{ ?>
<br>
	<table class='table'>
	
	
	<?php if($access['b19']){ ?>
		<tr class='w3-tiny w3-deep-purple w3-text-white'> 
			<td colspan='3'>TERMS MAINTENANCE</td>
		</tr>
		<?php if(isset($_REQUEST['success'])){ ?>
			<tr><td class='w3-text-green'>Add Success!</td></tr>
	    <?php } ?>
		<tr>
			<form method='get' action='m_purchasing/script_purchasing.php'>
			<td><input required class='form-control w3-tiny' name='terms_desc' type='text' placeholder='Add Term Long Name'></td>
			<td><input required class='form-control w3-tiny' name='terms' type='number'></td>
			<td><input class='btn btn-success w3-tiny' name='add_terms' type='submit' value='ADD NEW UNIT' onclick='return confirm("ADD TERM NOW?")'></td>
			</form>
		</tr>
		<tr><td><td></tr>
	<?php } ?>	
		
		
		<tr class='w3-tiny w3-dark-gray w3-text-white'> 
			<td>TERMS</td>
		</tr>
		<tr>
			<td>
			<?php
				$q=mysqli_query($conn, "SELECT * FROM m_purchasing_terms ORDER BY terms asc");
				$r=mysqli_fetch_assoc($q);
				echo "<table class='table'>
						<tr class='w3-khaki w3-tiny'>
							<td>ID</td>
							<td>TERMS</td>
							<td>DESCRIPTION</td>
							<td>ADD BY</td>
							<td>ADD DATE</td>
						</tr>";
				do{
					echo "<tr class='w3-tiny'><td>".$r['id']."</td><td>".$r['terms']."</td><td>".$r['terms_desc']."</td><td>".$r['add_by']."</td><td>".$r['add_date']."</td></tr>";
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