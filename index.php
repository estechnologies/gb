<!DOCTYPE html>
<html lang="en">
<head>
  <title>Goods CAB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="/images/goodscab.ico" type="image/x-icon" />
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">
  <link href="css/social.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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

<body>

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
   <li style="margin-right:20px;margin-top:10px;"><a href="index.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		 <li style="margin-right:20px;margin-top:10px;"><a href="login.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li style="margin-right:10px;margin-top:10px;"><a  href="Registration.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-user"></span> Register</a></li>
       
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
 
	<li class="headerlinks"  ><a style=""  href="userbooking.php" >Shipment Booking</a></li>
      <li class="headerlinks"  ><a style=""  href="trackingNormal.php" >Track</a></li>
    <li class="headerlinks" ><a style=""  href="PackingSolutions.php" >Packing Solutions</a></li>
    <li class="headerlinks" ><a style=""  href="CargoInsurance.html" >Cargo Insurance</a></li>
    <li class="headerlinks" ><a style=""  href="Documentation.html">Documentation</a></li>
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
<div class="col-md-1 " >
<aside id="sticky-social">
    <ul>
        <li><a href="https://www.facebook.com/GoodsCAB" class="entypo-facebook" target="_blank"><span>Facebook</span></a></li>
        <li style=" margin-bottom: 10px;margin-top: 10px;"><a href="https://twitter.com/GoodsCAB" class="entypo-twitter" target="_blank"><span>Twitter</span></a></li>
        <li><a href="https://www.linkedin.com/in/goods-cab-8589aa112?trk=hp-identity-name" class="entypo-linkedin" target="_blank"><span>LinkedIn</span></a></li>
		<li style="margin-top: 10px;"><a href="https://www.youtube.com/" class="entypo-youtube" target="_blank"><img src="images/youtube.png"></img><span>Youtube</span></a></li>
    </ul>
</aside>
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