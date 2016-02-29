<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "goodscab";
	
	$connect = mysql_connect($host, $user, $pass);
	mysql_select_db("$db",$connect) or die(mysql_error());
	
?>