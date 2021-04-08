<?php
session_start();
require_once('configuration.php');
$current_user = $_SESSION['username']; 
		if ($current_user==null){
			header("location: index.php");
		}
		else if ($_SESSION['role']!="User"){
            header("location: index.php");
		}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit User Information</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>Edit User Information </h2></center>
        <a href="changeemail.php"><button type="button" class="update_btn">Change Your Email</button></a>
        <a href="changephone.php"><button type="button" class="update_btn">Change Your Phone Number</button></a>
        <a href="changepassword.php"><button type="button" class="update_btn">Change Your Password</button></a> <br>
        <a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
	</div>
</body>
</html>

