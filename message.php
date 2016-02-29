<?php
	require 'connect.php';
		
	$database = new connect();
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$number = htmlspecialchars($_POST['number'])
	$comments = htmlspecialchars($_POST['comments']);
		
	$query = "INSERT INTO messages(time,name,email,number,message)VALUES(NOW(),'$name','$email','$number','$comments')";
	
	$result = $database->insertDatabase($query);
	if($result == true){
		echo 'success';
	}else{
		echo 'fail';
	}
?>