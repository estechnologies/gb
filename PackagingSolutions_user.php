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
    
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Design and order your packing materials</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/goodscab.ico" type="image/x-icon" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
   <link href="css/logistics.css" rel="stylesheet">
  <!-- Custom CSS -->
   <link href="css/style.css" rel="stylesheet">
<link href="css/index.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">	
<style>
.panel {
    margin-bottom: 20px;
    background-color: #fff;
     border: 0px solid transparent;
    /* border-radius: 4px; */
    /* -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05); */
    /* box-shadow: 0 1px 1px rgba(0,0,0,.05); */
}
.panel-default>.panel-heading {
    color: #333;
    background-color: #F1C40F;
    border-color: #F1C40F;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
    background-color: black;
    color:white;
    border: 1px solid transparent;
    border-bottom-color: transparent;
    cursor: default;
}
.nav-tabs>li>a{

color: black;
    font-size: 18px;
}
.nav-tabs {
    border-bottom: 1px solid #f1c40f;
}
.nav-tabs>li>a:hover {
 background-color:black;
 color:white;
 border: 1px solid black;

}
  p,ul {
    text-align: justify;
    text-justify: inter-word;
}
</style>
  </head>
  <body style="font-size:16px;">
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
 <button class="btn btn-default dropdown-toggle"  type="button" data-toggle="dropdown">My Account
    <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li class="headerlinks_drop"><a href="resetpassword.php">Reset Password</a></li>
        <li class="headerlinks_drop"><a href="userLogout.php">Logout</a></li>                        
      </ul>
    </li>
  </ul>
    </div>
  </div>
</nav>
  
<div class="main" style="margin-top:100px;" >
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Store" data-toggle="tab">Store</a></li>
                            <li><a href="#Packing_Instructions" data-toggle="tab">Packing Instructions</a></li>
                        </ul>
                </div>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane active" id="Store">
								<div class="container" style="margin-bottom:100px">
									<div class="col-md-4">
										<img src="images/storeimage.png"></img>
									</div>
									<div class="col-md-8" style="font-size:21px;margin-top:50px;">
										<i><p>We believe, Packing is a Technology crafted with Art of Enclosing or Protecting products for Shipments, Stroage, and Sale</p></i>
										<i><p>Give us a try; you will love our Packing Solutions for sure.</p></i>
										<div style="margin-top:50px;">
											<div class="col-md-4">
												<center><a href="Customdesign_user.php"><button style="width: 174px; font-size: 18px;" class="btn btn-default">Design your Packing</button></a></center>
											</div>
											<div class="col-md-4">
												<center><a href="AvailableProducts_user.php"><button style="width: 174px; font-size: 18px;" class="btn  btn-default">Available Products</button></a></center>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="Packing_Instructions">
								<div class="container" style="margin-bottom:100px">	
									<h3>Packaging Quality:</h3>

								<ul>
								  <li>Avoid using damaged containers or boxes</li>
								  <li>Use a rigid box with flaps intact</li>
								  <li>Remove all old labels and delivery markings from the box</li>
								  <li>Wrap pieces separately</li>
								  <li>Use strong tape designed for shipping</li>
								  <li>Do not use string or paper over-wrap</li>
								  <li>Always use high quality wrapping and cushioning/filler materials</li>
								  <li>Consider the strength and durability of your chosen packaging</li>
								  <li>Repack any gifts, as decorative wrapping is not suitable for shipping</li>
								  <li>Use a single address label that has a clear, complete delivery address</li>
								  <li>Place a duplicate address label inside the box (including return address)</li>
								 </ul>
								 
									<h3>Protect your Shipment:</h3>

									<ul>
									  <li>Protective dividers and cushioning material should be used for all fragile material packing</li>
									  <li>Protect data and media discs/tapes with cushioning or protective bags</li>
									  <li>Use heavy, well-secured edge protection for all edges and sharp items</li>
									  <li>Use heavy-duty double-layered cardboard for valuable items</li>
									  <li>Keep your packages dry while awaiting a courier pickup</li>
									  <li>Ensure liquids are stored in leak-free containers</li>
									  <li>Place powders and fine grains in strong plastic bags, securely sealed and then packed </li>
									  <li>"Fragile" and "Handle with Care" stickers are no substitute for careful packaging</li>
									  <li>Use "Arrow Up" stickers for non-solid materials</li>
									  <li>When using strapping, edge protectors prevent damage to your shipment by distributing the strapping pressure</li>
									  <li>Provide Shipper and Receiver addresses clearly and completely on labels and stickers</li>
									  <li>An extra address label placed inside the package is a good precaution</li>
									 </ul>
									 <h3>Dangerous Goods:</h3>
									<p>Transportation of Dangerous Goods is a risk when they are not correctly packed or handled. If the goods are hidden, declared incorrectly, left completely undeclared, packed or labelled incorrectly, health and safety is compromised.
From paint to perfume and electronic equipment, many common items may be considered dangerous goods when shipped. please check first and If in doubt, refer to the Material Safety Data Sheet from the manufacturer to determine if the product can indeed be forwarded as regular cargo.
</p>
									<h4><i>Conditions to ship dangerous goods:</i></h4>
									<ul>
									  <li>Prohibited substances: Dangerous Goods waste, Munitions of War</li>
									  <li>Customer approval: Only Dangerous Goods from an approved customer will be accepted.</li>
									  <li>Dangerous Goods shipments must be prepared in accordance with the relevant Dangerous Goods Regulations:Correctly packed, marked and labelled. Required documents completed: A Shipper’s Declaration for Dangerous Goods, if applicable, must be signed by the shipper only and accompany the shipment. All State and Operator Variations must be complied with</li>
									  <li>Traffic approval: Only Dangerous Goods shipments which have been booked and approved will be accepted.</li>
									  </ul>
								  <p> <a style="color:orange;text-decoration: underline;"  href="contactus_user.php"  > Click here</a> to Contact us for any Queries. </p>
								
								</div>
							</div>
						</div>
					</div>
				</div>		
		</div>
<div style="margin-bottom:100px">
  </div>

	<!-- Footer -->
      <div  class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus_user.php" >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus_user.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy_user.php" >Terms & Privacy</a>

      </p>
      
    <p  class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="t-blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>


	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
	<script src="js/wow.min.js"></script>
	<script src="js/functions.js"></script>
	<script src="content/js/jquery.min.js"></script>
<script src="content/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>

	  </body>
</html>