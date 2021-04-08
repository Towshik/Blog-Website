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
        if($_SESSION['role']!="Admin"){
            header("location:index.php");
        }
         echo "Hello";
         echo "<br>";
         echo $_SESSION['username'];
         echo "<br>";
         echo $_SESSION['role'];
         echo "<br>";
        ?>
		
		<form action="adminhomepage.php" method="post">
			<div class="inner_container">
            <center><a href="viewrequests.php"><button type="button" class="verify_btn">View Pending Requests</button></a></center> 
         <center><a href="editnormaladmininfo.php"><button type="button" class="verify_btn">Change Admin Information</button></a></center>
			<center><a href="logout.php"><button type="button" class="logout_button">Log Out</button></a></center>	
				
			</div>
		</form>
		<div> </br> </div>
	</div>
</body>
</html>