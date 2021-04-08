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
<title>Follow Your Friends</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>Follow Your Friends! </h2></center>
        <form action=follow.php method="POST">
<input type="text" name="username" placeholder="Enter Username" required />
<div> </br> </div>
<button class="login_button" name="follow" type="submit">Follow</button>
<a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
</form>
</br>
		<div> </br> </div>
        <?php 
         if(isset($_POST['follow'])){
           if($_POST['username']!=$_SESSION['username']){
           $user=new User();
           $current_user=$_SESSION['username'];
           $x=$_POST['username'];
           $follow = $user->follow($current_user,$_POST['username']);  
      if($follow){  
        echo '<script type="text/javascript">alert("Successfully Followed!")</script>';
				}
            }
        else{
            echo '<script type="text/javascript">alert("This is You!")</script>';
        }

         }
        ?>
		
	</div>
</body>
</html>