<?php
    include 'header.php';
?>

<form action="search.php" method="POST">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit-search">Search</button>
</form>

<h1>Search Page</h1>
<h2>User Posts:</h2>

<div class="article-container">
    <?php
        $sql = "SELECT * FROM post";
        $result = mysqli_query($con, $sql);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='article-box'>
                    <h3>".$row['postId']."</h3>
                    <p>".$row['accountId`']."</p>
                    <p>".$row['title']."</p>
                    <p>".$row['content']."</p>
                    <p>".$row['category']."</p>
                </div>";

            } 

        }
    ?>

</div>