<?php
	require 'connect.php';
	$database = new connect();
	$id = $_GET['id'];
	if(!empty($id)){
		$query = "UPDATE users SET active='1'WHERE userid='$id'";
		$result = mysql_query($query);
		
		if(!empty($result)){
				header("Location: login.php?msg1=Your account has been activated. Please login.");
		}else{
				header("Location: login.php?msg=Your account not activated please contact goods cab");
		}
		
	}else{
				header("Location: login.php?msg=id empty contact goodscab");
	}
?>