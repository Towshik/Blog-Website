<?php
session_start();
require_once('configuration.php');
if ($_SESSION['role']!= "Star Admin"){
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>User List</h2></center>
<?php 
$db = new DB();
$query = "SELECT * FROM users";
$query_run = mysqli_query($db->dbh, $query);
$query2 = "SELECT * FROM admin";
$query_run2 = mysqli_query($db->dbh, $query2);

if (mysqli_num_rows($query_run) > 0) {
  while($row = mysqli_fetch_assoc($query_run)) {
    echo " Username: " . $row['username']."&nbsp &nbsp &nbsp". " Email: " . $row['email']. "&nbsp &nbsp &nbsp" .
    " Phone: " . $row['phone']."&nbsp &nbsp &nbsp". " Role: " . $row['role'].  "<br>";
  }
} else {
  echo "No Users";
}

?> 
		<div> </br> </div>
        <center><h2>Admin List</h2></center>
<?php 
$query2 = "SELECT * FROM admin";
$query_run2 = mysqli_query($db->dbh, $query2);

if (mysqli_num_rows($query_run2) > 0) {
  while($row = mysqli_fetch_assoc($query_run2)) {
    echo " Username: " . $row['username']."&nbsp &nbsp &nbsp". " Role: " . $row['role']. "<br>";
  }
} else {
  echo "No Admins";
}

?>
<a href="staradminhome.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
	</div>
</body>
</html>