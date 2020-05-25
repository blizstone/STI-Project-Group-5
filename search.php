<?php
    include 'header.php';
?>


<h1>Search Page</h1>

<div class="article-container">
    <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($con, $_POST['search']);
            $sql = "SELECT * FROM post WHERE ";
        }
    ?>
</div>