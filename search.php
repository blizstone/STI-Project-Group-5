<?php
    include 'header.php';
?>


<h1>Search Page</h1>

<div class="article-container">
    <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($con, $_POST['search']);
            $sql = "SELECT * FROM post WHERE postId LIKE '%$search%' OR accountId LIKE '%$search%' 
                OR title LIKE '%$search%' OR content LIKE '%$search%' OR category LIKE '%$search%'";
            $result = mysqli_query($con, $sql);
            $queryResult = mysqli_num_rows($result);

            if ($queryResult > 0) {
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
            
            else {
                echo "There are no results matching your search!";
            }

        }
    ?>
</div>