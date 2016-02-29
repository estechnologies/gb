<?php 

	require 'connect.php';
	$database = new connect();
		
		$error = "";

		$Salutation = htmlspecialchars ($_POST['Salutation']);
		$first_name = htmlspecialchars ($_POST['first_name']);
		$last_name = htmlspecialchars ($_POST['last_name']);
		$address = htmlspecialchars ($_POST['address']);
		$username= htmlspecialchars ($_POST['username']);
		$date_of_birth = $_POST['date_of_birth'];
		$pancard_number=$_POST['pancard_number'];
		$password = $_POST['password'];
		$rpassword = $_POST['rpassword'];
		$email = htmlspecialchars($_POST['Email']);
		$mobile = htmlspecialchars($_POST['usrtel']);
		$gbEmail = htmlspecialchars($_POST['Goodscab_email_id']);
		$empId = htmlspecialchars($_POST['empid']);
		
		
		
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
		
		
		
		
		$usernameCheck = "SELECT * FROM employee_record WHERE username='$username' AND NOT(Employee_ID='$empId')";
		$resultUserNameQuery = mysql_query($usernameCheck);
		
		
		/*
		 * photo upload
		 */
		function photoUpload($oldPhotName){
			$folder = "uploads/";
			$photo = $_FILES['photo']['name'];
			if(!empty($photo)){	
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
						return $oldPhotName;
					}
			
				}else{
			
					$error .= "photo format must be \"png,jpeg,jpg,gif,tiff\"";
					return $oldPhotName;
				}
			}else{
				return $oldPhotName;
			}
		}
		
		
		

		/*
		 * upload attachments
		 */
		function attachments($oldAttachment){
			$folder = "uploads/";
			$checkAttach = $_FILES['attachments']['name'];
			if(!empty($checkAttach)){
					$attach = rand(100,1000000)."-".$checkAttach;
					
					$attachLoc = $_FILES['attachments']['tmp_name'];
					$newAttachment = strtolower($attach);
					$finalAttachment = str_replace('', '-', $newAttachment);
					if(move_uploaded_file($attachLoc, $folder.$finalAttachment)){
						return $folder.$finalAttachment;
					}else{
						return $oldAttachment;
					}
			}else{
				return $oldAttachment;
			}
		}
		
		
		
		/*
		 * checks String if strings empty or null it return empty string
		 */
		
		
		function checkString($string){
			if(empty($string) or $string == ''){
				return '';
			}else{
				$string;
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
		
		if($password == $rpassword){
			$password = md5($password);
			$checkingQuery  = "SELECT * FROM employee_record WHERE Employee_ID='$empId'";
			$resultQuery = mysql_query($checkingQuery);
			
			
			if(mysql_num_rows($resultUserNameQuery) <= 0){
					if(mysql_num_rows($resultQuery) != 0){
						$row = mysql_fetch_array($resultQuery);
						$oldPhoto = checkString($row['photo']);
						$newPhoto = photoUpload($oldPhoto);
						$oldAttach = checkString($row['attachments']);
						$newAttach = attachments($oldAttach);
						
						$query = "UPDATE employee_record SET ";
						$query .= "Salutation ='$Salutation',";
						$query .="first_name='$first_name',";
						$query .="last_name='$last_name',";
						$query .= "date_of_birth ='$date_of_birth',";
						$query .= "pancard_number='$pancard_number',";
						$query .= "address='$address',";
						$query .= "photo='$newPhoto',";
						$query .="username='$username',";
						$query .= "password='$password',";
						$query .= "attachments='$newAttach',";
						$query .= "email='$email',";
						$query .= "mobile='$mobile',";
						$query .= "gemail='$gbEmail',";
						
						$query .= "shipmentbookingAccess='$shipmentbookingsAccess',";
						$query .= "packagingsolutionAccess='$packagingSolutionAccess',";
						$query .= "cargoInsuranceAccess='$cargoInsuranceAccess',";
						$query .= "documentationAccess='$documentationAccess',";
						$query .= "createBookingAccess='$createBookingAccess',";
						$query .= "viewEditBookingAccess='$editBookingAccess',";
						$query .= "mtobookingAccess='$mtoBookingAccess',";
						$query .= "mtopricingAccess='$mtoPricingAccess',";
						$query .= "mtsproductsAccess='$mtsProductsAccess',";
						$query .= "mtsbookingsAccess='$mtsBookingsAccess',";
						$query .= "mtocreatebookingAccess='$mtoCreateBookingAccess',";
						$query .= "mtobookingeditAccess='$mtoEditBookingAccess',";
						$query .= "mtopricingcreateAccess='$mtoPricingCreateAccess',";
						$query .= "mtopricingEditAccess='$mtoPricingEditAccess',";
						$query .= "mtsproductcreateAccess='$mtsProductCreateAccess',";
						$query .= "mtsproducteditAccess='$mtsProductEditAccess',";
						$query .= "mtsbookingcreateAccess='$mtsBookingCreateAccess',";
						$query .= "mtsbookingeditAccess='$mtsBookingEditAccess' WHERE Employee_ID='$empId'";
						
						//echo $query;
						$updateResultQuery = mysql_query($query);
						//$updateResultQuery;
						
						if($updateResultQuery == 1){
							header("Location:Admin_Employee_Records_Edit.php?id=$empId&msg1=Employee information is updated successfully.");
						}else{
							header("Location:Admin_Employee_Records_Edit.php?id=$empId&msg=Employee Update Failed,$error");
						}
						
						
					}else{
						header("Location:Admin_Employee_Records_Edit.php?id=$empId&msg=no id found");
					}
			}else{
				header("Location:Admin_Employee_Records_Edit.php?id=$empId&msg=already username exists on another id");
			}
			
		}else{
				header("Location:Admin_Employee_Records_Edit.php?id=$empId&msg=passwords must same");
		}
		

?>