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
<title>Reports</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>Reports</h2></center>
<?php 
$admin = new Admin();
$query = "SELECT * FROM reports";
$query_run = mysqli_query($admin->db->dbh, $query);

if (mysqli_num_rows($query_run) > 0) {
  while($row = mysqli_fetch_assoc($query_run)) {
    echo "ID: ".$row['id']."<br>"."Username: " . $row['username']."<br>". "Issue:" ."<br>". $row['issue']."<br>" ."<br>";
  }
} else {
  echo "No Reports!";
}

?> 
		<div> </br> </div>
        <div> </br> </div>
        <center><h1>Delete Issue</h1></center>
            <form action="viewreports.php" method="post">
            <div class="inner_container">
            <label><b>Enter Report ID</b></label>
				<input type="text" placeholder="Enter Report ID" name="reportid" required>
				<div></br></div>
				<button class="login_button" name="delete" type="submit">Delete Report</button>	
			</div>
		</form>
		<div> </br> </div>
        <div> </br> </div>
<a href="staradminhome.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
	</div>
    <?php
   if (isset($_POST['delete'])){  
    $delete = $admin->deletereport($_POST['reportid']);  
    if($delete){  
      echo '<script type="text/javascript">alert("Successfully Deleted Report!")</script>';
      header("Refresh:0");
              }
    else{
      echo '<script type="text/javascript">alert("Report Does Not Exist!")</script>';
              }
 }  	
		?>
</body>
</html>