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
    include 'header.php'
?>

<form action="search.php" method="$_POST">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit-search"></button>
</form>

<div class="article-container">
    <?php
        $sql = "SELECT * FROM post";
        $result = mysqli_query($con, $sql);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div>
                    <h3>".$row['postId']."</h3>
                    <p>".$row['accountId']."</p>
                    <p>".$row['title']."</[p]>
                    <p>".$row['content']."</[p]>
                    <p>".$row['category']."</[p]>
                </div>";

            }
        }
    ?>
</div>