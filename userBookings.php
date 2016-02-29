<?php
		// registering the new booking
		require 'connect.php';
		require 'PHPMailer-master/PHPMailerAutoload.php';
		
		$database = new connect();
	
		//checking the magical quotes(') is present or not
		if(! get_magic_quotes_gpc() )
		{
			$from_Address = addslashes ($_POST['from_Address']);
			$to_Address = addslashes ($_POST['to_Address']);
			$Marterial_Description = addslashes ($_POST['Marterial_Description']);
			$Shipment_weight = addslashes ($_POST['Shipment_weight']);
			$Email = addslashes ($_POST['Email']);
		}
		else
		{
			$from_Address = $_POST['from_Address'];
			$to_Address = $_POST['to_Address'];
			$Marterial_Description = $_POST['Marterial_Description'];
			$Shipment_weight = $_POST['Shipment_weight'];
			$Email = $_POST['Email'];
		}
		$username = $_POST['username'];
		$Shipment_Type = $_POST['Shipment_Type'];
		$Delivery_Type = $_POST['Delivery_Type'];
		$Travel_Date_Time = $_POST['Travel_Date_Time'];
		$Num_package = $_POST['Num_package'];
		$usrtel = $_POST['usrtel'];
		$distance = $_POST['distance'];
		$travel_data = $_POST['travel_data'];
		$Vehicle_Capacity = $_POST['Vehicle_Capacity'];
		$name = $_POST['username'];
		
		
		
		/*
		 * time checking created  time + 2hours to booking time
		 */
		
		//getCurrent
		$now = new DateTime(null,new DateTimeZone('Asia/Kolkata'));
		$now->modify('+2 hours');
		
		//$tempTime = '2016-01-13 18:35:44';
		$bookedTime = new DateTime($Travel_Date_Time);
		
		
		if($now->format('Y-m-d H:i:s') < $bookedTime->format('Y-m-d H:i:s')){
				$timeOk = true;
		}else{
			$timeOk = false;
		}
		
		
		
		
		//Insert goodscab_Booking into database name goodscab
		if(courierCheck(intval($Shipment_weight), $Shipment_Type) == true){ 
				if($timeOk){
						$sql = "INSERT INTO goodscab_Booking ".
								"(username,from_Address,to_Address,booking_time,Travel_Date_Time,Marterial_Description,Shipment_weight,Num_package,Delivery_Type,Shipment_Type,Email,usrtel,distance,travel_data,Vehicle_Capacity,type,status) ".
								"VALUES ".
								"('$name','$from_Address','$to_Address',NOW(),'$Travel_Date_Time','$Marterial_Description','$Shipment_weight','$Num_package','$Delivery_Type','$Shipment_Type','$Email','$usrtel','$distance','$travel_data','$Vehicle_Capacity','order','Confirmation Pending')";
						
						$result = $database->insertDatabase($sql);
						$id = $id = mysql_insert_id();
						if( $result == true){
						
							$hashId = userBookingId($id);
						
						$hashQuery = "UPDATE goodscab_Booking SET hashid='$hashId' WHERE Booking_ID='$id'";
						$hashResult = mysql_query($hashQuery);
						
						
						
							sendUserMail($Email, $hashId);
							header("Location:userDashBoard.php?msg1=Your Booking has been Successful. Your Booking id is $hashId.<br>Our Support Team will contact you shortly");
						}else{
							header("Location:userDashBoard.php?msg=booing failed please contact goodscab");
						}
			}else{
			
				header("Location:userDashBoard.php?msg=Pickup Date and Time should be at least 2 hours from the current time");
			}
				
		}else{
			header("Location:userDashBoard.php?msg=Shipment weight should be greater than zero");
		}
		
		
		/*
		 * checks the shipment_weight and type
		 */
		function courierCheck($Shipment_weight, $Shipment_type){
			
			
			if(checkShipmentType($Shipment_type) || checkShipmentWeight($Shipment_weight) ){
			
				return  true;
			}else {
				return false;
			}
		}
		
		/*
		 * checks the shipmenttype
		 */
		function  checkShipmentType($Shipment_type){
			
			if($Shipment_type == "Courier"){
				return true;
			}else{
				return  false;
			}
		}
		
		/*
		 * checks shipment weight
		 */
		 function checkShipmentWeight($shipementWeight){
			
			if($shipementWeight > 0){
				return  true;
			}else{
				return  false;
			}
		}
		
		
		/*
		 * user booking number
		 */
		function userBookingId($userBookingNo){
			$userBookingNo = strval($userBookingNo);
				
			$length = strlen($userBookingNo);
				
				
			switch ($length){
				case 1:
					return "GC00000".trim($userBookingNo);
					break;
				case 2:
					return "GC0000".trim($userBookingNo);
					break;
				case 3:
						
					return "GC000".trim($userBookingNo);
					break;
				case 4:
					return "GC00".trim($userBookingNo);
					break;
				case 5:
					return "GC0".trim($userBookingNo);
					break;
				default:
					return "GC".trim($userBookingNo);
					break;
			}
		}
		
		
		
		
		/*
		 * booking id sends to user email
		 */
		function sendUserMail($email, $bookingId){
			
			
			$body = nl2br("GoodsCab,\n
					Your Booking successfully placed on GoodsCab.\n
					Your Booking Id : $bookingId\n
					We will Shortly contact you\n
					Thank you");
				
			
			/*
			 *	mail function
			*/
			$mail = new PHPMailer;
			
			//$mail->SMTPDebug = 3;                               // Enable verbose debug output
			
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'mail.goodscab.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'bookings@goodscab.com';                 // SMTP username
			$mail->Password = 'Gbhnqw@#$964';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 25;                                    // TCP port to connect to
			
			$mail->setFrom('bookings@goodscab.com', 'goodscab');
			$mail->addAddress($email);     // Add a recipient
			$mail->addAddress('');               // Name is optional
			$mail->addReplyTo('', '');
			$mail->addCC('');
			$mail->addBCC('');
			
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML
			
			//header & body
			$mail->Subject = 'goodscab Booking';
			$mail->Body    = $body;
			$mail->AltBody = "Goodscab\n Booking Success.\n Booking Id: $bookingId";
			
			// mail checking
			if(!$mail->send()) {
				$error = $mail->ErrorInfo;
				header("Location:userDashBoard.php?msg=".$error);
					
			}
			
			
		}
		
?>