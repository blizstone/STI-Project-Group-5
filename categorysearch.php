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

$result1=$db->getCategoryRecords($_POST['selected_category']);

while($row1=mysqli_fetch_array($result1)){
	echo "<tr>
		<td>".$row1['id']."</td>
		<td>".$row1['']."</td>
		<td>".$row1['']."</td>
		<td>".$row1['']."</td>
		<td>".$row1['']."</td>
	</tr>";
}
$db->closeCon();
?>
</table>