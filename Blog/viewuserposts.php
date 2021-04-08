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
           $x=1;
           $user= new User();
           $current_user=$_SESSION['username'];
           $query = "SELECT * FROM posts where username='$current_user'";
            $query_run = mysqli_query($user->db->dbh, $query);
            if (mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                if ($row['flag']!=true){
                echo "Serial No: " .$x . "<br>". " Title: " . $row['title']. "<br>" .
                " Status:" ."<br>". $row['status']."<br>"."<br>";}
                else{
                    echo "Serial No: " .$x . "<br>". " Title: " . 
                    $row['title']. "<br>". $row['image']. "<br>" ." Status:" 
                    ."<br>" . $row['status']."<br>"."<br>";
                }
                $x=$x+1;
            }
            } else {
            echo "No Posts!". "<br>";
            }
        ?>  
        <a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
    </div>
</body>
</html>