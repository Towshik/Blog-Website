<!doctype html>
<?php
	session_start();
	require_once('configuration.php');
?>
<html>
<head>
<title>Admin Verification Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
	<center><h2>Admin Verification</h2></center>
		<form action="adminverify.php" method="post">
		
			<div class="inner_container">
				<label><b>Verification Code</b></label>
				<input type="password" placeholder="Enter Admin's Code" name="adminps" required>
				<div></br></div>
				<button class="login_button" name="verify" type="submit"> Submit </button>
				<a href="index.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
		
		<?php
		   $admin = new Admin();
		   if (isset($_POST['verify'])){  
      $verify = $admin->verify($_POST['adminps']);  
      if($verify){  
         echo("<script>window.location.href = 'adminlogin.php?verified=true' ;</script>");
				}
	  else{
		echo '<script type="text/javascript">alert("Wrong Admin Code")</script>';
				}
   }  
		
		?>
		
		
</body>
</html>