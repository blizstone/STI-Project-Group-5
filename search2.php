<?php
    include 'header.php';
    $conn = mysqli_connect("localhost","root","","digiscam");
?>

<h1>Search page</h1>

<div class="article-container">
    <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM article WHERE postId LIKE '%$search%' OR accountId LIKE '%$search%' OR title LIKE '%$search%' OR content LIKE '%$search%' OR category LIKE '%$search%'";
        }



    ?>


</div>