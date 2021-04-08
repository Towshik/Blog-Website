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
<title>What's on Your Mind!</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>What's on Your Mind! </h2></center>
        <form action="post.php" method="post" enctype="multipart/form-data">
			<div class="inner_container">
            <label><b>Title</b></label>
				<input type="text" placeholder="Enter Title" name="title" required>
				<div></br></div>
				<label><b>Status</b></label>
                <br>
				<textarea rows="4" cols="50" name="status" placeholder="Your Status Here!" required></textarea>
				<div></br></div>
				<input type="file" name="image" />
                <div></br></div>
				<button class="login_button" name="poststatus" type="submit">Post</button>
				<a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>	

				
			</div>
		</form>
		<div> </br> </div>
        <?php 
		$current_user=$_SESSION['username'];
		$title='';
		$status='';
         if(isset($_POST['poststatus']) and $_FILES['image']['size']==0){
           $user=new User();
		   $title=$_POST['title'];
		   $status=$_POST['status'];
           $poststatus = $user->poststatus($_SESSION['username'],$_POST['title'],$_POST['status']);  
      if($poststatus){  
        echo '<script type="text/javascript">alert("Post is awaiting admin verification!")</script>';
				}
	  else{
		echo '<script type="text/javascript">alert("Could Not Post")</script>';
				}

         }

		 if(isset($_POST['poststatus']) and $_FILES['image']['size']!=0){
			$allowTypes = array('jpg','png','jpeg','gif','pdf');
			$user=new User();
			$filename = basename($_FILES["image"]["name"]);
			$fileextension= pathinfo($filename, PATHINFO_EXTENSION);
			$filename= uniqid().$filename;
            $tempname = $_FILES["image"]["tmp_name"];    
            $folder = "images/".$filename;
			if(in_array($fileextension, $allowTypes)){
			if (move_uploaded_file($tempname, $folder)){
			$poststatus = $user->poststatuswithimage($_SESSION['username'],
			              $_POST['title'],$_POST['status'],$filename);  
		if($poststatus){  
		 echo '<script type="text/javascript">alert("Post is awaiting admin verification!")</script>';
				 }
	   else{
		 echo '<script type="text/javascript">alert("Could Not Post")</script>';
				 }
				}
				else{
					echo'<script type="text/javascript">alert("Could Not Upload The Image!")</script>';
			  }
				}
		else{
			echo '<script type="text/javascript">alert("Image Extension is not good!")</script>';
		}
 
		  }
	   

        ?>
		
	</div>
</body>
</html>