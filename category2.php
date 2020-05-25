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
$categoryResult = $db_handle->runQuery("SELECT DISTINCT category FROM post ORDER BY category ASC");
?>
<html>
<head>
<link href="css/category.css" type="text/css" rel="stylesheet" />
<title>Categories</title>
</head>
<body>
    <h2>Select Category</h2>
    <form method="POST" name="search" action="category2.php">
        <div id="demo-grid">
            <div class="search-box">
                <select id="Place" name="category[]" multiple="multiple">
                    <option value="0" selected="selected">Select Category</option>
                        <?php
                        if (! empty($categoryResult)) {
                            foreach ($categoryResult as $key => $value) {
                                echo '<option value="' . $categoryResult[$key]['Category'] . '">' . $categoryResult[$key]['Category'] . '</option>';
                            }
                        }
                        ?>
                </select><br> <br>
                <button id="Filter">Search</button>
            </div>
            
                <?php
                if (! empty($_POST['category'])) {
                    ?>
                    <table cellpadding="20" cellspacing="2">

                <thead>
                    <tr>
                        <th><strong>Title</strong></th>
                        <th><strong>Content</strong></th>
                        <th><strong>Category</strong></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM post";
                    $i = 0;
                    $selectedOptionCount = count($_POST['category']);
                    $selectedOption = "";
                    while ($i < $selectedOptionCount) {
                        $selectedOption = $selectedOption . "'" . $_POST['category'][$i] . "'";
                        if ($i < $selectedOptionCount - 1) {
                            $selectedOption = $selectedOption . ", ";
                        }
                        
                        $i ++;
                    }
                    $query = $query . " WHERE category in (" . $selectedOption . ")";
                    
                    $result = $db_handle->runQuery($query);
                }
                if (! empty($result)) {
                    foreach ($result as $key => $value) {
                        ?>
                <tr>
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['Title']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['Content']; ?> </div></td>
                        <td><div class="col" id="user_data_3"><?php echo $result[$key]['Category']; ?> </div></td>
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