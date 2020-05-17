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

$result1=$db->getRecordsWhere($_POST['selected_price']);

while($row1=mysqli_fetch_array($result1)){
	echo "<tr>
		<td>".$row1['id']."</td>
		<td>".$row1['prod_name']."</td>
		<td>".$row1['prod_desc']."</td>
		<td>".$row1['prod_price']."</td>
		<td>".$row1['prod_qty']."</td>
	</tr>";
}
$db->closeCon();
?>
</table>