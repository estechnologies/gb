<?php


	require 'connect.php';
	
	$database = new connect();
	
	$name = htmlspecialchars($_POST['name']);
	$pass =  htmlspecialchars($_POST['pass']);
	
	
	$pass = md5($pass);
	$query = "SELECT * FROM service_providers WHERE service_username='$name' AND service_password='$pass'";
	$resultQuery = mysql_query($query);
	
	if(mysql_num_rows($resultQuery) != 0){
		
		while($rows = mysql_fetch_array($resultQuery)){
			$json = "{";
			$json .= "\"provider\":{service_id:".$rows['service_id'].",service_username:".$rows['service_username'].",service_type:".$rows['service_type'].",";
			$json .= "service_provider_code:".$rows['service_provider_code'].",service_provider_name:".$rows['service_provider_name'].",Contact_address:".$rows['Contact_address'].",";
			$json .= "contact_person:".$rows['contact_person'].",contact_number:".$rows['contact_number'].",email_id:".$rows['email_id'].",base_location:".$rows['base_location'].",";
			$json .= "base_location_address:".$rows['base_location_address'].",base_location_contact_person:".$rows['base_location_contact_person'].",base_location_contact_number:".$rows['base_location_contact_number'].",";
			$json .="base_location_email_id:".$rows['base_location_email_id'].",vehicle_type:".$rows['vehicle_type'].",service_provided_in:".$rows['service_provided_in'].",base_price:".$rows['base_price'].",price_km:".$rows['price_km'].",";
			$json .= "price_kg:".$rows['price_kg'].",service_password:".$rows['service_password']."} }";
			
			$json2 = "{";
			$json2 .= "\"provider\":{service_id:".$rows['service_id'].",service_username:".$rows['service_username'].",service_provider_code:".$rows['service_provider_code'].",service_provider_name:".$rows['service_provider_name']."}}";
		}
		
		header("Content-Type:application/json");
		echo $json2;
		
	}else{
		echo "Invalid username & password";
	}

?>