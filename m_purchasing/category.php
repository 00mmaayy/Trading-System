<?php 
//Add Category Start-----
if(isset($_REQUEST['category']))
{ ?>
<br>
	<table class='table'>
	
	
<?php if($access['b13'])
	  { ?>
		<tr class='w3-tiny w3-brown w3-text-white'> 
			<td colspan='3'>CATEGORY NAME</td>
		</tr>
		<?php if(isset($_REQUEST['success'])){ ?>
			<tr><td class='w3-text-green'>Add Success!</td></tr>
	    <?php } ?>
		<tr>
			<form method='get' action='m_purchasing/script_purchasing.php'>
			<td><input required class='form-control w3-tiny' name='cat_main' type='text' placeholder='Main Category Name'></td>
			<td><input class='btn btn-success w3-tiny' name='add_cat_main' type='submit' value='ADD MAIN CATEGORY' onclick='return confirm("ADD MAIN CATEGORY?")'></td>
			</form>
		</tr>
		<tr>
			<form method='get' action='m_purchasing/script_purchasing.php'>
			<td><input required class='form-control w3-tiny' name='cat_sub' type='text' placeholder='Sub Category Name'></td>
			<td><input class='btn btn-success w3-tiny' name='add_cat_sub' type='submit' value='ADD SUB CATEGORY' onclick='return confirm("ADD SUB CATEGORY?")'></td>
			</form>
		</tr>
		<tr>
			<form method='get' action='m_purchasing/script_purchasing.php'>
			<td><input required class='form-control w3-tiny' name='cat_unique' type='text' placeholder='Input Brand'></td>
			<td><input class='btn btn-success w3-tiny' name='add_cat_unique' type='submit' value='BRAND' onclick='return confirm("ADD BRAND?")'></td>
			</form>
		</tr>
		<tr><td><td></tr>
<?php } ?>	
		
		
		
		<tr>
			<td>
			<?php
				$q=mysqli_query($conn, "SELECT * FROM m_purchasing_category_main ORDER BY category asc");
				$r=mysqli_fetch_assoc($q);
				echo "<table class='table'><tr class='w3-dark-gray w3-tiny'><td colspan='5'>MAIN CATEGORY</td></tr>
										   <tr class='w3-khaki w3-tiny'><td>ID</td><td>CATEGORY NAME</td><td>ADD BY</td><td colspan='2'>ADD DATE</td></tr>";
				do{
					echo "<tr class='w3-tiny'>
							<td>".$r['id']."</td>
							<td>";
							if(isset($_REQUEST['edit_main']) and $_REQUEST['id']==$r['id'])
							{ ?>
							<form>
							<input name='procurement' type='hidden' value='1'>
							<input name='category' type='hidden' value='1'>
							<input name='id' type='hidden' value='<?php echo $_REQUEST['id']; ?>'>
							<input name='new_main' type='text' value='<?php echo $r['category']; ?>' placeholder='<?php echo $r['category']; ?>'>
							<input class='w3-tiny' type='submit' value='SET'>
							</form>
					  <?php }
					    else{ echo $r['category']; }
					  echo "</td>
							<td>".$r['add_by']."</td>
							<td>".$r['add_date']."</td>
							<td><a class='fa fa-pencil' href='admin_proc.php?procurement=1&category=1&edit_main=1&id=".$r['id']."'></a></td>
						  </tr>";
				}while($r=mysqli_fetch_assoc($q));
			    echo "</table>";
			?>
			</td>
			
			<td>
			<?php
				$q=mysqli_query($conn, "SELECT * FROM m_purchasing_category_sub ORDER BY category asc");
				$r=mysqli_fetch_assoc($q);
				echo "<table class='table'><tr class='w3-dark-gray w3-tiny'><td colspan='5'>SUB CATEGORY</td></tr>
										   <tr class='w3-khaki w3-tiny'><td>ID</td><td>CATEGORY NAME</td><td>ADD BY</td><td colspan='2'>ADD DATE</td></tr>";
				do{
					echo "<tr class='w3-tiny'>
							<td>".$r['id']."</td>
							<td>";
							if(isset($_REQUEST['edit_sub']) and $_REQUEST['id']==$r['id'])
							{ ?>
							<form>
							<input name='procurement' type='hidden' value='1'>
							<input name='category' type='hidden' value='1'>
							<input name='id' type='hidden' value='<?php echo $_REQUEST['id']; ?>'>
							<input name='new_sub' type='text' value='<?php echo $r['category']; ?>' placeholder='<?php echo $r['category']; ?>'>
							<input class='w3-tiny' type='submit' value='SET'>
							</form>
					  <?php }
					    else{ echo $r['category']; }
					  echo "</td>
							<td>".$r['add_by']."</td>
							<td>".$r['add_date']."</td>
							<td><a class='fa fa-pencil' href='admin_proc.php?procurement=1&category=1&edit_sub=1&id=".$r['id']."'></a></td>
						  </tr>";
				}while($r=mysqli_fetch_assoc($q));
			    echo "</table>";
			?>
			</td>
			
			<td>
			<?php
				$q=mysqli_query($conn, "SELECT * FROM m_purchasing_category_unique ORDER BY category asc");
				$r=mysqli_fetch_assoc($q);
				echo "<table class='table'><tr class='w3-dark-gray w3-tiny'><td colspan='5'>BRAND</td></tr>
										   <tr class='w3-khaki w3-tiny'><td>ID</td><td>BRAND NAME</td><td>ADD BY</td><td colspan='2'>ADD DATE</td></tr>";
				do{
					echo "<tr class='w3-tiny'>
							<td>".$r['id']."</td>
							<td>";
							if(isset($_REQUEST['edit_unique']) and $_REQUEST['id']==$r['id'])
							{ ?>
							<form>
							<input name='procurement' type='hidden' value='1'>
							<input name='category' type='hidden' value='1'>
							<input name='id' type='hidden' value='<?php echo $_REQUEST['id']; ?>'>
							<input name='new_unique' type='text' value='<?php echo $r['category']; ?>' placeholder='<?php echo $r['category']; ?>'>
							<input class='w3-tiny' type='submit' value='SET'>
							</form>
					  <?php }
					    else{ echo $r['category']; }
					  echo "</td>
							<td>".$r['add_by']."</td>
							<td>".$r['add_date']."</td>
							<td><a class='fa fa-pencil' href='admin_proc.php?procurement=1&category=1&edit_unique=1&id=".$r['id']."'></a></td>
						 </tr>";
				}while($r=mysqli_fetch_assoc($q));
			    echo "</table>";
			?>
			</td>
		</tr>
	</table>
<?php 
}
//Add Category End-----
?>
