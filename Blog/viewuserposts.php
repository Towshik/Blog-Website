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
           $query = "SELECT * FROM posts where username='$current_user'";
            $query_run = mysqli_query($user->db->dbh, $query);
            if (mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                if ($row['flag']!=true){
                echo "Serial No: " .$row['id'] . "<br>". " Title: " . $row['title']. "<br>" .
                " Status:" ."<br>". $row['status']."<br>"."<br>";}
                else{
                    echo "Serial No: " .$row['id'] . "<br>". " Title: " . 
                    $row['title']. "<br>". $row['image']. "<br>" ." Status:" 
                    ."<br>" . $row['status']."<br>"."<br>";
                }
            }
            } else {
            echo "No Posts!". "<br>";
            }
        ?> 
        <div> </br> </div>
        <div> </br> </div>
        <div> </br> </div>
        <center><h1>Edit Post</h1></center>
        <form action="viewuserposts.php" method="post">
            <div class="inner_container">
            <label><b>Enter Post ID</b></label>
				<input type="text" placeholder="Enter Post ID" name="postid" required>
				<div></br></div>
				<button class="login_button" name="edit" type="submit">Edit Post</button>	
			</div>
		</form>
		<div> </br> </div>
        <div> </br> </div>
        <div> </br> </div>

        <a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
        <?php 
        if (isset($_POST['edit'])){  
            $postid= $_POST['postid'];
            $query2="select * from posts where id='$postid' and username='$current_user'";
            $query_run2 = mysqli_query($user->db->dbh, $query2);
            if (mysqli_num_rows($query_run2) > 0) {
                $_SESSION['postid']=$postid;
                header("location:editstatus.php");
            }
              
            else{
              echo '<script type="text/javascript">alert("Post Does Not Exist!")</script>';
                      }	
            }
        
        ?>
    </div>
</body>
</html>