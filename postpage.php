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



<h1>Article Page</h1>


<div class="article-container">
    <?php
        $sql = "SELECT * FROM post";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<a href='postpage.php?accountId=".$row['accountId']."&title=".$row['title']."'><div class='article-box'>
                    <p>".$row['postId']."</p>
                    <p>".$row['accountId']."</p>
                    <p>".$row['title']."</p>
                    <p>".$row['content']."</p>
                    <h3>".$row['category']."</h3>
                </div><a/>";


            }

        }
    ?>


</div>