<?php
session_start();
require_once('configuration.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>Home Page</h2></center>
        <?php
         if ($_SESSION['role']=="Admin"){
            header("location:adminhomepage.php");}
        else if($_SESSION['role']!="Star Admin"){
            header("location:homepage.php");
        }
         echo "Hello";
         echo "<br>";
         echo $_SESSION['username'];
         echo "<br>";
         echo $_SESSION['role'];
         echo "<br>";
        ?>
		
		<form action="staradminhome.php" method="post">
			<div class="inner_container">
            <center><a href="viewrequests.php"><button type="button" class="verify_btn">View Pending Requests</button></a></center>
            <center><a href="viewreports.php"><button type="button" class="verify_btn">View Reports</button></a></center> 
            <center><a href="viewusersandadmins.php"><button type="button" class="verify_btn">View Existing Users & Admins</button></a></center>
            <center><a href="addnewadmin.php"><button type="button" class="verify_btn">Add New Admin</button></a></center>
            <center><a href="editadmininfo.php"><button type="button" class="verify_btn">Change Admin Information</button></a></center>
			<center><a href="logout.php"><button type="button" class="logout_button">Log Out</button></a></center>	
				
			</div>
		</form>
		<div> </br> </div>
	</div>
</body>
</html>