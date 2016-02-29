<?php



if ((function_exists('session_status')
		&& session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
			session_start();
		}
    
    // Check, if username session is NOT set then this page will jump to login page
    if (!isset($_SESSION['id']['username'])) {
        header('Location:index.php');
    }






	require 'packagingConnection.php';
	
	$database =  new packagingConnection();
	
	

	$email = htmlspecialchars($_POST['Email']);
	$mobile =htmlspecialchars($_POST['usrtel']);
	$quantity = htmlspecialchars($_POST['quantity']);
	
	
	$length = htmlspecialchars($_POST['length']);
	$width = htmlspecialchars($_POST['width']);
	$height = htmlspecialchars($_POST['height']);
	
	
	$thickness = htmlspecialchars($_POST['thickness']);
	$material = htmlspecialchars($_POST['material']);
	
	$unitPrice = htmlspecialchars($_POST['unitPrice']);
	$total = htmlspecialchars($_POST['total']);
	

	$browser = array();
	
	
	for ($i = 0 ; $i< 5;$i++){
		$browser['browser'.$i] = uploadfiles($i);
	}
	
	

	extract($browser);
	
	/*
	 * upload files
	 */
	
	function uploadfiles($count){
		$folder = "admin/customOrdersUploads/";
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
	
	
	$query = "INSERT INTO customDesignOrders(length,width,height,thickness,material,unitPrice,total,email,mobile,quantity,image0,image1,image2,image3,image4, bookingtime)VALUES('$length','$width','$height','$thickness','$material','$unitPrice','$total','$email','$mobile','$quantity','$browser0','$browser1','$browser2','$browser3','$browser4',NOW())";
	
	$resultQuery =  mysql_query($query);
	
	$cdid = mysql_insert_id();
	
	if($resultQuery == 1){
		header("Location:Customdesign_user.php?msg1=Your order has been confirmed. Your Order Id is $cdid.<br>Our Executive will get in touch with you for order processing.");
	}else{
		header("Location:Customdesign_user.php?msg=Custom design update failed. Please try again.");
	}
	

?>