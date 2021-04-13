<?php

class Admin  
  
{  public $db;
    public function __construct() {  
        $this->db = new DB(); 
		
    }  

    public function verify($adminps){
		$adminps=md5($adminps);
		$query= "select * from admincheck where adminps='$adminps'";
		$query_run = mysqli_query($this->db->dbh,$query);
		if($query_run){
			
			if(mysqli_num_rows($query_run)<1)
						{  
							return false;
							
						}
			else{
				$_SESSION['code'] = $adminps;
			return true;
		}
		
	} 	
	}
    
	
	public function adminlogin($username, $pass) {  
        $pass = MD5($pass);  
        $query = "select * from admin where username='$username' and password='$pass' ";
		$check = mysqli_query($this->db->dbh,$query);  
		if($check)
				{
					if(mysqli_num_rows($check)>0)
					{
					$row = mysqli_fetch_array($check,MYSQLI_ASSOC);
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $pass;
					$query = "select role from admin where username='$username' and password='$pass' ";
					$result= mysqli_query($this->db->dbh,$query);
					$row = mysqli_fetch_row($result);
					$_SESSION['role']=$row[0];
					return true;
					}
					else
					{
						return false;
					}
				}
    }

    public function adminregister($username, $password, $verifycode,$current_user) {  
					$query = "SELECT * FROM admin WHERE username='$username'";
					$query_run = mysqli_query($this->db->dbh,$query);
					$x=md5($password);
					$x2=md5($verifycode);
					$query2 ="select password from admin where username='$current_user'";
					$query_run2= mysqli_query($this->db->dbh,$query2);
					$row2 = mysqli_fetch_row($query_run2);
					$result2=$row2[0];
					$query3="select adminps from admincheck";
					$query_run3 = mysqli_query($this->db->dbh,$query3);
					$row3 = mysqli_fetch_row($query_run3);
					$result3=$row3[0];
					$query4 = "SELECT * FROM users WHERE username='$username'";
					$query_run4 = mysqli_query($this->db->dbh,$query4);
				if($query_run)
					{   if(mysqli_num_rows($query_run4)>0){
						if($x2==$result3){

						if($result2==$x)
						{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
							
						}
						
						
						
						else
						{    
							$query= "SELECT password from users where username='$username'";
							$result= mysqli_query($this->db->dbh,$query);
					        $row = mysqli_fetch_row($result);
					        $z=$row[0];
							$query = "INSERT INTO admin(`username`,`password`,`role`) VALUES ('$username','$z','Admin')";
							$query_run = mysqli_query($this->db->dbh,$query);
							if($query_run)
							{
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								$_SESSION['role'] = "Admin";
								return true;  
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
				}
				
				   else{
					echo '<script type="text/javascript">alert("Incorrect Password")</script>';
				   }
				}
				else{
					echo '<script type="text/javascript">alert("Incorrect Admin Verification Code")</script>';
				}
			}
			else{
				echo '<script type="text/javascript">alert("No Such User Exists")</script>';
			}
		}
					else
					{
						return false;
					}
	
				
				
    }  	

	public function updateadminpassword($opassword,$npassword,$cpassword){
		$opassword=md5($opassword);
		$current_user=$_SESSION['username'];
		$query="select password from admin where username='$current_user'";
		$query_run= mysqli_query($this->db->dbh,$query);
		$row = mysqli_fetch_row($query_run);
		$result=$row[0];
		if ($result==$opassword){
		  if($npassword==$cpassword)
			{ 
		   $npassword=md5($npassword);
		   if($npassword!=$opassword){
		   $query= "update admin set password='$npassword' where username='$current_user'";
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
			else{
				echo '<script type="text/javascript">alert("New Password can not be the old password")</script>';
			}
		}
			else{
				echo '<script type="text/javascript">alert("New Password and Confirm Password Did Not Match")</script>';
			}
				  }
		  else{
			  echo '<script type="text/javascript">alert("Wrong Password!")</script>';
		  }

		}
		public function updateadminvcode($ocode,$ncode,$ccode){
			$ocode=md5($ocode);
			$query="select adminps from admincheck";
			$query_run= mysqli_query($this->db->dbh,$query);
			$row = mysqli_fetch_row($query_run);
			$result=$row[0];
			if ($result==$ocode){
			  if($ncode==$ccode)
				{ 
			   $ncode=md5($ncode);
			   if($ncode!=$ocode){
			   $query= "update admincheck set adminps='$ncode'";
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
				else{
					echo '<script type="text/javascript">alert("New Code can not be the old code")</script>';
				}
			}
				else{
					echo '<script type="text/javascript">alert("New Code and Confirm Code Did Not Match")</script>';
				}
					  }
			  else{
				  echo '<script type="text/javascript">alert("Wrong Code!")</script>';
			  }
	
			}
			public function approvepost($postid) {  
				$query = "select * from requests where id='$postid'";
				$query_run = mysqli_query($this->db->dbh,$query); 
				$row = mysqli_fetch_row($query_run); 
				if($query_run)
						{
							$username=$row[1];
							$title=$row[2];
							$status=$row[3];
							$image=$row[4];
							$postid2=$row[5];
							if($title!=null){
							if ($image==null and $postid2==0){
                              $query2="INSERT INTO posts(`username`,`title`,`status`,`flag`) 
							  VALUES ('$username','$title','$status',false)";
							  $query_run2 = mysqli_query($this->db->dbh,$query2); 
                              if($query_run2){
								  $query3="delete from requests where id='$postid'";
								  $query_run3 = mysqli_query($this->db->dbh,$query3);
								  return true;
							  }
							}
							else if ($image!=null and $postid2==0){
								$imageloc='images/'.$image;
								$var1= '<img src="'.$imageloc.'" alt="" width=500px/>';
								$query2="INSERT INTO posts(`username`,`title`,`status`,`image`,`flag`) 
							  VALUES ('$username','$title','$status','$var1',true)";
							  $query_run2 = mysqli_query($this->db->dbh,$query2); 
                              if($query_run2){
								  $query3="delete from requests where id='$postid'";
								  $query_run2 = mysqli_query($this->db->dbh,$query3);
								  return true;
							}
							}
							else if ($image!=null and $postid2!=0){
								$imageloc='images/'.$image;
								$var1= '<img src="'.$imageloc.'" alt="" width=500px/>';
								$query2="update posts set status='$status',title='$title',image='$var1'
								 where id='$postid2'";
							  $query_run2 = mysqli_query($this->db->dbh,$query2); 
                              if($query_run2){
								  $query3="delete from requests where id='$postid'";
								  $query_run3 = mysqli_query($this->db->dbh,$query3);
								  return true;
							}
						}
						else if ($image==null and $postid2!=0){
							$query2="update posts set status='$status',title='$title' where id='$postid2'";
						  $query_run2 = mysqli_query($this->db->dbh,$query2); 
						  if($query_run2){
							  $query3="delete from requests where id='$postid'";
							  $query_run3 = mysqli_query($this->db->dbh,$query3);
							  return true;
						}
					}
				}
						else{
							echo '<script type="text/javascript">alert("No Such Posts!")</script>';
						}
					
				}
							else
							{
								return false;
							}
						}
						
				public function deletepost($postid) {  
					$query = "select * from requests where id='$postid'";
					$query_run = mysqli_query($this->db->dbh,$query); 
					$row = mysqli_fetch_row($query_run); 
					if($query_run)
							{
								$username=$row[1];
								$title=$row[2];
								$status=$row[3];
								$image=$row[4];
								if($title!=null){
									$query2="delete from requests where id='$postid'";
									$query_run2 = mysqli_query($this->db->dbh,$query2);
									if($query_run2){
										return true;
									}

							}
							else{
								echo '<script type="text/javascript">alert("No Such Posts!")</script>';
							}
						}
								else
								{
									return false;
								}
							}
				public function deletereport($reportid) {  
					$query = "select * from reports where id='$reportid'";
					$query_run = mysqli_query($this->db->dbh,$query); 
					$row = mysqli_fetch_row($query_run); 
					if($query_run){
					    $id=$row[0];
						if ($id!=null)
						{ $query2="delete from reports where id='$reportid'";
							$query_run2 = mysqli_query($this->db->dbh,$query2);
							if($query_run2){
								return true;
							}
						}

					else{
						echo '<script type="text/javascript">alert("No Such Reports!")</script>';
						return false;}
					}
				}  
	  
}

?>