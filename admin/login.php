<?php
	
	session_start();
	require 'connect.php';
	
	
	
	$username = htmlspecialchars($_POST['username']);
	$pass = htmlspecialchars($_POST['password']);	
	
		
	
	/*
	 * logins
	 * 
	 */
	
	if(empty($username) && empty($pass)){
		header("Location:index.php?msg=please fill the fields");
		
	}else if(empty($username)){
		header("Location:index.php?msg=please fill the email");
	}else if (empty($pass)){
		header("Location:index.php?msg=please fill the password");
	}else{
	
		
		$database = new connect();
		
		$pass = md5($pass);
		$search = "SELECT * FROM admin WHERE username='$username' AND password='$pass'";
		$result = mysql_query($search);
		
		if(mysql_num_rows($result) <= 0){

			header("Location:index.php?msg=Please enter valid username and password");
		}else{
		
			
			$profile = mysql_fetch_array($result);
			$_SESSION['admin'] = $profile;
			header("Location:admin.php");
		}
		
		
	}
	
	
	
	
	
	


?>