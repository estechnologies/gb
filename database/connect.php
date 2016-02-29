<?php
	$host = "localhost";
	$user = "goodscab_admin";
	$pass = "gCAB2015";
	$db = "goodscab_operations";
	
	$connect = mysql_connect($host, $user, $pass);
	mysql_select_db("$db",$connect) or die(mysql_error());
	
?>