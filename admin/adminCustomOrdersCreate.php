<?php

	session_start();
	require 'packagingConnection.php';
	
	/*
	 * fields
	 */
	$length = htmlspecialchars($_POST['length']);
	$width = htmlspecialchars($_POST['width']);
	$height = htmlspecialchars($_POST['height']);
	$thickness = htmlspecialchars($_POST['thickness']);
	$material = htmlspecialchars($_POST['material']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$unitPrice = htmlspecialchars($_POST['unitPrice']);
	$total = htmlspecialchars($_POST['total']);
	$status = htmlspecialchars($_POST['status']);
	$reference = htmlspecialchars($_POST['reference']);
	$imagecount = htmlspecialchars($_POST['imagecount']);
	
	
	$file = array();
	
	
	for($i = 0; $i <= $imagecount; $i++){
		$file['browser'.$i] = uploadfiles($i);
	}
	
	extract($file);
	
	
	
	
	/*
	 * upload files
	 */
	
	function uploadfiles($count){
		$folder = "customOrdersUploads/";
		$photo = rand(1000,1000000)."-".$_FILES['browser'.$count]['name'];
		$photo_loc = $_FILES['browser'.$count]['tmp_name'];
		$newPhotoName = strtolower($photo);
		$finalPhoto = str_replace('', '-', $newPhotoName);
		
		if(move_uploaded_file($photo_loc, $folder.$finalPhoto)){
			return $folder.$finalPhoto;
		}else{
			return '';
		}
	}

	
	
	/*
	 * database
	 */
	
	
	$database  = new packagingConnection();
	
	
	$query = "INSERT INTO customDesignOrders(length,width,height,thickness,material,quantity,unitPrice,total,status,reference,image0,image1,image2,image3,image4)VALUES('$length','$width','$height','$thickness','$material','$quantity','$unitPrice','$total','$status','$reference','$browser0','$browser1','$browser2','$browser3','$browser4')";
	
	$resultQuery = mysql_query($query);
	
	
	if($resultQuery == 1){
		header("Location:admin_packagingSolution_customOrders_create.php?msg= updated successfully..");
	}else{
		header("Location:admin_packagingSolution_customOrders_create.php?msg= failed to update");
	}
	
	
?>