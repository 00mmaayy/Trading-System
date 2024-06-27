<?php
if(isset($_REQUEST['inventory_items']))
{ 
?>	
	<br/>
	
	<table border='1' class='w3-table'>
		<tr class='w3-tiny w3-pale-blue'>
			<td>PO ITEM</td>
			<td>MAIN CATEGORY</td>
			<td>SUB CATEGORY</td>
			<td>BRAND</td>
			<td>PARTICULAR</td>
			<td>UNIT</td>
			<td>QTY</td>
			<td>PRICE</td>
		</tr>
		
		
		
		<?php 
		$q = mysqli_query($conn, "SELECT a.item, a.price, a.qty, a.from_po, 
										c.unit, 
										d.category AS cat_main, 
										e.category AS cat_sub, 
										f.category AS cat_unique
									FROM m_inventory_items a 
									LEFT JOIN m_purchasing_units c
										ON a.unit = c.id
									LEFT JOIN m_purchasing_category_main d
										ON a.category_main = d.id
									LEFT JOIN m_purchasing_category_sub e
										ON a.category_sub = e.id
									LEFT JOIN m_purchasing_category_unique f
										ON a.category_unique = f.id
									ORDER BY a.from_po ASC") or die(mysqli_error($conn));
		$r = mysqli_fetch_assoc($q);
		do{
			   echo "<tr>
						<td>".$r['from_po']."</td>
						<td>".$r['cat_main']."</td>
						<td>".$r['cat_sub']."</td>
						<td>".$r['cat_unique']."</td>
						<td>".$r['item']."</td>
						<td>".$r['unit']."</td>
						<td>".$r['qty']."</td>
						<td>".number_format($r['price'],2)."</td>";
			   echo "</tr>";
					$total_amount += $r['price'];
						}while($r = mysqli_fetch_assoc($q));
						?>
					<tr><td colspan='7' align='right'></td><td colspan='3'><b class='w3-text-indigo'><?php echo number_format($total_amount,2); ?></b></td></tr>
		
		
		
		
		
		
	</table>

<?php
}
?>