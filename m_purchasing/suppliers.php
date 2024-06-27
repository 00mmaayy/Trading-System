<?php 
//Add Suppliers Start-----
if(isset($_REQUEST['suppliers']))
{ ?>
<br>
	<table class='table'>
	
	
<?php if($access['b15']) { ?>	
		<tr class='w3-tiny w3-teal w3-text-white'> 
			<td colspan='5'>SUPPLIERS</td>
		</tr>
		<?php if(isset($_REQUEST['success'])){ ?>
			<tr><td class='w3-text-green'>Add Success!</td></tr>
	    <?php } ?>
		<tr>
			<form method='get' action='m_purchasing/script_purchasing.php'>
			<td><input required class='form-control w3-tiny' name='supplier' type='text' placeholder='Supplier Name'></td>
			<td><input required class='form-control w3-tiny' name='address' type='text' placeholder='Address'></td>
			<td><input required class='form-control w3-tiny' name='contact' type='text' placeholder='Contacts'></td>
			<td><input required class='form-control w3-tiny' name='email' type='text' placeholder='Email'></td>
			<td><input class='btn btn-success w3-tiny' name='add_supplier' type='submit' value='ADD SUPPLIER' onclick='return confirm("ADD SUPPLIER?")'></td>
			</form>
		</tr>
		<tr><td><td></tr>
<?php } ?>	
		
		
		<tr class='w3-tiny w3-dark-gray w3-text-white'> 
			<td colspan='7'>SUPPLIERS LIST</td>
		</tr>
		<tr>
			<td colspan='7'>
			<?php
				$q=mysqli_query($conn, "SELECT * FROM m_purchasing_suppliers ORDER BY supplier asc");
				$r=mysqli_fetch_assoc($q);
				echo "<table class='table'><tr class='w3-khaki w3-tiny'><td>ID</td><td>SUPPLIER NAME</td><td>ADDRESS</td><td>CONTACT</td><td>EMAIL</td><td>ADD BY</td><td>ADD DATE</td></tr>";
				do{
					echo "<tr class='w3-tiny'><td>".$r['id']."</td>
							  <td>".$r['supplier']."</td>
							  <td>".$r['address']."</td>
							  <td>".$r['contact']."</td>
							  <td>".$r['email']."</td>
							  <td>".$r['add_by']."</td>
							  <td>".$r['add_date']."</td>
						  </tr>";
				}while($r=mysqli_fetch_assoc($q));
			    echo "</table>";
			?>
			</td>
		</tr>
	</table>
<?php 
}
//Add Suppliers End-----
?>
