<?php
    include 'header.php';
    $conn = mysqli_connect("localhost","root","","digiscam");
?>

<h1>Search page</h1>

<div class="article-container">
    <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM post WHERE postId LIKE '%$search%' OR accountId LIKE '%$search%' OR 
            title LIKE '%$search%' OR content LIKE '%$search%' OR category LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);

            $queryResult = mysqli_num_rows($result);

            echo "There are ".$queryResult." results!";

            if ($queryResult > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<a href='postpage.php?accountId=".$row['accountId']."&title=".$row['title']."'><div class='article-box'>
                    <p>".$row['postId']."</p>
                    <p>".$row['accountId']."</p>
                    <p>".$row['title']."</p>
                    <p>".$row['content']."</p>
                    <h3>".$row['category']."</h3>
                </div></a>";

                }
 
            } else {
                echo "There are no results matching your search!";
            }
        }



    ?>


</div>