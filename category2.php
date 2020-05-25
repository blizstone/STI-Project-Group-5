<?php
include 'config.php';
$db_handle = new DBController();
$categoryResult = $db_handle->runQuery("SELECT DISTINCT category FROM post ORDER BY category ASC");
?>
<html>
<head>
<link href="css/category.css" type="text/css" rel="stylesheet" />
<title>Category</title>
</head>
<body>
    <h2>Multiselect Dropdown Filter</h2>
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
                    <table cellpadding="10" cellspacing="1">

                <thead>
                    <tr>
                        <th><strong>Post Id</strong></th>
                        <th><strong>Account Id</strong></th>
                        <th><strong>Title</strong></th>
                        <th><strong>Content</strong></th>
                        <th><strong>Category</strong></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * from post";
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
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['Post Id']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['Account Id']; ?> </div></td>
                        <td><div class="col" id="user_data_3"><?php echo $result[$key]['Title']; ?> </div></td>
                        <td><div class="col" id="user_data_3"><?php echo $result[$key]['Content']; ?> </div></td>
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