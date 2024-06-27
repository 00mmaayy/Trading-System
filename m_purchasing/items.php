<?php 
//Add Item Start-----
if(isset($_REQUEST['items']))
{ ?>
<br>
	<table class='table'>
		
	<?php if($access['b9']==1)
	      { ?>
		<tr class='w3-tiny w3-indigo w3-text-white'> 
			<td colspan='8'>ADD ITEMS</td>
		</tr>
		<?php if(isset($_REQUEST['success'])){ ?>
			<tr><td class='w3-text-green'>Add Success!</td></tr>
	    <?php } ?>
		<tr>
			<form method='get' action='m_purchasing/script_purchasing.php'>
			<td colspan='3'><span class='w3-tiny'>Item Name</span><input required class='form-control w3-tiny' name='item' type='text' placeholder='Item Name'></td>
		</tr>
		
		<tr>
			<td>
				<span class='w3-tiny'>Unit</span>
				<select required class='form-control w3-tiny' name='unit'>
				<?php
					$q=mysqli_query($conn, "SELECT * FROM m_purchasing_units ORDER BY unit asc");
					$r=mysqli_fetch_assoc($q);
						echo "<option value='' disabled selected>none</option>";
					do{
						echo "<option value='".$r['id']."'>".$r['unit_long']."</option>";
					}while($r=mysqli_fetch_assoc($q));
				echo "</select>";	
				?>
			</td>
			
			<td><span class='w3-tiny'>Price</span><input required class='form-control' name='price' type='number' step='any'></td>
			
			<td>
				<span class='w3-tiny'>Supplier</span>
				<select required class='form-control w3-tiny' name='supplier'>
				<?php
					$q=mysqli_query($conn, "SELECT * FROM m_purchasing_suppliers ORDER BY supplier asc");
					$r=mysqli_fetch_assoc($q);
						echo "<option value='' disabled selected>none</option>";
					do{
						echo "<option value='".$r['id']."'>".$r['supplier']."</option>";
					}while($r=mysqli_fetch_assoc($q));
				echo "</select>";	
				?>
			</td>
			
			<td>
				<span class='w3-tiny'>Main Category</span>
				<select required class='form-control w3-tiny' name='cat_main'>
				<?php
					$q=mysqli_query($conn, "SELECT * FROM m_purchasing_category_main ORDER BY category asc");
					$r=mysqli_fetch_assoc($q);
						echo "<option value='' disabled selected>none</option>";
					do{
						echo "<option value='".$r['id']."'>".$r['category']."</option>";
					}while($r=mysqli_fetch_assoc($q));
				echo "</select>";	
				?>
			</td>
			
			<td>
				<span class='w3-tiny'>Sub Category</span>
				<select required class='form-control w3-tiny' name='cat_sub'>
				<?php
					$q=mysqli_query($conn, "SELECT * FROM m_purchasing_category_sub ORDER BY category asc");
					$r=mysqli_fetch_assoc($q);
						echo "<option value='' disabled selected>none</option>";
					do{
						echo "<option value='".$r['id']."'>".$r['category']."</option>";
					}while($r=mysqli_fetch_assoc($q));
				echo "</select>";	
				?>
			</td>
			
			<td>
				<span class='w3-tiny'>Brand</span>
				<select required class='form-control w3-tiny' name='cat_unique'>
				<?php
					$q=mysqli_query($conn, "SELECT * FROM m_purchasing_category_unique ORDER BY category asc");
					$r=mysqli_fetch_assoc($q);
						echo "<option value='' disabled selected>none</option>";
					do{
						echo "<option value='".$r['id']."'>".$r['category']."</option>";
					}while($r=mysqli_fetch_assoc($q));
				echo "</select>";	
				?>
			</td>
			
			<td><span class='w3-tiny'><br></span><input class='btn btn-success w3-tiny' name='add_item' type='submit' value='ADD ITEM' onclick='return confirm("ADD ITEM?")'></td>
			</form>
		</tr>
		<tr><td><td></tr>
		
		  <?php } ?>
		
		<tr class='w3-tiny w3-dark-gray w3-text-white'> 
			<td colspan='8'>ITEM LIST</td>
		</tr>
		<tr>
			<td colspan='8'>
			<?php
				$q=mysqli_query($conn, "SELECT p.*, u.unit_long AS unit, s.supplier AS supplier, m.category AS category_main, b.category AS category_sub, o.category AS category_unique
								FROM m_purchasing_items AS p
								INNER JOIN m_purchasing_units AS u ON u.id=p.unit
								INNER JOIN m_purchasing_suppliers AS s ON s.id=p.supplier
								INNER JOIN m_purchasing_category_main AS m ON m.id=p.category_main
								INNER JOIN m_purchasing_category_sub AS b ON b.id=p.category_sub
								INNER JOIN m_purchasing_category_unique AS o ON o.id=p.category_unique
								ORDER BY p.item ASC");
				$r=mysqli_fetch_assoc($q);
				echo "<table class='table'>
						<tr class='w3-khaki w3-tiny'>
							<td>ID</td>
							<td>ITEM NAME</td>
							<td>UNIT</td>
							<td>PRICE</td>
							<td>SUPPLIER</td>
							<td>MAIN CATEGORY</td>
							<td>SUB CATEGORY</td>
							<td>UNIQUE CATEGORY</td>
							<td>ADD BY</td>
							<td>ADD DATE</td>
						</tr>";
				do{
					echo "<tr class='w3-tiny'><td>".$r['id']."</td>
							  <td>".$r['item']."</td>
							  <td>".$r['unit']."</td>
							  <td>".number_format($r['price'],2)."</td>
							  <td>".$r['supplier']."</td>
							  <td>".$r['category_main']."</td>
							  <td>".$r['category_sub']."</td>
							  <td>".$r['category_unique']."</td>
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
//Add Item End-----
?>
