<?php
	session_start();
	require_once('configuration.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">	
	<div id="main-wrapper">
	<center><h2>Sign Up Form</h2></center>
		<form action="register.php" method="post">
			<div class="inner_container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<div></br></div>
				<label><b>Email</b></label>
				<input type="text" placeholder="Enter Email" name="email" required>
				<div></br></div>
				<label><b>Phone No</b></label>
				<input type="text" placeholder="Enter Phone No" name="phone" required>
				<div></br></div>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<div></br></div>
				<label><b>Confirm Password</b></label>
				<input type="password" placeholder="Enter Password" name="cpassword" required>
				<div></br></div>
				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				
				<a href="index.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
		
		<?php
		$user= new User();
			if(isset($_POST['register'])){
				$register = $user->register($_POST['username'],$_POST['email'],$_POST['phone'],$_POST['password'],$_POST['cpassword']); 
				if($register){  
            echo("<script>window.location.href = 'homepage.php';</script>");  }
			
			}
			
			?>
	</div>
</body>
</html>
