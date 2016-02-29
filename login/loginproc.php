<?php

// Inialize session
session_start();

// Include database connection settings
require 'connect.php';
$database = new connect();

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM employee_record WHERE (username = '" .     mysql_real_escape_string($_POST['username']) . "') and (password = '" .     mysql_real_escape_string(md5($_POST['password'])) . "')");

// Check username and password match
 if (mysql_num_rows($login) == 1) {
 
 $row = mysql_fetch_array($login);
 // Set username session variable
$_SESSION['username'] = $_POST['username'];
$_SESSION['emp'] = $row;
// Jump to secured page
 		header('Location: main.php');
}
else {
	//echo 'please check your usename and password';
// Jump to login page
header('Location:index.php?msg=check username and password');
}

?>