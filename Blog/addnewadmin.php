<?php
session_start();
require_once('configuration.php');
if ($_SESSION['role']!= "Star Admin"){
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>User List</h2></center>
		<?php 
        $db = new DB();
$query = "SELECT * FROM users";
$query_run = mysqli_query($db->dbh, $query);

if (mysqli_num_rows($query_run) > 0) {
  while($row = mysqli_fetch_assoc($query_run)) {
    echo " Username: " . $row['username']."&nbsp &nbsp &nbsp". " Email: " . $row['email']. "&nbsp &nbsp &nbsp" .
    " Phone: " . $row['phone']. "<br>";
  }
} else {
  echo "No Users";
}
?>
<br> 
		<form action="addnewadmin.php" method="post">
			<div class="inner_container">
            <label><b>Username</b></label>
				<input type="text" placeholder="Enter Username of New Admin" name="username" required>
				<div></br></div>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Your Password" name="password" required>
				<div></br></div>
                <label><b>Admin Verification Code</b></label>
				<input type="password" placeholder="Enter Admin Verification Code" name="verifycode" required>
				<div></br></div>
				<button class="login_button" name="addadmin" type="submit">Add New Admin</button>
				<a href="staradminhome.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>			
				
			</div>
		</form>
		<div> </br> </div>
<?php
$admin = new Admin();
$current_user=$_SESSION['username'];
if(isset($_POST['addadmin'])){
$register = $admin->adminregister($_POST['username'],$_POST['password'],$_POST['verifycode'],$current_user);
if($register){  
    echo'<script type="text/javascript">alert("New Admin Added Successfully!")</script>';
      }
}
?>

	</div>
</body>
</html>