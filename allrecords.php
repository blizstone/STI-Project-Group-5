<table   class="table table-striped table-responsive">
			<tr>
				<th>Product id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>
			<?php
			require('config.php');
			$db = new db;
			$result=$db->getRecords();
			while($row=mysqli_fetch_array($result)){
				echo "<tr>
					<td>".$row['id']."</td>
					<td>".$row['prod_name']."</td>
					<td>".$row['prod_desc']."</td>
					<td>".$row['prod_price']."</td>
					<td>".$row['prod_qty']."</td>
				</tr>";
			}
			$db->closeCon();
			?>
</table>