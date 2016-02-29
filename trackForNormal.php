<?php

	require 'connect.php';
	
	
	$database = new connect();
	
	$bookingId = htmlspecialchars($_POST['Bookingnumber']);
	
	
	$query = "SELECT * FROM goodscab_Booking WHERE hashid ='$bookingId'";
	$resultQuery = mysql_query($query);
	
	
	

	if(mysql_num_rows($resultQuery) == 1){
		while ($row = mysql_fetch_array($resultQuery)){
			$status = $row['status'];
			$track_reference= $row['track_reference'];
		}
		
		header("Location:trackingNormal.php?msg=Entered Booking id  $bookingId is found in our records.<br> Your Booking id Status is $status");
	}else{
	
		header("Location:trackingNormal.php?msg1=Booking id is not found in our records.");
	}

?>