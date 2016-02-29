<?php

// Inialize session
session_start();
require 'packagingConnection.php';

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location:Sign_In.php');
}



	$material = htmlspecialchars($_POST['material']);
	$thickness = htmlspecialchars($_POST['thickness']);
	$price = htmlspecialchars($_POST['price']);
	
	
	$database = new packagingConnection();
	
	$query = "INSERT INTO customDesignPricing(material,thickness,price)VALUES('$material','$thickness','$price')";
	$totalQuery = mysql_query($query);
	
	if($totalQuery == 1){
		header("Location:admin_packagingSolution_customPricing_create.php?msg=updated succesfully..");
	}else{
		header("Location:admin_packagingSolution_customPricing_create.php?msg=updated failed");
	}

?>