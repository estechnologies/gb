<?php

	require 'connect.php';
	
	$database = new connect();
	
	
	$hasid = htmlspecialchars($_POST['Booking_ID']);
	$username = htmlspecialchars($_POST['username']);
	$from = htmlspecialchars($_POST['from_Address']);
	$to = htmlspecialchars($_POST['to_Address']);
	$travel = htmlspecialchars($_POST['Travel_Date_Time']);
	$shipmentType = htmlspecialchars($_POST['Shipment_Type']);
	$shipmentWeight  = htmlspecialchars($_POST['Shipment_weight']);
	$numPackage = htmlspecialchars($_POST['Num_package']);
	$vehicleCapacity = htmlspecialchars($_POST['Vehicle_Capacity']);
	$deliveryType = htmlspecialchars($_POST['Delivery_Type']);
	$email = htmlspecialchars($_POST['Email']);
	$mobile = htmlspecialchars($_POST['usrtel']);
	$distance = htmlspecialchars($_POST['distance']);
	$travelData= htmlspecialchars($_POST['travel_data']);
	$spCode = htmlspecialchars($_POST['Service_Provider_code']);
	$status = htmlspecialchars($_POST['status']);
	$reference = htmlspecialchars($_POST['reference']);
	$track_reference = htmlspecialchars($_POST['track_reference']);
	
	
	$query = "UPDATE goodscab_Booking SET  service_provider_code='$spCode',status='$status',reference='$reference',track_reference='$track_reference' WHERE hashid='$hasid' ";
	
	$resultQuery = mysql_query($query);
	
	if($resultQuery == 1){
		header("Location:AdminBookingEdit.php?id=$hasid&msg1=Booking information is updated successfully.");
	}else{
		header("Location:AdminBookingEdit.php?id=$hasid&msg= Update Unsucessfull");
	}

	
	

?>