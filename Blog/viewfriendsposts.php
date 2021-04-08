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
		<center><h2>Your Friends Posts</h2></center>
		<?php
           $user= new User();
           $current_user=$_SESSION['username'];
           $query = "SELECT following FROM follower where username='$current_user'";
            $query_run = mysqli_query($user->db->dbh, $query);
            if (mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                $friend=$row['following'];
                $query2="select * from posts where username='$friend'";
                $query_run2 = mysqli_query($user->db->dbh, $query2);
                if (mysqli_num_rows($query_run2) > 0){
                while($row2=mysqli_fetch_assoc($query_run2)){
                    if ($row2['flag']!=true){
                        echo "Username: " .$row2['username'] . "<br>". " Title: " . $row2['title']. "<br>" .
                        " Status:" ."<br>". $row2['status']."<br>"."<br>";}
                        else{
                            echo "Username: " .$row2['username'] . "<br>". " Title: " . 
                            $row2['title']. "<br>". $row2['image']. "<br>" ." Status:" 
                            ."<br>" . $row2['status']."<br>"."<br>";
                        }
                }
                }
                else{
                    echo "Your Friend '$friend' has no post!";
                }  
            }
            } else {
            echo "You Have No Friends!". "<br>";
            }
        ?>  
        <a href="homepage.php"><button type="button" class="back_btn"><< Back to Homepage</button></a>
    </div>
</body>
</html>