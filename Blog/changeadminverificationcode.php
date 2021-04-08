<?php
session_start();
require_once('configuration.php');
$current_user = $_SESSION['username']; 
		if ($current_user==null){
			header("location: index.php");
		}
        else if ($_SESSION['role']!="Star Admin"){
            header("location:index.php");}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Admin Verification Code</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>Change Admin Verification Code</h2></center>
        <form action="changeadminverificationcode.php" method="post">
			<div class="inner_container">
            <label><b>Enter Old Code</b></label>
				<input type="password" placeholder="Enter Old Code" name="ocode" required>
				<div></br></div>
				<label><b>Enter New Code</b></label>
				<input type="password" placeholder="Enter New Code" name="ncode" required>
				<div></br></div>
                <label><b>Confirm New Code</b></label>
				<input type="password" placeholder="Confirm New Code" name="ccode" required>
				<div></br></div>
				<button class="login_button" name="changeinfo" type="submit">Change Verification Code</button>
				<a href="staradminhome.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>	

				
			</div>
		</form>
		<div> </br> </div>
        <?php 
         if(isset($_POST['changeinfo'])){
           $admin=new Admin();
           $update = $admin->updateadminvcode($_POST['ocode'],$_POST['ncode'],$_POST['ccode']);  
      if($update){  
        echo '<script type="text/javascript">alert("Code Changed Successfully!")</script>';
				}
	  else{
		echo '<script type="text/javascript">alert("Could Not Change Code")</script>';
				}

         }

        ?>
		
	</div>
</body>
</html>