
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

$db_handle = new DBController();
$categoryResult = $db_handle->runQuery("SELECT post.postId, post.title, post.content, post.category, userdata.UserName, SUM(`vote`) FROM post INNER JOIN userdata ON userdata.accountId=post.accountId INNER JOIN voting ON voting.postId=post.postId GROUP BY category");
//$categoryResult = $db_handle->runQuery("SELECT DISTINCT category FROM post ORDER BY category ASC");
?>
<html>
<head>

<link href="css/category.css" type="text/css" rel="stylesheet" />
<title>Categories</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
	<link rel="stylesheet" href="stylesheet.css"> <!-- general/navbar stylesheet -->



	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- navbar stylesheet -->

<body>
<body>
<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="category2.php">Categories</a>
  
  <a href="create_post.php">Create</a>
  <a href="viewprofile.php">Account</a>
  <div class="pull-right"><a href="logout.php">Logout</a></div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>


</div>
    <h2>Select Category</h2>
    <form method="POST" name="search" action="category2.php">
        <div id="demo-grid">
            <div class="search-box">
                <select id="Place" name="Category[]" multiple="multiple">
                    <option value="0" selected="selected">Select Category</option>
                        <?php
                        if (! empty($categoryResult)) {
                            foreach ($categoryResult as $key => $value) {
                                echo '<option value="' . $categoryResult[$key]['category'] . '">' . $categoryResult[$key]['category'] . '</option>';
                            }
                        }
                        ?>
                </select><br> <br>
                <button id="Filter">Search</button>
            </div>

                <?php
                if (! empty($_POST['Category'])) {
                    ?>
                    <table cellpadding="20" cellspacing="2">

                <thead>
                    <tr>
                        
                        <th><strong>Username</strong></th>
                        <th><strong>Title</strong></th>
                        <th><strong>Content</strong></th>
                        <th><strong>Category</strong></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM post";
                    $i = 0;
                    $selectedOptionCount = count($_POST['Category']);
                    $selectedOption = "";
                    while ($i < $selectedOptionCount) {
                        $selectedOption = $selectedOption . "'" . $_POST['Category'][$i] . "'";
                        if ($i < $selectedOptionCount - 1) {
                            $selectedOption = $selectedOption . ", ";
                        }

                        $i ++;
                    }
                    $query = $query . " WHERE Category in (" . $selectedOption . ")";

                    $result = $db_handle->runQuery($query);
                }
                if (! empty($result)) {
                    foreach ($result as $key => $value) {
                        ?>
                <tr>
                        
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['accountId']; ?></div></td>
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['title']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['content']; ?> </div></td>
                        <td><div class="col" id="user_data_3"><?php echo $result[$key]['category']; ?> </div></td>
                    </tr>
                <?php
                    }
                    ?>

                </tbody>
            </table>
            <?php
                }
                ?>
        </div>
    </form>
</body>
</html>
