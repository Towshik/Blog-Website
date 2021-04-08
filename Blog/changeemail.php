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
<title>Edit User Email</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>Edit User Email </h2></center>
        <form action="changeemail.php" method="post">
			<div class="inner_container">
            <label><b>User Email</b></label>
				<input type="text" placeholder="Enter New Email" name="email" required>
				<div></br></div>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Your Password to Confirm" name="password" required>
				<div></br></div>
				<button class="login_button" name="changeinfo" type="submit">Change Email</button>
				<a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>	

				
			</div>
		</form>
		<div> </br> </div>
        <?php 
         if(isset($_POST['changeinfo'])){
           $user=new User();
           $update = $user->updateemail($_POST['email'],$_POST['password']);  
      if($update){  
        echo '<script type="text/javascript">alert("Email Changed Successfully!")</script>';
				}
	  else{
		echo '<script type="text/javascript">alert("Could Not Change Email")</script>';
				}

         }

        ?>
		
	</div>
</body>
</html>