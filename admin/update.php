<?php
	
		session_start();
		
		require 'connect.php';
		
		$database = new connect();
		

										if(! get_magic_quotes_gpc() )
										{
										   $Salutation = addslashes ($_POST['Salutation']);
										   $first_name = addslashes ($_POST['first_name']);
										   $last_name = addslashes ($_POST['last_name']);
										   $address = addslashes ($_POST['address']);
										   $username= addslashes ($_POST['username']);
										   
										}
										else
										{
										   $Salutation = $_POST['Salutation'];
										   $first_name = $_POST['first_name'];
										   $last_name= $_POST['	last_name'];
										   $address= $_POST['address'];
										   $username= $_POST['username'];
										  
										}
										$date_of_birth = $_POST['date_of_birth'];
										$pancard_number=$_POST['pancard_number'];
										$password = md5($_POST['password']);
										$Employee_ID = $_POST['Employee_ID'];
 $photo = rand(1000,100000)."-".$_FILES['photo']['name'];
    $photo_loc = $_FILES['photo']['tmp_name'];
 $photo_size = $_FILES['photo']['size'];
 $photo_type = $_FILES['photo']['type'];
 $folder="uploads/";
 
 // new file size in KB
 $new_size_photo = $photo_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_photo_name = strtolower($photo);
 // make file name in lower case
 
 $final_photo=str_replace(' ','-',$new_photo_name);
  $attachments = rand(1000,100000)."-".$_FILES['attachments']['name'];
    $attachments_loc = $_FILES['attachments']['tmp_name'];
 $attachments_size = $_FILES['attachments']['size'];
 $attachments_type = $_FILES['attachments']['type'];
 
 // new file size in KB
 $new_size_attachments= $attachments_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_attachments_name = strtolower($attachments);
 // make file name in lower case
 
 $final_attachments=str_replace(' ','-',$new_attachments_name);
 
 if((move_uploaded_file($photo_loc,$folder.$final_photo))&&(move_uploaded_file($attachments_loc,$folder.$final_attachments)))
 {
 

 	$sql = "UPDATE employee_record SET Salutation='$Salutation',first_name='$first_name',last_name='$last_name',date_of_birth='$date_of_birth',pancard_number='$pancard_number',address='$address',username='$username',password='$password',photo ='$folder$final_photo',photo_type='$photo_type',photo_size='$new_size_photo',attachments='$folder$final_attachments', attachments_type='$attachments_type',attachments_size='$new_size_attachments' WHERE Employee_ID='$Employee_ID'";
											
																						
											$retval = mysql_query( $sql);
											
											if($retval == 1){
												header("Location:Admin_Employee_Records_Edit.php?success");
											}else{
												header("Location:Admin_Employee_Records_Edit.php?fail");
											}
											
										
 }else{
 	header("Location:Admin_Employee_Records_Edit.php?fail");
 }




?>