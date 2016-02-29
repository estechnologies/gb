<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page

	if(!isset($_SESSION['admin']['username'])){
		header("Location:index.php");
	}

require 'counts.php';

	$counts = new counts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Goods CAB Admin Home</title>
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
   <link href="css/multidropdown.css" rel="stylesheet">
   <style>
   td{ width:50%;text-align:left;}
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
 
	<li class="dropdown headerlinks"  > <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bookings
						  <span class="caret"></span></a>
						  <ul class="dropdown-menu">
						  	<li><a href="AdminBookingCreate.php"> Create Booking</a></li>
							<li><a href="adminBookingView.php">View & Edit Booking</a></li>
							
						  </ul></li>
      <li class="dropdown headerlinks" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Packing Solutions 
						  <span class="caret"></span></a>
		    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
		              		<li class="dropdown-submenu">
		                		<a tabindex="-1" href="#">MTO Bookings</a>
		               			
		               			  <ul class="dropdown-menu">
		                 			 
		                  			<li><a href="admin_packagingSolution_customOrders_create.php"> Create MTO Booking</a></li>
		                  			<li><a tabindex="-1" href="admin_packagingSolution_customOrders_view.php"> View & Edit MTO Booking</a></li>
		                  			
		               			 </ul>
		              		</li>
		              		<li class="dropdown-submenu">
		                		<a tabindex="-1" href="#">MTO Pricing</a>
		               			 <ul class="dropdown-menu">
		               			 <li><a href="admin_packagingSolution_customPricing_create.php">Create MTO Pricing</a></li>
		                 			 <li><a tabindex="-1" href="admin_packagingSolution_customPricing_view.php">View & Edit MTO Pricing </a></li>
		               			 </ul>
		              		</li>
		              		<li class="dropdown-submenu">
		                		<a tabindex="-1" href="#">MTS Products</a>
		               			 <ul class="dropdown-menu">
		               			 <li><a href="Admin_MTS_Products_Create.php"> Create MTS Product</a></li>
		                 			 <li><a tabindex="-1" href="Admin_MTS_Products_View.php">View & Edit MTS Product </a></li>
		               			 </ul>
		              		</li>
		              		<li class="dropdown-submenu">
		                		<a tabindex="-1" href="#">MTS Bookings </a>
		               			 <ul class="dropdown-menu">
		                 			 <li><a tabindex="-1" href="Admin_MTS_Bookings_View.php">View & Edit MTS Bookings</a></li>
		               			 </ul>
		              		</li>

		            	</ul>
</li>
 
    <li class="headerlinks" ><a style=""  href="CargoInsurance.php" >Cargo Insurance</a></li>
    <li class="headerlinks" ><a style=""  href="Documentation.php">Documentation</a></li>
       <li class="dropdown headerlinks" > <a class="dropdown-toggle" data-toggle="dropdown" href="#">Service Providers
						  <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="Admin_Service_Providers_Add.php">Add Service provider</a></li>
							<li><a href="Admin_Service_Providers_view.php">View & Edit Service provider</a></li>
						</ul></li>
						<li class="dropdown headerlinks" > <a class="dropdown-toggle" data-toggle="dropdown" href="#">Employee
						  <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="Admin_Employee_Records_Add.php">Add Employee</a></li>
							<li><a href="Admin_Employee_Records_view.php"> View & Edit Employee</a></li>
						  </ul></li>
  </ul>
    </div>
  </div>
</nav>
  
	<div class="main"  >
	<div class="container" style="margin-top:80px;">
                                        
  <table class="table table-striped table-bordered table-hover table-condensed">
<thead>
  <tr>
    	<th colspan="2">Bookings</th>
    </tr>
</thead>
    <tbody>
  
      <tr>
        <td>Todays Bookings</td>
       	<td> <div ><?php echo $counts->todayBookingCount();?></div></td>
       </tr>
       <tr>
        <td>Current Month Bookings</td>
       <td><div ><?php echo $counts->monthBookingCount();?></div></td>
       </tr>
       <tr>
        <td>Couriers</td>
       <td><div ><?php echo  $counts->courierCount();?></div></td>
       </tr>
        <tr>
        <td>Part Consignments</td>
       	<td><div ><?php echo $counts->partConsignmentCount();?></div></td>
       </tr>
       <tr>
        <td>Full Consignments</td>
       <td><div ><?php echo $counts->fullConsignmentCount();?></div></td>
       </tr>
             <tr>
        <td>Shipment Weight Handled</td>
       	<td><div ><?php echo $counts->totalShipmentWeightCount();?></div></td>
       </tr>
       <tr>
        <td>Projections</td>
        <td><div ><?php echo $counts->projectionsCount();?></div></td>
       </tr>
    
       
    </tbody>
  </table>
   <table class="table table-striped table-bordered table-hover table-condensed">
   <thead>
   <tr>
    	<th colspan="2">Packing Solutions</th>
    </tr>
   </thead>
    <tbody>
     
      <tr>
        <td>Today’s MTS Bookings</td>
       	<td> <div ><?php echo $counts->todayMtsCount();?></div></td>
       </tr>
       <tr>
        <td>Today’s MTO Bookings</td>
       <td><div ><?php echo $counts->todayMtoCount(); ?></div></td>
       </tr>
       
        
      
    </tbody>
  </table>
     <table style="margin-bottom:150px;" class="table table-striped table-bordered table-hover table-condensed">
   <thead>
   <tr>
    	<th colspan="2">Operations</th>
    </tr>
   </thead>
    <tbody>
     
     
        <tr>
        <td> Users</td>
       	<td><div ><?php echo $counts->usersCount();?></div></td>
       </tr>
        <tr>
        <td>  Service Providers</td>
       	<td> <div ><?php echo $counts->serviceProvidersCount();?></div></td>
       </tr>
       <tr>
        <td> Employees</td>
       <td><div ><?php echo $counts->employeesCount();?></div></td>
       </tr>
      
    </tbody>
  </table>
</div>

<div class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php"  >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.php" >Terms & Privacy</a>

      </p>
      
     <p class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="_blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>
</body>
</html>