<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page

	if(!isset($_SESSION['admin']['username'])){
		header("Location:index.php");
	}

require 'counts.php';

	$counts = new counts();
?><!DOCTYPE html>
<html lang="en">
<head>
 <title>About GoodsCAB</title>
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
  p {
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
		 <li style="margin-right:20px;margin-top:10px;"><a href="logout.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
       
      </ul>
    </div>
  </div>
</nav>
	<div class="main" style="background-color:white;margin-top:70px;margin-bottom:150px;">
	<div class="container" >
	
		<div class="col-md-12">
			<h1>About us</h1>
			<p>Started in January 2016, Goods CAB is an on-demand platform for Logistic Services which gets your Goods moving in less than 120 mins from the time of booking. It aggregates the service providers and instantly connects them to businesses and individuals in need of Goods transportation.
</p>
			<p>Experience the goods transportation with our safety screened vehicles and high level of professionalism. Our Service Providers are around the city to ensure quick services to the customers.
 </p>
			<p>Goods CAB is currently operational in Hyderabad with plans to extend its services to other locations soon.</p>
			
			
		</div>
		
		<div class="col-md-12">
		<div class="col-md-6">
			<h3 style="    margin-left: -14px;">Registered Office Address:</h3>
			<ul style="list-style-type: none;">
				<li>Plot No 85, P & T Colony,</li>
				<li>Kharkhana, Secunderabad – 500009</li>
			</ul>
		</div>
		<div class="col-md-6">
		<h3 style="    margin-left: -14px;">Available Hours: </h3>
			<ul style="list-style-type: none;">
				<li>For Booking, we are available 24/7</li>
				<li>Office Hours: 9 30 AM to 6 30 PM.</li>
			</ul>
		</div>
		</div>
		<div class="col-md-6">
		
			<h3 style="">Contact Us: </h3>
			<ul style="list-style-type: none;">
				<li>Talk with our expert …</li>
				<li>Phone:&nbsp;&nbsp;+91 9676775983</li>
				<li>Email:&nbsp;&nbsp;&nbsp;&nbsp;support@goodscab.com</li>
			</ul>
		</div>
		<div class="col-md-12">
		<p><a style="color:Orange;text-decoration: underline;"  href="contactus.php" > Click here</a> to leave your message and our experts will reply to your message shortly.</p>
	</div>
	</div>
	</div>
	  <div style="margin-bottom:100px">
  </div>

	<!-- Footer -->
      <div  class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php" >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.php" >Terms & Privacy</a>

      </p>
      
 <p  class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="t-blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>


</body>
</html>