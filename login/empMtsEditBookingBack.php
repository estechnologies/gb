<?php


	require 'packagingConnection.php';
	
	$database = new packagingConnection();
	
	
	$productbookingid = htmlspecialchars($_POST['productbookingid']);
	$productName = htmlspecialchars($_POST['productName']);
	$productCode = htmlspecialchars($_POST['productCode']);
	$producDescription = htmlspecialchars($_POST['producDescription']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$unitPrice = htmlspecialchars($_POST['unitPrice']);
	$Total = htmlspecialchars($_POST['Total']);
	$status = htmlspecialchars($_POST['status']);
	$reference = htmlspecialchars($_POST['reference']);
	
	
	
	$query = "UPDATE productOrders SET status='$status',reference='$reference' 	WHERE pdoId='$productbookingid'";
	
	
	$resultQuery = mysql_query($query);
	
	if($resultQuery == 1){
		header("Location:MTSBookingsEdit.php?id=$productbookingid&msg1=MTS Booking has been updated successfully.");
	}else{
		header("Location:MTSBookingsEdit.php?id=$productbookingid&msg=Failed MTS Booking Update");
	}

?>