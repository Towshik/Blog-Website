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
<title>Edit User Password</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>Change User Password</h2></center>
        <form action="changepassword.php" method="post">
			<div class="inner_container">
            <label><b>Enter Old Password</b></label>
				<input type="password" placeholder="Enter Old Password" name="opassword" required>
				<div></br></div>
				<label><b>Enter New Password</b></label>
				<input type="password" placeholder="Enter New Password" name="npassword" required>
				<div></br></div>
                <label><b>Confirm New Password</b></label>
				<input type="password" placeholder="Confirm New Password" name="cpassword" required>
				<div></br></div>
				<button class="login_button" name="changeinfo" type="submit">Change Password</button>
				<a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>	

				
			</div>
		</form>
		<div> </br> </div>
        <?php 
         if(isset($_POST['changeinfo'])){
           $user=new User();
           $update = $user->updatepassword($_POST['opassword'],$_POST['npassword'],$_POST['cpassword']);  
      if($update){  
        echo '<script type="text/javascript">alert("Password Changed Successfully!")</script>';
				}
	  else{
		echo '<script type="text/javascript">alert("Could Not Change Password")</script>';
				}

         }

        ?>
		
	</div>
</body>
</html>