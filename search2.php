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


<div class="article-container">
    <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT post.postId, post.accountId, post.title, post.content, post.category, userdata.UserName FROM post INNER JOIN userdata ON post.accountId=userdata.accountId WHERE post.postId LIKE '%$search%' OR userdata.UserName LIKE '%$search%' OR 
            post.title LIKE '%$search%' OR post.content LIKE '%$search%' OR post.category LIKE '%$search%'";

            $result = mysqli_query($conn, $sql);
           
            $queryResult = mysqli_num_rows($result);

            echo "<h3>There are ".$queryResult." results!</h3><br><br>";

            if ($queryResult > 0){
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <form action="post_details.php" method="post">
                <input type="hidden" name="id" value="<?= $row['postId']?>">
                
            <?php   echo "<div class='article-box'> 
                    <p>".$row['UserName']."</p>
                    <p>".$row['title']."</p>
                    <p>".$row['content']."</p>
                    <p>".$row['category']."</p>
                ";
        ?>
                <button class="btn btn-info">more</button>
                </form></div>
    <?php
                }
 
            } else {
                echo "There are no results matching your search!";
            }
        }



    ?>
</div>

