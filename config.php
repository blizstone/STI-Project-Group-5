<?php 
// DB credentials.
define('DB_HOST','127.0.0.1');
define('DB_USER','');
define('DB_PASS','');
define('DB_NAME','test');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>