<?php
session_start();
require_once('configuration.php');
if ($_SESSION['username']==null){
    header("location:index.php");
}
if ($_SESSION['role']!= "User"){
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>View You Pending Posts</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>Pending Post List</h2></center>
<?php 
$x=1;
$db = new DB();
$current_user=$_SESSION['username'];
$query = "SELECT * FROM requests where username='$current_user'";
$query_run = mysqli_query($db->dbh, $query);
if (mysqli_num_rows($query_run) > 0) {
  while($row = mysqli_fetch_assoc($query_run)) {
    if($row['image']==null){
    echo "Serial No: ".$x."<br>". "Title: " . $row['title']."<br>". 
    " Status:" ."<br>". $row['status']. "<br>" ."<br>";}
    else{
      $imageloc='images/'.$row['image'];
      $var1= '<img src="'.$imageloc.'" alt="" width=500px/>';
      echo "Serial No: ".$x."<br>". "Title: " . $row['title']."<br>".
      $var1. "<br>"."Status:" ."<br>". $row['status']. "<br>" ."<br>";}
    $x=$x+1;
    }
  }
 else {
  echo "No Pending Requests". "<br>";
}
?>
<a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
	</div>
</body>
</html>