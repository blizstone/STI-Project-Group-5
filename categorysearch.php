<?php
require 'config.php';
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (($_SESSION['logged_in'] == '1')) {
   
}  else if(($_SESSION['logged_in'] == '2')){
	header("Location: adminhome.php");
}
else {
        header("location:index.php");
}

?>


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

$result=$db->getCategoryRecords($_POST['selected_category']);

while($row=mysqli_fetch_array($result)){
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