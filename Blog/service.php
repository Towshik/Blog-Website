<?php
	session_start();
	require_once('configuration.php');
    if ($_SESSION['role']!="User"){
		header("location: index.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
<title>Report Your Problem</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<form action="service.php" method="post">
		
			<div class="inner_container">
			<div><h1> <strong> <center> Report Your Problem <center> </h1> </strong> </br> </div>
			<div></br></div>
			<label><b>Report</b></label>
				<div></br></div>
				<textarea rows="4" cols="50" name="report" placeholder="Your Report Here!" required></textarea>
				<button name="postreport" class="sign_up_btn" type="submit">Report</button>
				<a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['postreport']))
			{   $user=new User();
				$report=$_POST['report'];
                $current_user=$_SESSION['username'];
				$query = "INSERT INTO reports(`username`,`issue`) VALUES ('$current_user','$report')";
				$query_run = mysqli_query($user->db->dbh,$query);
				if($query_run)
				{
					echo '<script type="text/javascript">alert("Report Submitted,Thank You!")</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
		?>
	</div>
</html>
