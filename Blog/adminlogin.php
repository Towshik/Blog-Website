<!doctype html>
<?php
	session_start();
	require_once('configuration.php');
	$code= $_SESSION['code'];
	if ($code==null){
		header("location: adminverify.php");
	}
	if (isset($_SESSION['role'])){
		if ($_SESSION["role"]=="Star Admin"){
          header("location:staradminhome.php");}
		else if ($_SESSION["role"]=="Admin"){
			header("location:adminhomepage.php");}
		else {
			header("location: index.php");
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
	<center><img src="Logo.jpg" width="333" height="250"> </center>
	<center><h2>Admin Login Form</h2></center>
		<form action="adminlogin.php" method="post">
		
			<div class="inner_container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<div></br></div>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<div></br></div>
				<button class="login_button" name="login" type="submit">Login</button>
				<center><a href="index.php"><button type="button" class="back_btn"><< Back to Index Page</button></a></center>
			</div>
		</form>

		<?php
		   $admin = new Admin();
		   if ($_SERVER["REQUEST_METHOD"] == "POST"){  
      $login = $admin->adminlogin($_POST['username'],$_POST['password']);  
      if($login){  
		if ($_SESSION['role']=="Star Admin"){
         echo("<script>window.location.href = 'staradminhome.php';</script>");}
		 else if ($_SESSION['role']=="Admin"){
			echo("<script>window.location.href = 'adminhomepage.php';</script>");}
		 #session_destroy();
				}
	  else{
		echo '<script type="text/javascript">alert("No such Admin exists. Invalid Credentials")</script>';
				}
   }  
		
		?>
</body>
</html>
