
<?php
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


<?php
$connect = mysqli_connect("localhost", "root", "", "digiscam");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "SELECT post.postId, post.accountId, post.title, post.content, post.category, userdata.UserName 
	FROM post INNER JOIN userdata ON post.accountId=userdata.accountId 
	WHERE post.postId LIKE '%$search%' 
	OR userdata.UserName LIKE '%$search%' 
	OR post.title LIKE '%$search%' 
	OR post.content LIKE '%$search%' 
	OR post.category LIKE '%$search%'";

		
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		$output .= '<div class="table-responsive">
						<table class="table table bordered">
							<tr>
								<th>user</th>
								<th>title</th>
								<th>Content</th>
                                <th>category</th>
                                <br>
                                <th></th>
								
							</tr>';
		while($row = mysqli_fetch_array($result))
		{
            ?><tr>
                <form action="post_details.php" method="post">
                <input type="hidden" name="id" value="<?= $row['postId']?>">
            <?php
			$output .= '
                
					<td>'.$row["UserName"].'</td>
					<td>'.$row["title"].'</td>
					<td>'.$row["content"].'</td>
                    <td>'.$row["category"].'</td>
                    <td></td>
				<td><button class="btn btn-info">more</button></td>
                </form></div>
				</tr>
            ';
            ?>
                
            
          
        <?php
		}
		echo $output;
	}
	else
	{
		echo 'No similar posts, you may create!!';
	}
	

}
else
{
	
}

?>