<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
	header('Location:index.php');
}else if($_SESSION['emp']['documentationAccess'] != '1'){
	header('Location:main.php');
}


require 'connect.php';

	$database = new connect();

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Documentation</title>
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
<link href="css/main.css" rel="stylesheet">
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
<div class="main" style="background-color:white;margin-top:100px;">
	<div class="container" >
	
		<div class="col-md-12">
			<h2>Documentation</h2>
									<p>Proper documentation will ensure your shipment on right time at right place. This includes your shipping and package documentations, but if you’re unsure as to what these involve, Goods CAB can help.
If you are shipping goods for sale, you will need a Commercial Invoice. and If your shipment has no commercial value (e.g. personal gifts or items), then use a pro-forma invoice.
</p>
									<p>Invoice acts as a commercial statement or declaration of the contents and value within the transaction. 
Taxes and duties are calculated on the information given in the invoice. Whoever fills out the invoice is must ensure accuracy, as they may be liable for any legal consequences if your package causes a security or regulations breach. For this reason it must be filled out by a designated member of your company.
</p>
<i><h4>Following are the few Important fields that are required in your Invoice:</h4></i>
									<ul>
									  <li>The word “Invoice” must be included on every commercial invoice.
“Performa Invoice” can only be used when items with no commercial value are being shipped.
</li>
									  <li>Both the sending and receiving companies names and addresses needs to be included, along with the date and serial number of invoice.</li>
									  <li>A full description of goods is necessary. Include the country of item quantities, unit of measure and unit value.</li>
									  <li>Declare when the ownership of goods changes and who becomes responsible for taxes, insurance and shipment costs.</li>
									  <li>Authorized signature of the sender along with date and stamp is necessary.</li>
																		</ul>	
  <p><a style="color:Orange;text-decoration: underline;"  href="contactus.php" > Click here </a>to Contact us for any Queries </p>
																			
		</div>
		
	</div>
	</div>
 <div style="margin-bottom:100px">
  </div>

	<!-- Footer -->
      <div  class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php"  >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.php" >Terms & Privacy</a>

      </p>
      
   <p  class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="t-blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>



</body>
</html>