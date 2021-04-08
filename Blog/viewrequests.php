<?php
    
	session_start();
	require_once('configuration.php');
	//phpinfo();
	if ($_SESSION['role']!="Admin" and $_SESSION['role']!="Star Admin"){
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Pending Posts</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #07443E">
	<div id="main-wrapper">
		<center><h2>Pending Posts</h2></center>
		<?php
           $admin= new Admin();
           $query = "SELECT * FROM requests";
            $query_run = mysqli_query($admin->db->dbh, $query);
            if (mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                if ($row['image']==null){
                    echo "Serial No: " .$row['id'] . "<br>". " Title: " . $row['title']. "<br>" .
                    " Status: " . $row['status']."<br>"."<br>";}
                    else{
                      $imageloc = 'images/'.$row['image'];
                      $var1= '<img src="'.$imageloc.'" alt="" width=500px/>';
                        echo "Serial No: " .$row['id'] . "<br>" ;
                        echo $var1. "<br>"." Title: " . $row['title']. "<br>" .
                        " Status: " . $row['status']."<br>";
                    }
            }
            } else {
            echo "No Pending Requests". "<br>";
            }
        ?>  
            <center><h1>Approve Post</h1></center>
            <form action="viewrequests.php" method="post">
            <div class="inner_container">
            <label><b>Enter Post ID</b></label>
				<input type="text" placeholder="Enter Post ID" name="postid" required>
				<div></br></div>
				<button class="login_button" name="approve" type="submit">Approve Post</button>	
			</div>
		</form>
		<div> </br> </div>
        <div> </br> </div>
        <div> </br> </div>
        <center><h1>Delete Post</h1></center>
        <form action="viewrequests.php" method="post">
            <div class="inner_container">
            <label><b>Enter Post ID</b></label>
				<input type="text" placeholder="Enter Post ID" name="postid" required>
				<div></br></div>
				<button class="logout_button" name="delete" type="submit">Delete Post</button>	
			</div>
		</form>
		<div> </br> </div>
        <div> </br> </div>
        <div> </br> </div>
        <a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
	</div>
    <?php
		   if (isset($_POST['approve'])){  
      $approve = $admin->approvepost($_POST['postid']);  
      if($approve){  
        echo '<script type="text/javascript">alert("Successfully Approved Post!")</script>';
        header("Refresh:0");
				}
	  else{
		echo '<script type="text/javascript">alert("Post Does Not Exist!")</script>';
				}
   }  
   if (isset($_POST['delete'])){  
    $delete = $admin->deletepost($_POST['postid']);  
    if($delete){  
      echo '<script type="text/javascript">alert("Successfully Deleted Post!")</script>';
      header("Refresh:0");
              }
    else{
      echo '<script type="text/javascript">alert("Post Does Not Exist!")</script>';
              }
 }  
		
		?>
</body>
</html>