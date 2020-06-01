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

<?php
    include 'header.php';
    $conn = mysqli_connect("localhost","root","","digiscam");
?>



<h1>Results</h1>
<h2>All Posts</h2>

<div class="article-container">
    <?php
       
        $result =  mysqli_query($conn,"SELECT post.postId, post.title, post.content, post.category, userdata.UserName, SUM(`vote`) FROM post INNER JOIN userdata ON userdata.accountId=post.accountId INNER JOIN voting ON voting.postId=post.postId GROUP BY postId");
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='article-box'>
                    
                    <p>".$row['UserName']."</p>
                    <p>".$row['title']."</p>
                    <p>".$row['content']."</p>
                    <p>".$row['category']."</p>
                </div>";


            }

        }
    ?>


</div>
