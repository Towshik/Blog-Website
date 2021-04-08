<?php
    
	session_start();
	require_once('configuration.php');
	//phpinfo();
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
		<center><h3>Welcome, 
		<?php 
		$current_user = $_SESSION['username']; 
		if ($current_user==null){
			header("location: index.php");
		}
		else if ($_SESSION['role']!="User"){
            header("location: index.php");
		}
		else{

			echo  $current_user;
		}
		
		?>!</h3></center>
		
		<form action="homepage.php" method="post">
			<div class="inner_container">
			<center><a href="post.php"><button type="button" class="login_button">Post Something!</button></a></center>
			<center><a href="viewuserrequest.php"><button type="button" class="verify_btn">Watch Your Pending Posts</button></a></center>
			<center><a href="viewuserposts.php"><button type="button" class="verify_btn">Watch Your Posts</button></a></center>
			<center><a href="viewfriendsposts.php"><button type="button" class="edit_btn">Watch Your Friends Posts</button></a></center>
			<center><a href="edituserinfo.php"><button type="button" class="edit_btn">Edit User Information</button></a></center>
			<center><a href="follow.php"><button type="button" class="edit_btn">Follow Users</button></a></center>
			<center><a href="viewuserinfo.php"><button type="button" class="verify_btn">View Your Information</button></a></center>
			<center><a href="service.php"><button type="button" class="update_btn">Report Problem</button></a></center>
			<center><a href="logout.php"><button type="button" class="logout_button">Log Out</button></a></center>	
			</div>
		</form>
		<div> </br> </div>
	</div>
</body>
</html>
