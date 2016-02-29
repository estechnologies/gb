<?php 
	
	session_start();
	require 'packagingConnection.php';

	/*
	 * getting posts
	 */
	$productName = htmlspecialchars($_POST['productName']);
	$productCode = htmlspecialchars($_POST['productCode']);
	$producDescription = htmlspecialchars($_POST['producDescription']);
	$dimensions = htmlspecialchars($_POST['dimensions']);
	$unitPrice = htmlspecialchars($_POST['unitPrice']);
	$MOQ = htmlspecialchars($_POST['MOQ']);
	$leadtime = htmlspecialchars($_POST['LeadTime']);
	$imagecount = $_POST['imagecount'];
	
	
	
	$photo = array();
	for($i = 0; $i <= 5; $i++){
		$photo[image.$i] = uploadPhotos($i);
	}
	
	extract($photo);
	
	/*
	 * uploading to packaging uploads folder
	 */
	
	
	function uploadPhotos($count){
		$folder = "packagingUploads/";
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
	 * inserting the photo
	 */
	
	$database = new packagingConnection();
	
	
	
	
	
	
	$query = "INSERT INTO products(productname,productcode,productdescription,dimension,unitprice,moq,leadtime,image0,image1,image2,image3,image4)VALUES('$productName','$productCode','$producDescription','$dimensions','$unitPrice','$MOQ','$leadtime','$image0','$image1','$image2','$image3','$image4')";
	
	
	
	$resultQuery = mysql_query($query);
	$id = mysql_insert_id();
	
	if($resultQuery == 1){
		header("Location:Admin_MTS_Products_Create.php?msg1=MTS Product has been added to the Products List. Product ID is $id");
	}else{
		header("Location:Admin_MTS_Products_Create.php?msg=failed to create product");
	}
?>