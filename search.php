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

        }
    ?>
</div>