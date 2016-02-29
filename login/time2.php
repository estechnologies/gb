<?php


	$travelTime = htmlspecialchars($_POST['Travel_Date_Time']);
	
	
	$now = new DateTime(null,new DateTimeZone('Asia/Kolkata'));
	$now->modify('+2 hours');
	
	$bookedTime = new DateTime($travelTime);
	
	if($now->format('Y-m-d H:i:s') > $bookedTime->format('Y-m-d H:i:s')){
		echo "Pickup Date and Time should be at least 2 hours from the current time";
	}else{
		echo "";
	}

?>