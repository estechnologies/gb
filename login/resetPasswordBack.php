<?php

	require 'connect.php';
	
	$database = new connect();
	
	$id = htmlspecialchars($_POST['id']);
	$email = htmlspecialchars($_POST['email']);
	$oldPass = htmlspecialchars($_POST['oldPassword']);
	$password1 = htmlspecialchars($_POST['password1']);
	$password2 = htmlspecialchars($_POST['password2']);
	
	
	$query = "SELECT * FROM employee_record WHERE Employee_ID ='$id'";
	
	$resultQuery = mysql_query($query);
	
	if(mysql_num_rows($resultQuery) != 0){
		
		$row = mysql_fetch_array($resultQuery);
		
		/*
		 * checking email
		 */
		
		if($email == $row['email']){
			
			$oldPass = md5($oldPass);
			
			if($oldPass == $row['password']){
				
				if($password1 == $password2){
					$password1 = md5($password1);
					
					$updateQuery = "UPDATE employee_record SET password ='$password1'";
					$updateResultQuery = mysql_query($updateQuery);
					
					/*
					 * update results 
					 */
					if($updateResultQuery == 1){
						header("Location:resetpassword.php?msg1=“Password Reset has been Successful. <a href='logout.php' >Click here</a> to Login with");
					}else{
						header("Location:resetpassword.php?msg= password update failed try  again");
					}
					
					
				}else{
					header("Location:resetpassword.php?msg= password & confirm password must same");
				}
				
				
			}else{
				header("Location:resetpassword.php?msg=old password not correct");
			}
			
			
			
		}else{
			header("Location:resetpassword.php?msg=email not correct");
		}
		
		
	}else{
		header("Location:resetpassword.php?msg=account not found");
	}
	
?>