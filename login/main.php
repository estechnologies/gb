<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
	header('Location:index.php');
}









?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Goods CAB Employee Home</title>
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
   <link href="css/main.css" rel="stylesheet">
   <link href="css/multidropdown.css" rel="stylesheet">
   <style>

   .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color: #f1c40f;
    background-color: #f1c40f;
}
   </style>
  <style>
@media (max-width:1500px) {
body{overflow-y: hidden;}
.logo_cap {  margin-top:40px; margin-bottom:70px;}
.navbar-inverse{margin-top: 100px;}
}
ul.star-shaped-bullet { margin: 0; list-style: none; text-align: left }
ul.star-shaped-bullet li:before { content: "\2605\a0" }
@media (max-width:990px) {
.logo_cap {
    margin-top: 133px;
    margin-bottom: 100px;
}
body{overflow-y:visible;}}
@media (max-width:668px) { body{overflow-y:visible;}
.logo_cap{margin-top:100px;margin-bottom:150px;} 
}}
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
    <li class="headermain" style=""><a href="main.php" style=" padding-top: 8px;" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-home"></span> Home</a></li>
     <li style="margin-top:20px;margin-right:20px;" class="dropdown headerlinks">
 <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">My Account
    <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li class="headerlinks_drop"><a href="resetpassword.php">Reset Password</a></li>
        <li class="headerlinks_drop"><a href="logout.php">Logout</a></li>                        
      </ul>
    </li>
  </ul>
    </div>
  </div>
</nav>
<nav style="margin-top: 100px;"  class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="my">
      <ul class="nav nav-pills nav-justified">
      
      
      <!-- shipment bookings -->
 
 <?php if($_SESSION['emp']['shipmentbookingAccess'] == '1'){ ?>
 
	<li class="dropdown headerlinks"  > <a class="dropdown-toggle" data-toggle="dropdown" href="#">Shipment Bookings
						  <span class="caret"></span></a>
						  <ul class="dropdown-menu">
						  <?php if ($_SESSION['emp']['createBookingAccess'] == '1'){?>
						  	<li><a href="BookingCreate.php"> Create Booking</a></li>
						  	<?php }?>
						  	
						  	
						  	<?php if($_SESSION['emp']['viewEditBookingAccess'] == '1'){?>
							<li><a href="BookingView.php">View & Edit Booking</a></li>
							<?php }?>
							
							
						  </ul></li>
						  <?php }?>
						  
		<!-- packaging solutions-->				  
			
		<?php if ($_SESSION['emp']['packagingsolutionAccess'] == '1') {?>	
						  
      <li class="dropdown headerlinks" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Packing Bookings 
						  <span class="caret"></span></a>
						  
					  
		    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
		    		
		    		<!-- mto bookings -->
		    			<?php if ($_SESSION['emp']['mtobookingAccess'] == '1'){?>	
		              		<li class="dropdown-submenu">
		                		<a tabindex="-1" href="#">MTO Bookings</a>
		               			
		               			  <ul class="dropdown-menu">
		                 			 <!-- mto booking create -->
		                 			 <?php if ($_SESSION['emp']['mtocreatebookingAccess'] == '1'){ ?>
		                  			<li><a href="MTOBookingsCreate.php"> Create MTO Booking</a></li>
		                  			<?php }?>
		                  			
		                  			<!-- mto view edit -->
		                  			<?php if ($_SESSION['emp']['mtobookingeditAccess'] == '1'){ ?>
		                  			<li><a tabindex="-1" href="MTOBookingsView.php"> View & Edit MTO Booking</a></li>
		                  			<?php }?>
		               			 </ul>
		              		</li>
		              		<?php }?>
		              		
		              		<!-- mts bookings -->
		             	<?php if ($_SESSION['emp']['mtsbookingsAccess'] == '1'){ ?>
		              		<li class="dropdown-submenu">
		                		<a tabindex="-1" href="#">MTS Bookings </a>
		               			 <ul class="dropdown-menu">
		               			 
		               			 	<!-- mts booking view and edit -->
		               			 		<?php if ($_SESSION['emp']['mtsbookingeditAccess'] == '1'){ ?>
		                 			 <li><a tabindex="-1" href="MTSBookingsView.php">View & Edit MTS Bookings</a></li>
		                 			 <?php }?>
		               			 </ul>
		              		</li>
							<?php }?>
		            	</ul>
</li>
<?php }?>



	<!-- cargo insurance -->
	<?php if ($_SESSION['emp']['cargoInsuranceAccess'] == '1'){ ?>
    <li class="headerlinks" ><a style=""  href="CargoInsurance.php" >Cargo Insurance</a></li>
    <?php }?>
    
    <!-- documentation -->
    <?php if ($_SESSION['emp']['documentationAccess'] == '1'){ ?>
    <li class="headerlinks" ><a style=""  href="Documentation.php">Documentation</a></li>
    <?php }?>
    
    <!-- service provider -->
    <li class="headerlinks" ><a style=""  href="ServiceProvidersView.php" >Service Providers</a></li>
    <!-- my profile -->
    <li class="headerlinks" ><a style=""  href="MyProfile.php">My Profile</a></li> 
  </ul>
    </div>
  </div>
</nav>
<div class="container">
<div class="col-md-6" style="margin-top: 10px;">
			<ul class="star-shaped-bullet">
				<li style="font-size: 16px;">Plan and Organise your Logistics at your convenience</li>
				<li style="font-size: 16px;margin-top:5px;">Hassle free Pickups and Delivery </li>
				<li style="font-size: 16px;margin-top:5px;">Clear Billing & Free Insurance</li>
				<li style="font-size: 16px;margin-top:5px;">Real time updates</li>
				<li style="font-size: 16px;margin-top:5px;">Trusted & Verified for safety</li>
			</ul>
		</div>
		<?php
					include 'counts.php';
					$count  = new counts();
					
					?>
		<div class="col-md-6" style="margin-top: 10px;">
			<center><p>Customers</p></center>
			<center><p><?php echo $count->usersCount(); ?>+</p></center>
			<center><p>Bookings</p></center>
			<center><p><?php echo $count->totalBookingCount(); ?>+</p></center>
			<center><p>Service Providers</p></center>
			<center><p><?php echo $count->serviceProvidersCount(); ?>+</p><center>
			<center><p>Shipment Weight</p></center>
			<center><p><?php echo $count->totalShipmentWeightCount(); ?>+</p></center>
		</div>
</div>
<div class="col-md-12 logo_cap">
	<center><h3><b><i>Right time, Right place on the Budget Every Time.</i></b></h3></center>
</div>
<div class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php"  >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.html" >Terms & Privacy</a>

      </p>
      
     <p class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="t-blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>
</body>
</html>