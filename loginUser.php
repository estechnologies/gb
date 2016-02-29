<?php
session_start();

	require 'connect.php';
	
	$database = new connect();
	
	$email =  htmlspecialchars($_POST['email']);
	$password  = htmlspecialchars($_POST['password']);
	
/*
 * check email and passsword
 */
	if(!empty($password)){
			if(!empty($email)){
					$password = md5($password);
					$query = "SELECT * FROM users WHERE email='$email' AND password='$password' AND active='1'";
					$resultQuery = mysql_query($query);
					if(mysql_num_rows($resultQuery) == 1){
						$row = mysql_fetch_array($resultQuery);
						$_SESSION['id'] = $row;
						header("Location:main.php");
					}else{
						// output buffer
						header("Location:login.php?msg=Please enter valid Email and Password");	
					}
			}else{
			
				header("Location:login.php?msg=Please enter Email");
		
			}
	}else{
		header("Location:login.php?msg=Please enter Password");
	}
	
	
?>