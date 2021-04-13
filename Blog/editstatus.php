<?php
    
	session_start();
	require_once('configuration.php');
	//phpinfo();
	if ($_SESSION['role']!="User" ){
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Posts</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>Your Posts</h2></center>
		<?php
           $user= new User();
           $current_user=$_SESSION['username'];
           $edited_post=$_SESSION['postid'];
           $query = "SELECT * FROM posts where id='$edited_post'";
            $query_run = mysqli_query($user->db->dbh, $query);
            if (mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                if ($row['flag']!=true){
                    $id=$row['id'];
                    $title=$row['title'];
                    $status=$row['status'];
                }
                else{
                    $id=$row['id'];
                    $title=$row['title'];
                    $status=$row['status'];
                    $image=$row['image'];
                }
            }
            }
        ?> 
        <form action="editstatus.php" method="post" enctype="multipart/form-data">
			<div class="inner_container">
            <label><b>Title</b></label>
            <textarea rows="4" cols="50" name="title" required><?php echo $title ?></textarea>
				<div></br></div>
				<label><b>Status</b></label>
                <br>
				<textarea rows="4" cols="50" name="status" placeholder="Your Status Here!" required><?php echo $status ?></textarea>
				<div></br></div>
                <label for="image">Change You Image?</label>
                <br>
                <label for="image">If Yes Then Upload New Image</label>
				<input type="file" name="image" placeholder="Change Your Image?" />
                <div></br></div>
				<button class="login_button" name="poststatus" type="submit">Post</button>
				<a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>	

				
			</div>
		</form>
        
    </div>
    <?php 
		$current_user=$_SESSION['username'];
		$title='';
		$status='';
         if(isset($_POST['poststatus']) and $_FILES['image']['size']==0){
           $user=new User();
		   $title=$_POST['title'];
		   $status=$_POST['status'];
           $poststatus = $user->editstatus($_SESSION['username'],$_POST['title'],$_POST['status'],$edited_post);  
      if($poststatus){  
        echo '<script type="text/javascript">alert("Post is awaiting admin verification!")</script>';
        header("location:homepage.php");
				}
	  else{
		echo '<script type="text/javascript">alert("Could Not Edit")</script>';
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
			$poststatus = $user->editstatuswithimage($_SESSION['username'],
			              $_POST['title'],$_POST['status'],$filename,$edited_post);  
		if($poststatus){  
		 echo '<script type="text/javascript">alert("Post is awaiting admin verification!")</script>';
				 }
	   else{
		 echo '<script type="text/javascript">alert("Could Not Edit")</script>';
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
</body>
</html>