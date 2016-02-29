<?php


	require 'packagingConnection.php';
	
	$database = new packagingConnection();
	
	$cdid = htmlspecialchars($_POST['cdid']);
	$material = htmlspecialchars($_POST['material']);
	$thickness = htmlspecialchars($_POST['thickness']);
	$price = htmlspecialchars($_POST['Price']);
	
	
	$query = "UPDATE customDesignPricing SET material='$material',thickness='$thickness',price='$price' WHERE cdid='$cdid'";
	
	$resultQuery = mysql_query($query);
	
	if($resultQuery == 1){
		header("Location:admin_packagingSolution_customPricing_Edit.php?cdid=$cdid&msg1=MTO Pricing has been updated successfully.");
	}else{
		header("Location:admin_packagingSolution_customPricing_Edit.php?cdid=$cdid&msg1=MTO Order has  updated UNsuccessfull.");
	}

	
	
?>