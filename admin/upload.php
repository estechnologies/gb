<?php


		require 'connect.php';
		
		$database = new connect();
		
		$error = "";
		
		
		
		// post variables
		
		$Salutation = htmlspecialchars($_POST['Salutation']);
		$first_name = htmlspecialchars($_POST['first_name']);
		$last_name = htmlspecialchars($_POST['last_name']);
		$address = htmlspecialchars($_POST['address']);
		$username= htmlspecialchars($_POST['username']);
		$date_of_birth = $_POST['date_of_birth'];
		$pancard_number=$_POST['pancard_number'];
		$password = $_POST['password'];
		$rpassword = $_POST['rpassword'];
		$email = htmlspecialchars($_POST['Email']);
		$mobile = htmlspecialchars($_POST['usrtel']);
		$gbEmail = htmlspecialchars($_POST['Goodscab_email_id']);
		
		
		/*
		 * access
		 */
		$shipmentbookingsAccess = getPermissions($_POST['ShipmentBookings']);
		$packagingSolutionAccess = getPermissions($_POST['PackingSolution']);
		$cargoInsuranceAccess = getPermissions($_POST['CargoInsurance']);
		$documentationAccess = getPermissions($_POST['Documentation']);
		$createBookingAccess = getPermissions($_POST['CreateBooking']);
		$editBookingAccess = getPermissions($_POST['ViewEditBooking']);
		$mtoBookingAccess = getPermissions($_POST['MTOBooking']);
		$mtoPricingAccess = getPermissions($_POST['MTOPricing']);
		$mtsProductsAccess = getPermissions($_POST['MTSProducts']);
		$mtsBookingsAccess = getPermissions($_POST['MTSBookings']);
		$mtoCreateBookingAccess = getPermissions($_POST['CreateMTOBooking']);
		$mtoEditBookingAccess = getPermissions($_POST['ViewEditMTOBooking']);
		$mtoPricingCreateAccess  = getPermissions($_POST['CreateMTOPricing']);
		$mtoPricingEditAccess = getPermissions($_POST['ViewMTOPricing']);
		$mtsProductCreateAccess = getPermissions($_POST['CreateMTSProduct']);
		$mtsProductEditAccess = getPermissions($_POST['ViewEditMTSProduct']);
		$mtsBookingCreateAccess = getPermissions($_POST['CreateMTSBookings']);
		$mtsBookingEditAccess = getPermissions($_POST['ViewEditMTSBookings']);
		
		
		
		
		
		$checkQuery = "SELECT * FROM employee_record WHERE username='$username'";
		$resultCheckQuery = mysql_query($checkQuery);
		
		/*
		 * photo upload
		 */
		function photoUpload(){
			$folder = "uploads/";
			$photo = $_FILES['photo']['name'];
			
			$photo_loc = $_FILES['photo']['tmp_name'];
			$ext = pathinfo($photo, PATHINFO_EXTENSION);
			if($ext == 'png' or $ext == 'jpeg' or $ext == 'jpg' or $ext == 'gif' or $ext == 'tiff'){
				$photo2 = rand(1000,10000)."-".$photo;
				$newPhoto = strtolower($photo2);
				$finalPhoto = str_replace('', '-', $newPhoto);
				
					if(move_uploaded_file($photo_loc,$folder.$finalPhoto)){
						return  $folder.$finalPhoto;
					}else{
						
						$error .= "photo not uploaded";
						return '';
					}
				
			}else{
				
				$error .= "photo format must be \"png,jpeg,jpg,gif,tiff\"";
				return '';
			}
		}
		
		
		/*
		 * upload attachments
		 */
		function attachments(){
			$folder = "uploads/";
			$attach = rand(100,1000000)."-".$_FILES['attachments']['name'];
			$attachLoc = $_FILES['attachments']['tmp_name'];
			$newAttachment = strtolower($attach);
			$finalAttachment = str_replace('', '-', $newAttachment);
			if(move_uploaded_file($attachLoc, $folder.$finalAttachment)){
				return $folder.$finalAttachment;
			}else{
				return '';
			}
		}
		
		
		/*
		 * get Permissions
		 */
		function getPermissions($permission){
			if(empty($permission)){
				return 0;
			}else{
				return 1;
			}
		}
		
		
		
		/*
		 * checking and insertion
		 */
		
		if($password == $rpassword){
		
			$mysqlPhoto = photoUpload();
			$mysqlAttachments = attachments();
		
			
			/*
			 * checking photo not empty
			 */
			if(mysql_num_rows($resultCheckQuery) <= 0){
			if($mysqlPhoto != ''){
				
				$password = md5($password);
				$query = "INSERT INTO employee_record(Salutation,first_name,last_name,date_of_birth,pancard_number,address,photo,username,password,attachments,email,mobile,gemail,shipmentbookingAccess,packagingsolutionAccess,cargoInsuranceAccess,documentationAccess,createBookingAccess,viewEditBookingAccess,mtobookingAccess,mtopricingAccess,mtsproductsAccess,mtsbookingsAccess,mtocreatebookingAccess,mtobookingeditAccess,mtopricingcreateAccess,mtopricingEditAccess,mtsproductcreateAccess,mtsproducteditAccess,mtsbookingcreateAccess,mtsbookingeditAccess)VALUES('$Salutation','$first_name','$last_name','$date_of_birth','$pancard_number','$address','$mysqlPhoto','$username','$password','$mysqlAttachments','$email','$mobile','$gbEmail','$shipmentbookingsAccess','$packagingSolutionAccess','$cargoInsuranceAccess','$documentationAccess','$createBookingAccess','$editBookingAccess','$mtoBookingAccess','$mtoPricingAccess','$mtsProductsAccess','$mtsBookingsAccess','$mtoCreateBookingAccess','$mtoEditBookingAccess','$mtoPricingCreateAccess','$mtoPricingEditAccess','$mtsProductCreateAccess','$mtsProductEditAccess','$mtsBookingCreateAccess','$mtsBookingEditAccess')";
				
				$resultQuery = mysql_query($query);
				$empId = mysql_insert_id();
				/*
				 * querying
				 */
				if($resultQuery == 1){
					
					header("Location:Admin_Employee_Records_Add.php?msg1=Employee information has been added successfully. Employee id is $empId.");
				}else{
					header("Location:Admin_Employee_Records_Add.php?msg=insert Unsuccessfull");				
				}

				
			}else{
				header("Location:Admin_Employee_Records_Add.php?msg=$error");
			}
			
			
			}else{
				header("Location:Admin_Employee_Records_Add.php?msg=username already exists on another id");
			}
		}else{
			header("Location:Admin_Employee_Records_Add.php?msg=Passwords must same");
		}

?>