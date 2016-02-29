<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if(!isset($_SESSION['admin']['username'])){
		header("Location:index.php");
	}
	
	
	if(isset($_GET['id'])){
		
		require 'connect.php';
		$orderId = htmlspecialchars($_GET['id']);
		 
		$database = new connect();
		
		$search = "SELECT * FROM goodscab_Booking WHERE hashid='$orderId'";
		$results = mysql_query($search);
		
		if(mysql_num_rows($results) <= 0){
			echo "<script>alert('empty order');</script>";
		}else{
			$row = mysql_fetch_array($results);
		}
		
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Edit Booking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/images/goodscab.ico" type="image/x-icon" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Custom CSS -->
   <link href="css/style.css" rel="stylesheet">
   <link href="css/index.css" rel="stylesheet">
    <style>
    a{color:black;}
    </style>
	
</head>
<body >

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	  <img  id="logo"  src="images/goodscab_logo.png">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      </ul>
  <ul class="nav navbar-nav navbar-right">
   <li style="margin-right:20px;margin-top:10px;"><a href="admin.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		 <li style="margin-right:20px;margin-top:10px;"><a href="logout.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
       
      </ul>
    </div>
  </div>
</nav>
	<div class="main"  >
	<div class="container" style="margin-top: 100px;color:black;margin-bottom: 120px;">
	<form role="form"  id="calculate-route" method="post" name="calculate-route" action="adminBookingEditBack.php">
<div class="col-md-6">
    <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>Edit Booking</strong></h3>
      
  </div> </center> 
  
  <div class="panel-body">
   
  <center><?php 
	


	

		if(isset($_GET['msg'])){
			
			$msg = $_GET['msg'];
			$httphost = $_SERVER['HTTP_HOST'];
			$link = "http://$httphost/"."popup.php?msg=$msg";
			//echo "<script>window.open('$link','popup','width=400,height=200,scrollbar=yes' );</script>";
			//echo "<script>window.open('$link')</script>";
			?>
			<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <center class="message"> <label style="font-size: 14px;color:Red;"><?php echo $msg;?></label></center> 
  </div>
		 <?php	
		}?></center>
		 <center><?php 
		

		if(isset($_GET['msg1'])){
			
			$msg1 = $_GET['msg1'];
			$httphost = $_SERVER['HTTP_HOST'];
			$link = "http://$httphost/"."popup.php?msg=$msg";
			//echo "<script>window.open('$link','popup','width=400,height=200,scrollbar=yes' );</script>";
			//echo "<script>window.open('$link')</script>";
			?>
		<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <center class="message"> <label style="font-size: 14px;color:green;"><?php echo $msg1;?></label></center>
  </div>
		 <?php	
		}?></center>
		 <label for="bookingid">Booking ID*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                        <input name="username" value="username" type="hidden" />
                                        <input  type="text" id="Booking_ID" name="Booking_ID" required="required" readonly placeholder="Enter Booking ID" value="<?php echo $row['hashid'];?>" class="form-control" />
                                        </div>
              
			 <label for="Pickup Address">Pickup Address*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                        <input  type="text" id="from" name="from_Address" required="required" readonly placeholder="Enter pickup address" value="<?php echo $row['from_Address'];?>" class="form-control" />
                                        
                                    </div>
 <label for="Delivery Address">Delivery Address*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                        <input maxlength="100" type="text" id="to" name="to_Address" required="required" readonly placeholder="Enter delivery address"  value="<?php echo $row['to_Address'];?>"class="form-control"/>
                                    </div>
                                     <center> <p style="color:red" id="datetimemsg"></p></center>
                                    <label for="Pickup Date & Time">Pickup Date & Time*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        <div class="input-append date form_datetime" >
							<input size="16" required="required" readonly class="form-control" id="datetime" name="Travel_Date_Time" placeholder="Select pickup date and time" value="<?php echo $row['Travel_Date_Time'];?>"type="text" >
								<span class="add-on"><i class="icon-remove"></i></span>
								<span class="add-on"><i class="icon-calendar"></i></span>
							</div>
                                    </div>
 <label for="Shipment Type">Shipment Type*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><img src="images/package.png"></img></span>
                                        <input id="Shipment_Type" required="required" readonly name="Shipment_Type" placeholder="Select shipment type"  value="<?php echo $row['Shipment_Type'];?>" class="form-control">
							</input>
                                    </div>
                                   
                                    <label for="Shipment Weight">Shipment Weight (in kg’s)*</label>
  <div style="margin-bottom: 12px" id="shipsment" class="input-group">
									 
                                        <span class="input-group-addon"><img src="images/shipmentwg.png"></img></span>
                                        <input  type="text"   id="Shipment_weight" readonly  maxlength="5" onfocusout="shipmentweightzero()"  placeholder="Enter shipment weight" name="Shipment_weight" value="<?php echo $row['Shipment_weight'];?>"class="form-control" />
                                      </div> 
 <label for="No. of Packages">No. of Packages*</label>
                            <div style="margin-bottom: 12px" id="packsage" class="input-group">
                                        <span class="input-group-addon"><img src="images/package.png"></img></span>
                                       <input type="text" maxlength="4" name="Num_package" readonly  onfocusout="packingsnumberszero()" id="Num_package" class="form-control" value="<?php echo $row['Num_package'];?>"  placeholder="Enter packages" />
                                   
                                    </div>
                                    <label for="Vehicle Capacity">Vehicle Capacity*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><img src="images/vcapacity.png"></img></span>
                                        <input id="Vehicle_Capacity"  name="Vehicle_Capacity" readonly class="form-control" placeholder="Select Vehicle Capacity" value="<?php echo $row['Vehicle_Capacity'];?>" ></input>
							
                                    </div>
                                    <div style="display:none">
 <label for="Delivery Type">Delivery Type*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                        <select id="Delivery_Type"  name="Delivery_Type" readonly class="form-control" value="<?php echo $row['Delivery_Type'];?>">
								<option value="" disabled selected hidden></option>
								<option style="color:black;"value="Regular">Regular</option>
								<option style="color:black;" value="Express">Express</option>
							</select>
                                    </div>
                                    </div>
                                    <label for="Email Address">Email Address*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                       <input type="email" maxlength="50" min="1" required="required" readonly  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninvalid="InvalidMsgEmail(this);"  oninput="InvalidMsgEmail(this); " name="Email" id="Email"class="form-control" value="<?php echo $row['Email'];?>"  placeholder="Enter email address" />
                                        
                                    </div>
 <label for="Mobile Number">Mobile Number*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                        <input type="text"  oninvalid="InvalidMsg(this);" maxlength="10" readonly oninput="InvalidMsg(this);" pattern="[0-9]{10}"  required="required" name="usrtel" id="usrtel" class="form-control" value="<?php echo $row['usrtel'];?>" placeholder="Enter mobile number" />                                    </div>
                                        <label for="Distance">Distance*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><img src="images/distance.png"></img></span>
                                      <input  type="text"  readonly id="distance" readonly placeholder="Distance" name="distance" value="<?php echo $row['distance'];?>"class="form-control" />
                                        
                                    </div>
 <label for="travel time">Travel Time*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><img src="images/traveltime.png"></img></span>
                                       <input  type="text"   readonly id="travel_data" readonly placeholder="Travel Time" name="travel_data" value="<?php echo $row['travel_data'];?>"class="form-control" />
                                  </div>
                                         <label for="ServiceProvidercode">Service Provider code</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                         <span class="input-group-addon"><img src="images/Serviceprovider.png"></img></span>
                                       <input  type="text"  id="Service_Provider_code" value="<?php echo $row['service_provider_code'];?>" placeholder="Enter service provider code" maxlength="10" name="Service_Provider_code" class="form-control" />
                                  </div>
                                  <label for="Status">Status*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                       <span class="input-group-addon"><img src="images/status.png"></img></span>
                                       <!-- status selected -->
                                       <?php 
                                       			
                                       			$status = $row['status'];
                                       ?>
                                       
                                        <select id="status" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); "  name="status"  class="form-control" >
								
								<option value=""  hidden>Select Status</option>
								<option style="color:black;" <?php if($status == 'Confirmation Pending'){echo  'selected';}?> value="Confirmation Pending">Confirmation Pending</option>
								<option style="color:black;" <?php if($status == 'Under Negotiations'){echo  'selected';}?>  value="Under Negotiations">Under Negotiations</option>
								<option style="color:black;"<?php if($status == 'Confirmed'){echo  'selected';}?> value="Confirmed">Confirmed</option>
								<option style="color:black;" <?php if($status == 'Under Execution'){echo  'selected';}?> value="Under Execution">Under Execution</option>
								<option style="color:black;"<?php if($status == 'Completed'){echo  'selected';}?> value="Completed">Completed</option>
								<option style="color:black;"<?php if($status == 'Cancelled'){echo  'selected';}?> value="Cancelled">Cancelled</option>
							</select>
                                    </div>
                                      <label for="References">References*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><img src="images/Reference.png"></img></span>
                                       <input  type="text"  id="References" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); " placeholder="Enter references" maxlength="100" name="reference"  value="<?php echo $row['reference'];?>" class="form-control" />
                                  </div>
                                    <label for="Track Reference">Track Reference*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><img src="images/Reference.png"></img></span>
                                       <input  type="text"  id="TrackReference" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); " placeholder="Enter track references or comments" maxlength="100" name="track_reference" value="<?php echo $row['track_reference'];?>"class="form-control" />
                                  </div>
                                    <center><button  type="submit" name="submit" id="submit" class="btn btn-default">Update</button></center>
                                  
                                    </div>
                                    
  
  

  </div>
</div>
	</div>
	</div>


<div class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php"  >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.php" >Terms & Privacy</a>

      </p>
      
     <p class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="t-blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>
    <script>
function InvalidMsg(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Please fill in this field');
    }
    else if(textbox.validity.patternMismatch){
        textbox.setCustomValidity('Please enter valid 10-digit mobile number');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}
function InvalidMsgError(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Please fill in this field');
    }
    else if(textbox.validity.patternMismatch){
        textbox.setCustomValidity('');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}


</script>
</body>
</html>