<!doctype html>
<?php
	session_start();
	require_once('configuration.php');
	if (isset($_SESSION['username']) and $_SESSION['role']=="User"){
		header("location: homepage.php");
		}
	if (isset($_SESSION['username']) and $_SESSION['role']=="Admin"){
			header("location: adminhomepage.php");
			}
	if (isset($_SESSION['username']) and $_SESSION['role']=="Star Admin"){
			header("location: staradminhome.php");
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
	<h1 class="mt-4" style= "color:BLACK"><i><marquee loop=10 SCROLLDELAY=20 HEIGHT=40 behavior="slide" direction="left" BGCOLOR=WHITE> Welcome to .blog!</marquee><i/></h1>
	<center><img src="Logo.jpg" width="333" height="250"> </center>
	<center><h2>Login Form</h2></center>
		<form action="index.php" method="post">
		
			<div class="inner_container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<div></br></div>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<div></br></div>
				<button class="login_button" name="login" type="submit">Login</button>
				<center><a href="register.php"><button type="button" class="register_btn">Register New User</button></a> </center>
				<center><a href="adminverify.php"><button type="button" class="verify_btn">Admin Verification</button></a></center>
			</div>
		</form>

		<div class="signature">
        <br/>
        <p><center><h3><strong>Follow us: <a href="https://www.twitter.com/.blog">www.twitter.com/.blog</a></h3></strong></Center></p> 
    	</div>
		
		<?php
		  #$current_user = $_SESSION['username']; 
		   $user = new User();
		   if (isset($_POST['login'])){  
      $login = $user->login($_POST['username'],$_POST['password']);  
      if($login){  
	     header("location: homepage.php");
         #echo("<script>window.location.href = 'homepage.php';</script>");
		      
				}
	  else{
		echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
				}
   }  
		
		?>
</body>
</html>
