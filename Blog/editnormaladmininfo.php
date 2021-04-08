<?php
session_start();
require_once('configuration.php');
$current_user = $_SESSION['username']; 
		if ($current_user==null){
			header("location: index.php");
		}
        else if ($_SESSION['role']!="Admin"){
            header("location: index.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Admin Information</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>Edit Admin Information </h2></center>
        <?php echo $_SESSION['role'] ?>
        <a href="changeadminpassword.php"><button type="button" class="update_btn">Change Your Password</button></a>
        <a href="adminhomepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
	</div>
</body>
</html>

