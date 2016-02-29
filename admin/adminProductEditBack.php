<?php 
	
	session_start();
	require 'packagingConnection.php';
	$database = new packagingConnection();

	/*
	 * getting posts
	 */
	$pdid = htmlspecialchars($_POST['id']);
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
		$photo[image.$i] = uploadPhotos($i,$pdid);
	}
	
	extract($photo);
	
	
	/*
	 * uploading to packaging uploads folder
	 */
	
	
	function uploadPhotos($count,$id){
		
		$database2 = new packagingConnection();
		
		$getQuery = "SELECT * FROM products WHERE productId ='$id'";
		$resultGetQuery = mysql_query($getQuery);
		
		$getRow = mysql_fetch_array($resultGetQuery);
		//
		$folder = "packagingUploads/";
		$photo = rand(1000,1000000)."-".$_FILES['browser'.$count]['name'];
		$photo_loc = $_FILES['browser'.$count]['tmp_name'];
		$newPhotoName = strtolower($photo);
		$finalPhoto = str_replace('', '-', $newPhotoName);
		
		if(move_uploaded_file($photo_loc, $folder.$finalPhoto)){
			return $folder.$finalPhoto;
		}else{
			return $getRow['image'.$count];
		}
	}
	
	
	
	/*
	 * inserting the photo
	 */
	
	
	
	
	
	
	
	
	
	$query = "UPDATE products SET productname='$productName' , productcode='$productCode',productdescription='$producDescription',dimension='$dimensions',unitprice='$unitPrice',moq='$MOQ',leadtime='$leadtime',image0='$image0',image1='$image1',image2='$image2',image3='$image3',image4='$image4' WHERE productId='$pdid'";
	
	

	
	
	$resultQuery = mysql_query($query);
	$id = mysql_insert_id();
	
	if($resultQuery == 1){
		header("Location:Admin_MTS_Products_Edit.php?id=$pdid& msg1=MTS Product has been updated successfully.");
	}else{
		header("Location:Admin_MTS_Products_Edit.php?id=$pdid&msg=failed to update product");
	}
?>