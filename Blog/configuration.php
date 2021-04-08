<?php  
define('HOST', 'localhost');  
define('USER', 'root');  
define('PASS', '');  
define('Database', 'Blog');  
require_once('userclass.php');
require_once('adminclass.php');
class DB  
  
{  
    function __construct() {  
        $con = new mysqli(HOST,USER,PASS);
		$con2= mysqli_select_db($con,Database);
		$this->dbh=$con;
		if (!$con2)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
	#echo "Connected Successfully";
}
}  

}

?>  