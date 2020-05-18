<?php 
// DB credentials.
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','digiscam');
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

<?php
error_reporting(0);
class db{
	var $con;
	function __construct(){
		$this->$con=mysqli_connect("localhost","root","") or die(mysqli_error());
		mysqli_select_db($this->$con,"digiscam") or die(mysqli_error());
	}
	public function getCategory(){
		$query="SELECT * from category";
		$result=mysqli_query($this->$con,$query);
		return $result;
	}
	public function getCategoryRecords($category){
		$query="SELECT * from category  where category < ".$category."";
		$result=mysqli_query($this->$con,$query);
		return $result;
	}
	public function closeCon(){
		mysqli_close($this->$con);
	}
}
?>