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
 <title>Cargo Insurance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" href="/images/goodscab.ico" type="image/x-icon" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Custom CSS -->
   <link href="css/style.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
  <style>
  p,ul {
    text-align: justify;
    text-justify: inter-word;
}
  </style>

</head>

<body style="font-size: 16px;">
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
		 <li style="margin-right:20px;margin-top:10px;"><a   href="logout.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
	<div class="main" style="background-color:white;margin-top:100px;margin-bottom:100px">
	<div class="container" >
	
		<div class="col-md-12">
			<h1>Cargo Insurance</h1>
			<p>Cargo insurance (also known as marine, shipping or freight insurance) covers the loss, damage or theft of commodities while in transit. Specific terms and benefits vary widely across the world and many Cargo Insurance Policies are custom tailored for specific shipments, but a few general principles apply to the entire industry.</p>
		
			<i><h4>Types of Cargo Insurance:</h4></i>
			<p>Policies are available to protect the goods while in transit on the ship, but damage can occur while the ship is in port, while the goods are in transit to the warehouse or while at the warehouse itself. These Policies can be endorsed to cover all these instances, or a policy can be purchased individually to provide cumulative coverage for all locations of your goods.</p>
			<p>The most comprehensive type of Cargo Insurance is called All Risks Coverage. If you are shipping Household Goods, Personal Effects, or Vehicles, all risk insurance is only available if the container is professionally packed and loaded by a professional company (not the actual customer). Otherwise, the shipment is only insured for very a limited “WA coverage”.</p>
			<i><h4>Cargo Insurance Exclusions:</h4></i>
			<p>Most Cargo Insurance Policies do not reimburse for losses caused by improper packing or when customs officials reject the delivered goods.</p>
			<i><h4>Other claims that are excluded from most Cargo Insurance Policies include:</h4></i>
			<ul>
				<li>Abandoned cargo</li>
				<li>Other party failing to pay</li>
				<li>Spoilage or other damages due to the product’s nature</li>
				<li>Losses caused by shipping delays</li>
				<li>Employee dishonesty</li>
				<li>Damages at port cities more than 15 days after cargo were unloaded.</li>
			</ul>	
			<p>For example, improperly packed rice can expand and spoil while in-transit. This would not be covered under standard Cargo Insurance Contracts.</p>
			<i><h4>Covered Risks under a Cargo Insurance Policy:</h4></i>
			<ul>
				<li>All Risks Cargo Insurance would cover the non-delivery of an entire shipping package, including where theft was involved.</li>
				<li>Total loss of the entire shipment would also be covered if due to a collision, explosion or burning involving the ocean vessel.</li>
			</ul>
			<i><h4>Other eligible risks to cargo include:</h4></i>
			<ul>
				<li>Damages from bad weather</li>
				<li>Seawater or freshwater flooding</li>
				<li>Improper stowage by the shipping company</li>
				<li>Mud and grease damage</li>
				<li>Fumigation services.</li>
			</ul>
			<p> For experts Solutions, <a style="color:Orange;text-decoration: underline;"  href="contactus.php" >Click here</a>    to Contact us</p>
		
		</div>
		
	</div>
	</div>
 <div style="margin-bottom:100px">
  </div>

	<!-- Footer -->
      <div  class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php">About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.php" >Terms & Privacy</a>

      </p>
      
     <p  class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="t-blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>
</body>
</html>