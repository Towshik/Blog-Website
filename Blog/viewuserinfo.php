<?php
    
	session_start();
	require_once('configuration.php');
	//phpinfo();
	if ($_SESSION['role']!="User"){
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>My Information</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>My Information</h2></center>
		<?php
           $user= new User();
           $current_user=$_SESSION['username'];
           $query = "select username, email,phone,role from users where username='$current_user'";
           $query_run= mysqli_query($user->db->dbh,$query);
		   $row = mysqli_fetch_row($query_run);
           echo "Username: ". $row[0] ."<br>". " Email: " . $row[1]." <br>" ." Phone Number: ". $row[2]. "<br>"
		   . "Role: ".$row[3] ."<br>"."<br>";
        ?>
		<br>
		<center><h2>Following</h2></center>
		<?php
              $query2 = "SELECT following FROM follower where username='$current_user'";
			  $query_run2 = mysqli_query($user->db->dbh, $query2);
			  
			  if (mysqli_num_rows($query_run2) > 0) {
				while($row = mysqli_fetch_assoc($query_run2)) {
				  echo " Username: " . $row['following']."<br>" . "<br>";
				}
			  } else {
				echo "You Are Following No One";
			  }
		?>
         <br>
		<center><h2>Followers</h2></center>
		<?php
              $query3 = "SELECT username FROM follower where following='$current_user'";
			  $query_run3 = mysqli_query($user->db->dbh, $query3);
			  
			  if (mysqli_num_rows($query_run3) > 0) {
				while($row = mysqli_fetch_assoc($query_run3)) {
				  echo " Username: " . $row['username']."<br>" . "<br>";
				}
			  } else {
				echo "You Have No Followers";
			  }
		?>
         <br>
        <a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
	</div>
</body>
</html>