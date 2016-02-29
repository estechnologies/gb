<?php

		require 'connect.php';
		$database = new connect();

		
		$query = htmlspecialchars($_POST['query']);
		$resultQuery = mysql_query($query);
		
		if(mysql_num_rows($resultQuery) > 0){
			echo  "The entered username already exists in our records. <br> Please enter a new username.";
		}else{
			echo "";
		}
?>
