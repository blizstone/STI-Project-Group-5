<?php
include 'config.php';
$db_handle = new DBController();
$categoryResult = $db_handle->runQuery("SELECT DISTINCT category FROM post ORDER BY category ASC");
?>
<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet" />
<title>Category</title>
</head>
<body>
    <h2>Multiselect Dropdown Filter</h2>
    <form method="POST" name="search" action="category2.php">
        <div id="demo-grid">
            <div class="search-box">
                <select id="Place" name="country[]" multiple="multiple">
                    <option value="0" selected="selected">Select Category</option>
                        <?php
                        if (! empty($categoryResult)) {
                            foreach ($categoryResult as $key => $value) {
                                echo '<option value="' . $categoryResult[$key]['Country'] . '">' . $categoryResult[$key]['Country'] . '</option>';
                            }
                        }
                        ?>
                </select><br> <br>
                <button id="Filter">Search</button>
            </div>
            
                <?php
                if (! empty($_POST['country'])) {
                    ?>
                    <table cellpadding="10" cellspacing="1">

                <thead>
                    <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Gender</strong></th>
                        <th><strong>Country</strong></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * from tbl_user";
                    $i = 0;
                    $selectedOptionCount = count($_POST['country']);
                    $selectedOption = "";
                    while ($i < $selectedOptionCount) {
                        $selectedOption = $selectedOption . "'" . $_POST['country'][$i] . "'";
                        if ($i < $selectedOptionCount - 1) {
                            $selectedOption = $selectedOption . ", ";
                        }
                        
                        $i ++;
                    }
                    $query = $query . " WHERE country in (" . $selectedOption . ")";
                    
                    $result = $db_handle->runQuery($query);
                }
                if (! empty($result)) {
                    foreach ($result as $key => $value) {
                        ?>
                <tr>
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['Name']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['Gender']; ?> </div></td>
                        <td><div class="col" id="user_data_3"><?php echo $result[$key]['Country']; ?> </div></td>
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