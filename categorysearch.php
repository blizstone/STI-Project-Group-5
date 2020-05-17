<table   class="table table-striped table-responsive">
	<tr>
		<th>Post id</th>
		<th>Account id</th>
		<th>Title</th>
		<th>Content</th>
		<th>Category</th>
	</tr>
<?php
require('config.php');
$db = new db;

$result1=$db->getCategoryRecords($_POST['selected_category']);

while($row1=mysqli_fetch_array($result1)){
	echo "<tr>
        <td>".$row['postId']."</td>
        <td>".$row['accountId']."</td>
        <td>".$row['title']."</td>
        <td>".$row['content']."</td>
        <td>".$row['category']."</td>
	</tr>";
}
$db->closeCon();
?>
</table>