<?php

// Inialize session
session_start();

// Include database connection settings
require 'connect.php';

$database = new connect();

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM service_providers WHERE (service_username = '" .     mysql_real_escape_string($_POST['username']) . "') and (service_password = '" .     mysql_real_escape_string(md5($_POST['password'])) . "')");

	//getting the service provider code and session 
	
	$rows = mysql_fetch_array($login);
		
	



// Check username and password match
 if (mysql_num_rows($login) == 1) {
 
 
// Set username session variable
$_SESSION['service_username'] = $_POST['username'];
$_SESSION['service'] = $rows;

// Jump to secured page
 header('Location: main.php');
}
else {
	//echo 'please check your usename and password';
// Jump to login page


header('Location: index.php?msg=check your username and password');
}

?>