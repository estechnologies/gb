<?php
	require 'connect.php';
	
	
	$database = new connect();
	
	$email = htmlspecialchars($_POST['email']);
	$pass1 = htmlspecialchars(md5($_POST['password1']));
	$pass2 = htmlspecialchars(md5($_POST['password2']));
	
	
	
	// checking email is empty and password
	if(checkValidate($email)){
		if($pass1 === $pass2){
				//check email
				$emailCheck = "SELECT * FROM users WHERE email='$email'";
				$resultEmailCheck = mysql_query($emailCheck);
					
					//checking the email
					if(mysql_num_rows($resultEmailCheck) == 1){
						$updatePassword = "UPDATE users SET password='$pass1' WHERE email='$email'";
						$resultupdatePassword = mysql_query($updatePassword);
							
							// updating the passwords
							if($resultupdatePassword == 1){
								header("Location:login.php?msg1=Your Password has been reset successfully. Please Login.");
							}else{
								header("Location:resetEmailPassword.php?msg=Password Reset failed.. ,Please try again");
							}
							
						
					}else{
						// email not found
						header("Location:resetEmailPassword.php?msg= Email not registered");
					}			
			
		}else{
			header("Location:resetEmailPassword.php?msg=New Password and Confirm New passwords should be same&email=$email");
		}
	}else{
		header("Location:login.php?msg=Time out please try again");
	}
	
	/*
	 * checks the email is empty and passwords are same or not
	 *  
	 * @param unknown $email
	 * @param unknown $pas1
	 * @param unknown $pas2
	 * @return boolean
	 */
	function checkValidate($email){
		if(!empty($email)){
			return true;
		}else{
			return  false;
		}
		
	}
	
	
?>