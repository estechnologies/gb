<?php 
	session_start();
	
	
	
	
	
	$id = $_SESSION['id']['userid'];
	
		require 'connect.php';
		
		
		$database = new connect();
		
		$oldPass = htmlspecialchars(md5($_POST['oldPassword']));
		$pass1 = htmlspecialchars(md5($_POST['password1']));
		$pass2 = htmlspecialchars(md5($_POST['password2']));
		
		$query = "SELECT password FROM users WHERE userid='$id'";
		$resultQuery = mysql_query($query);
		
		
			
		while($row = mysql_fetch_array($resultQuery)){
			$password = $row['password'];
		}
		
		
		if($password === $oldPass){
		
						if($pass1 === $pass2){
							if($password != $pass1){
									$updateQuery = "UPDATE users SET password='$pass1' WHERE userid='$id'";
									$updateResult = mysql_query($updateQuery);
										if($updateResult == 1){
										
											header("Location:resetpassword.php?msg1=Password Reset has been Successful. <a href='login.php'>Click here</a> to Login with New Password");
										}else{
											header("Location:resetpassword.php?msg=Password Reset has been UnSuccessful... Please try again ");
										}
							}else{
								// checking current password and new password
								header("Location:resetpassword.php?msg=Current and New Passwords must be different");
							}
				}else{
				// password doesn`t match
					header("Location:resetpassword.php?msg=Entered New passwords doesn`t match");
				}		
		}else{
		
			//old password not match
			header("Location:resetpassword.php?msg=Current password do not match");
			
		}
			
		
?>