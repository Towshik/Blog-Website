<?php
class User  
  
{  public $db;
    public function __construct() {  
        $this->db = new DB(); 
		
    }  
  
    public function register($username, $email,$phone, $password, $cpassword) {  
	if($password==$cpassword)
				{
					$query = "SELECT * FROM users WHERE username='$username'";
				    $query_run = mysqli_query($this->db->dbh,$query);
					$query2= "select * from users where email='$email'";
					$query_run2 = mysqli_query($this->db->dbh,$query2);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
							
						}

						if(mysqli_num_rows($query_run2)>0)
						{
							echo '<script type="text/javascript">alert("This Email Already exists.. Please try another email!")</script>';
							
						}
						
						else if(strlen($password)<6)
						{
	                         echo '<script type="text/javascript">alert("Password must be at least 6 characters long!")</script>';
	                           }
							
	
	                    else if(strlen($username)<3){
	                         echo '<script type="text/javascript">alert("Username must be at least 3 characters!")</script>';
	                          }
	                    else if(preg_match('/[^a-z0-9]+/i',$username))
						{
		                      echo '<script type="text/javascript">alert("Username must only contain alpahbets and numbers")</script>';
	                           }
	
	                    else if(strlen($phone)<11)
						{
	                          echo '<script type="text/javascript">alert("Phone no is too short")</script>';
	                        }
	                    else if(preg_match('/[^0-9]+/i',$phone)) 
	                   {
		                      echo '<script type="text/javascript">alert("Phone no can only contain numbers")</script>';
	                        }
							
						
						else
						{    
							
							$query = "INSERT INTO users(`username`,`email`,`phone`,`password`) VALUES ('$username','$email','$phone',MD5('$password'))";
							$query_run = mysqli_query($this->db->dbh,$query);
							if($query_run)
							{
								$_SESSION['username'] = $username;
								$_SESSION['email'] = $email;
								$_SESSION['phone'] = $phone;
								$_SESSION['password'] = $password;
								$_SESSION['role'] = "User";
								 
								return true;
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
						
					}
					else
					{
						return false;
					}
	
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
    }  
	
  
    public function login($username, $pass) {  
        $pass = MD5($pass);  
        $query = "select * from users where username='$username' and password='$pass' ";
		$check = mysqli_query($this->db->dbh,$query);  
		if($check)
				{
					if(mysqli_num_rows($check)>0)
					{
					$row = mysqli_fetch_array($check,MYSQLI_ASSOC);
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $pass;
					$_SESSION['role'] = "User";
					return true;
					}
					else
					{
						return false;
					}
				}
    }  

	public function poststatus($username, $title, $status) {  
        $query = "INSERT INTO requests(`username`,`title`,`status`) VALUES ('$username','$title','$status')";
		$check = mysqli_query($this->db->dbh,$query);  
		if($check)
				{
					return true;
					}
					else
					{
						return false;
					}
				}  
	public function poststatuswithimage($username, $title, $status,$image) {  
		$query = "INSERT INTO requests(`username`,`title`,`status`,`image`) 
		VALUES ('$username','$title','$status','$image')";
		$check = mysqli_query($this->db->dbh,$query);  
		if($check)
				{
					return true;
					}
					else
					{
						return false;
					}
				}  

	public function updateemail($email,$password){
		  $password=md5($password);
          $current_user=$_SESSION['username'];
		  $query="select password from users where username='$current_user'";
          $query_run= mysqli_query($this->db->dbh,$query);
		  $row = mysqli_fetch_row($query_run);
		  $result=$row[0];
		  $query2= "select * from users where email='$email'";
		  $query_run2 = mysqli_query($this->db->dbh,$query2);
		  if ($result!=$password){
			echo '<script type="text/javascript">alert("Wrong Password!")</script>';
		  }
			else if(mysqli_num_rows($query_run2)>0)
						{
							echo '<script type="text/javascript">alert("This Email Already exists.. Please try another email!")</script>';
							
						}
			else{
             $query= "update users set email='$email' where username='$current_user'";
			 $query_run = mysqli_query($this->db->dbh,$query);
						if($query_run)
						{
							
						   return true;
						}
						else
						{
							return false;
						}
						}

		  }

		  public function updatephone($phone,$password){
			$password=md5($password);
			$current_user=$_SESSION['username'];
			$query="select password from users where username='$current_user'";
			$query_run= mysqli_query($this->db->dbh,$query);
			$row = mysqli_fetch_row($query_run);
			$result=$row[0];
			$query2= "select * from users where phone='$phone'";
			$query_run2 = mysqli_query($this->db->dbh,$query2);
			if ($result!=$password){
				echo '<script type="text/javascript">alert("Wrong Password!")</script>';
			}
			else if(mysqli_num_rows($query_run2)>0)
						  {
							  echo '<script type="text/javascript">alert("This Phone Number Already exists.. Please try another phone number!")</script>';
							  
						  }
			else if(strlen($phone)<11)
				  {
						echo '<script type="text/javascript">alert("Phone Number is too short")</script>';
					  }
			  else{
			   $query= "update users set phone='$phone' where username='$current_user'";
			   $query_run = mysqli_query($this->db->dbh,$query);
						  if($query_run)
						  {
							  
							 return true;
						  }
						  else
						  {
							  return false;
						  }
						  }
					  
  
			}
			public function updatepassword($opassword,$npassword,$cpassword){
				$opassword=md5($opassword);
				$current_user=$_SESSION['username'];
				$query="select password from users where username='$current_user'";
				$query_run= mysqli_query($this->db->dbh,$query);
				$row = mysqli_fetch_row($query_run);
				$result=$row[0];
				$newpassword=md5($npassword);
				$confirmpassword=md5($cpassword);
				if ($result!=$opassword){
					echo '<script type="text/javascript">alert("Wrong Password!")</script>';
				}
				else if($newpassword!=$confirmpassword)
					{ 
						echo '<script type="text/javascript">alert("New Password and Confirm Password Did Not Match")</script>';
					}
				else if($npassword==$opassword)
				  {
					echo '<script type="text/javascript">alert("New Password can not be the old password")</script>';
				  }
				  else if(strlen($npassword)<6)
						{
	                         echo '<script type="text/javascript">alert("Password must be at least 6 characters long!")</script>';
	                           }
				  else{
				  $query= "update users set password='$npassword' where username='$current_user'";
				  $query_run = mysqli_query($this->db->dbh,$query);
							  if($query_run)
							  {
								  
								 return true;
							  }
							  else
							  {
								  return false;
							  }
							}
					}	  
	public function follow($current_user,$username) {  
		$query3="select * from users where username='$username'";
		$query_run3 = mysqli_query($this->db->dbh,$query3);
		if(mysqli_num_rows($query_run3)>0){
		$query = "select * from follower where username='$current_user' and following='$username'";
		$check = mysqli_query($this->db->dbh,$query); 
		if(mysqli_num_rows($check)>0)
		{
			echo '<script type="text/javascript">alert("You Already Follow This User!")</script>';
			
		}
		else{
            $query2="insert into follower (`username`,`following`) values ('$current_user','$username')";
			$query_run2= mysqli_query($this->db->dbh,$query2);
            if($query_run2){
				return true;
				}
			else{
				return false;
			}
		}
	}
	else{
		echo '<script type="text/javascript">alert("No Such User!")</script>';
	}
		}

}
?>