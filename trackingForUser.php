<?php



    

if ((function_exists('session_status')
		&& session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
			session_start();
		}
    
    // Check, if username session is NOT set then this page will jump to login page
    if (!isset($_SESSION['id']['username'])) {
        header('Location:index.php');
    }

    $personName = $_SESSION['id']['username'];
    $personMail  =$_SESSION['id']['email']; 
    
  



	require 'connect.php';
	
	
	$database = new connect();
	
	$bookingId = htmlspecialchars($_POST['Bookingnumber']);
	
	
	$query = "SELECT * FROM goodscab_Booking WHERE hashid ='$bookingId' AND Email='$personMail'";
	$resultQuery = mysql_query($query);
	
	
	

	if(mysql_num_rows($resultQuery) == 1){
		while ($row = mysql_fetch_array($resultQuery)){
			$status = $row['status'];
			$track_reference= $row['track_reference'];
		}
		
		header("Location:trackingStatus.php?msg=Entered Booking id  $bookingId is found in our records.<br> Your Booking id Status is $status");
	}else{
	
		header("Location:trackingStatus.php?msg1=Booking id is not found in our records.");
	}

?>