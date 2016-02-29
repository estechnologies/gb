<?php

	require 'connect.php';
	
	$database = new connect();
	
	
	$servicetype = htmlspecialchars($_POST['service_type']);
	$DeliveryType = htmlspecialchars($_POST['Delivery_Type']);
	$spCode = htmlspecialchars($_POST['service_provider_code']);
	$spName = htmlspecialchars($_POST['service_provider_name']);
	$contactAddress = htmlspecialchars($_POST['Contact_address']);
	$contactPerson = htmlspecialchars($_POST['contact_person']);
	$email = htmlspecialchars($_POST['Email']);
	$usrtel = htmlspecialchars($_POST['usrtel']);
	$baseLocation = htmlspecialchars($_POST['base_location']);
	$baseLocationAddress = htmlspecialchars($_POST['base_location_address']);
	$baselocationContactPerson = htmlspecialchars($_POST['base_location_contact_person']);
	$baselocationEmail = htmlspecialchars($_POST['base_location_email_id']);
	$baseLocationNumber = htmlspecialchars($_POST['base_location_contact_number']);
	$basePrice = htmlspecialchars($_POST['base_price']);
	$freekM = htmlspecialchars($_POST['free_km']);
	$freekg = htmlspecialchars($_POST['free_kg']);
	$priceKm = htmlspecialchars($_POST['price_km']);
	$priceKg = htmlspecialchars($_POST['price_kg']);
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$rpassword = htmlspecialchars($_POST['rpassword']);
	
	
	$checkQuery = "SELECT * FROM service_providers WHERE service_username='$username'";
	$resultCheckQuery = mysql_query($checkQuery);
	
	
	
	if(empty($email)){
		header("Location:Admin_Service_Providers_Add.php?msg=email can`t be empty");
	}else if(empty($password) && empty($rpassword)){
		header("Location:Admin_Service_Providers_Add.php?msg=passwords can`t be empty");
	}else if ($checkNums != 0){
		header("Location:Admin_Service_Providers_Add.php?msg=email already registered");
		
	}else if($password != $rpassword){
		header("Location:Admin_Service_Providers_Add.php?msg=password & repeat-password must be same");
	}else{
		
		if (mysql_num_rows($resultCheckQuery) <= 0){
		
		
			$password = md5($password);
			$query = "INSERT INTO service_providers(service_username,service_type,delivery_type,service_provider_code,service_provider_name,Contact_address,contact_person,contact_number,email_id,base_location,base_location_address,base_location_contact_person,base_location_contact_number,base_location_email_id,base_price,price_km,price_kg,service_password,free_km,free_kg)VALUES(";
			$query .= "'$username','$servicetype','$DeliveryType','$spCode','$spName','$contactAddress','$contactPerson','$usrtel','$email','$baseLocation','$baseLocationAddress','$baselocationContactPerson','$baseLocationNumber','$baselocationEmail','$basePrice','$priceKm','$priceKg','$password','$priceKm','$freekg')";
			
			
			$resultQuery = mysql_query($query);
			$id = mysql_insert_id();
			
			
			if($resultQuery == 1){
				header("Location:Admin_Service_Providers_Add.php?msg1=Service Provider has been added successfully. Service provider id is $id.");
			}else{
				header("Location:Admin_Service_Providers_Add.php?msg=Service Provider has been added Failed.");
			}
		}else{
			header("Location:Admin_Service_Providers_Add.php?msg=Username Already taken.");
		}
	}
	
	
?>