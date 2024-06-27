<?php 
//Add Cargo Forwarder Start-----
if(isset($_REQUEST['cargo']))
  { ?>

	<br>
	<table class='table'>
	
	<?php if($access['b17']){ ?>
		<tr class='w3-tiny w3-teal w3-text-white'> 
			<td colspan='5'>CARGO FORWARDER</td>
		</tr>
		<?php if(isset($_REQUEST['success'])){ ?>
			<tr><td class='w3-text-green'>Add Success!</td></tr>
	    <?php } ?>
		<tr>
			<form method='get' action='m_purchasing/script_purchasing.php'>
			<td><input required class='form-control w3-tiny' name='cargo' type='text' placeholder='Cargo Forwarder Name'></td>
			<td><input required class='form-control w3-tiny' name='address' type='text' placeholder='Address'></td>
			<td><input required class='form-control w3-tiny' name='contact' type='text' placeholder='Contacts'></td>
			<td><input required class='form-control w3-tiny' name='email' type='text' placeholder='Email'></td>
			<td><input class='btn btn-success w3-tiny' name='add_cargo' type='submit' value='ADD CARGO FORWARDER' onclick='return confirm("ADD CARGO FORWARDER?")'></td>
			</form>
		</tr>
		<tr><td><td></tr>
	<?php } ?>	
		
		
		<tr class='w3-tiny w3-dark-gray w3-text-white'> 
			<td colspan='7'>CARGO FORWARDER LIST</td>
		</tr>
		<tr>
			<td colspan='7'>
			<?php
				$q=mysqli_query($conn, "SELECT * FROM m_purchasing_cargo ORDER BY cargo asc");
				$r=mysqli_fetch_assoc($q);
				echo "<table class='table'><tr class='w3-khaki w3-tiny'><td>ID</td><td>CARGO FORWARDER NAME</td><td>ADDRESS</td><td>CONTACT</td><td>EMAIL</td><td>ADD BY</td><td>ADD DATE</td></tr>";
				do{
					echo "<tr class='w3-tiny'><td>".$r['id']."</td>
							  <td>".$r['cargo']."</td>
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
   //Add Cargo Forwarder End-----
    ?>