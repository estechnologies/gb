<?php

// Inialize session
session_start();
require 'connect.php';
$database =  new connect();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['service_username'])) {
header('Location:index.php');
}

$serviceId = $_SESSION['service']['service_id'];
$serviceCode = $_SESSION['service']['service_provider_code'];




?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Goods CAB</title>
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

	th {
    white-space: nowrap;
}
	td {
    white-space: nowrap;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #000000;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #000;
}
table{border: 1px solid #000;}

.panel-default>.panel-heading {
    color:black;
    background-color: #F1C40F;
    border-color: #F1C40F;
}
.nav-tabs {

    border-bottom: 1px solid #f1c40f;
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
    <li class="headermain" style=""><a href="main.php" style=" padding-top: 8px;" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-home"></span> Home</a></li>
     <li style="margin-top:20px;margin-right:20px;" class="dropdown headerlinks">
 <button class="btn btn-default dropdown-toggle"  type="button" data-toggle="dropdown">My Account
    <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li class="headerlinks_drop"><a  href="resetpassword.php">Reset Password</a></li>
        <li class="headerlinks_drop"><a  href="logistics_logout.php">Logout</a></li>                        
      </ul>
    </li>
  </ul>
    </div>
  </div>
</nav>
	<div class="main" style="margin-top: 100px;" >
	   <div style="color:black;" >
			
					
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a  href="#tab1default" data-toggle="tab">My Bookings</a></li>
                            <li><a href="#tab2default" data-toggle="tab">My Profile</a></li>
                        </ul>
                </div>
                <div class="panel-body">
				<div class="tab-content">
						<div class="tab-pane active" id="tab1default">
							<div class="container" style="color:black">
							<?php

		
		
		/*
		 * reteriving orders according search or whole
		 */
		$pageNumber = intval($_GET['page']);
			
			
		if($pageNumber == null or $pageNumber == '1'){
			$pageNumber = 0;
		}else{
			$pageNumber = ($pageNumber*5)-5;
		}
											
											$query="SELECT * FROM goodscab_Booking WHERE service_provider_code='$serviceCode' ORDER BY Booking_ID DESC LIMIT $pageNumber,5";
											if(isset($_POST['search'])){
											
												$search_term = htmlspecialchars($_POST['search_box']);
											
											
											
												
												$query = "SELECT * FROM goodscab_Booking WHERE service_provider_code='$serviceCode'AND hashid ='$search_term' LIMIT $pageNumber,5";
											
												$checkQuery= mysql_query($query);
												if(mysql_num_rows($checkQuery) <= 0){
													$noFound= "Entered Booking id is not found in our records.";
												}else{
													$noFound = "";
												}
											
											}
											
											
											if(isset($_POST['reset'])){
											
												$query = "SELECT * FROM goodscab_Booking WHERE service_provider_code='$serviceCode' ORDER BY Booking_ID DESC LIMIT $pageNumber,5";
											
											
											}
											
											
											$resultQuery = mysql_query($query);
											
											
											/*
											 *page number counts
											 */
											
											
											$pagesTotalCount = "SELECT * FROM goodscab_Booking WHERE service_provider_code='$serviceCode'";
											
											$resultPagesTotalCount = mysql_query($pagesTotalCount);
											$pages = mysql_num_rows($resultPagesTotalCount);
											
											if(isset($_POST['search'])){
												$pages = mysql_num_rows($resultQuery);
											}
												
											$pageCount = floatval($pages/5);
											$pageCount = ceil($pageCount);
											
											?>
							 				
											 <form name="search_form" method="POST" action="main.php">
											 <div class="container" style="margin-top:20px;">
											 <h3 style="margin-bottom:20px;"><b>Bookings List</b></h3>
												<div class="row">
												
													<div class="col-md-3">
													<div class="search">
											<input type="text" name="search_box" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"  placeholder="Enter Booking id" required="required" class="form-control input-sm" maxlength="8"  />
											</div>
											</div>
											<div class="col-md-1">
											<button type="submit" name="search" class="btn btn-default" style="width:100px;" value="">Search</button>
											</div>
											</form>
											 <form name="search_form" method="POST" action="main.php">
											<div class="col-md-1">
											<button type="submit" name="reset" class="btn btn-default" style="width:100px;" value="">Reset</button>
											</div>
											</div>
											</div>
											 </form>
											 <div class="table-responsive" style="margin-top:20px;">
		
										<table class="table table-striped table-hover table-condensed">
											    <thead>   <tr>
												 
												 <th ><strong>Booking ID</strong></th> 
												  <th ><strong>Service Provider code</strong> </th >

												 <th ><strong>Pickup Address</strong> </th> 
												   <th ><strong>Delivery Address</strong></th> 
												   <th > <strong>Booking Time</strong></th > 
												   <th > <strong>Pickup Date & Time</strong> </th >
												   <th  ><strong>Shipment Type</strong></th >
												   <th ><strong>Shipment weight</strong></th > 
												 <th  ><strong>No of Packages</strong> </th >
												   <th > <strong>Vehicle Capacity</strong></th > 
												   <th > <strong>Estimated Distance</strong> </th >
												   <th ><strong>Estimated Travel Time</strong></th > 
																								   <th > <strong>Status </strong></th >
												   <th  ><strong>Reference</strong></th >
												   <th > <strong>Track Reference</strong></th >
												 </tr>
												 </thead>
												 <tbody>
												 <?php 
			/*
			 *if no found isset 
			 */
				if(isset($noFound)){
							 if(mysql_num_rows($resultQuery) <= 0){
							echo "<td style='font-size: 14px;color:Red;'>$noFound</td> ";
							for($a = 0; $a <= 20; $a++){
								echo "<td></td>";
							}
								}
				}
			?>
												 
												 
												 <?php while($row = mysql_fetch_array($resultQuery)){ ?>
											
												 <td><?php echo $row['hashid'];?></td> 
												  <td><?php echo $row['service_provider_code'];?></td>
												 <td><?php echo $row['from_Address'];?></td> 
												 <td><?php echo $row['to_Address'];?></td>
												 <td><?php echo $row['booking_time'];?></td> 
												  <td><?php echo $row['Travel_Date_Time'];?></td> 
												 <td><?php echo $row['Shipment_Type'];?></td> 
												 <td><?php echo $row['Shipment_weight'];?></td> 
												  <td><?php echo $row['Num_package'];?></td> 
												  <td><?php echo $row['Vehicle_Capacity'];?></td>
												 <td><?php echo $row['distance'];?></td> 
												 <td><?php echo $row['travel_data'];?></td> 
												 
												 <td><?php echo $row['status'];?></td>
												 <td><?php echo $row['reference'];?></td> 
												 <td><?php echo $row['track_reference'];?></td>
											</tr>
											  
											</tbody>	 <?php } ?>
										</table>
										      <ul class="pagination pull-right" >
        
        <!--
        
        	pagnation reference
        	
        	  
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
            
            
            -->
            <?php 
            
            	for($i = 1;$i <= $pageCount; $i++){
            		?>  <li><a href="main.php?page=<?php echo $i;?>"><?php  echo $i; ?></a></li> <?php 
            	}
            
            ?>
            
            
        </ul>
										</div>	
							</div>
						</div>
						<div class="tab-pane" id="tab2default">
							<div class="container" style="color:black">
							 <table class="table table-striped table-bordered table-hover table-condensed">
<thead>
  <tr>
    	<th colspan="2">My Profile</th>
    </tr>
</thead>
    <tbody>
  
      <tr>
        <td>Service id:</td>
       	<td> <div ><?php echo $_SESSION['service']['service_id'];?></div></td>
       </tr>
       <tr>
        <td>Service Type: </td>
       <td><div > <?php echo $_SESSION['service']['service_type']; ?></div></td>
       </tr>
       <tr>
        <td>Delivery Type:</td>
       <td><div > <?php echo  $_SESSION['service']['delivery_type'];?></div></td>
       </tr>
        <tr>
        <td>Service provider name: </td>
       	<td><div ><?php echo $_SESSION['service']['service_provider_code'];?> </div></td>
       </tr>
       <tr>
        <td>Username:</td>
       <td><div ><?php echo $_SESSION['service']['service_username'];?> </div></td>
       </tr>
             <tr>
        <td>Address: </td>
       	<td><div ><?php echo $_SESSION['service']['Contact_address'];?></div></td>
       </tr>
       <tr>
        <td>Contact person: </td>
        <td><div > <?php echo $_SESSION['service']['contact_person'];?></div></td>
       </tr>
    	 <tr>
        <td>Email address:</td>
       	<td> <div ><?php echo $_SESSION['service']['email_id'];?></div></td>
       </tr>
       <tr>
        <td>Mobile number:</td>
       <td><div > <?php echo $_SESSION['service']['contact_number'];?></div></td>
       </tr>
        <tr>
        <td>Service Location:</td>
       	<td><div ><?php echo $_SESSION['service']['base_location'];?></div></td>
       </tr>
       <tr>
        <td>Service Location Address:</td>
       <td><div ><?php echo  $_SESSION['service']['base_location_address'];?> </div></td>
       </tr>
             <tr>
        <td>Service Location Contact Person:</td>
       	<td><div > <?php echo $_SESSION['service']['base_location_contact_person'];?></div></td>
       </tr>
       <tr>
        <td>Service Location Email Address:</td>
        <td><div ><?php echo $_SESSION['service']['base_location_email_id'];?></div></td>
       </tr>
       <tr>
        <td>Service Location Mobile Number: </td>
        <td><div ><?php echo $_SESSION['service']['base_location_contact_number'];?></div></td>
       </tr>
    	 <tr>
        <td>Base Price:</td>
       	<td> <div ><?php echo $_SESSION['service']['base_price'];?></div></td>
       </tr>
       <tr>
        <td>Free Km:</td>
       <td><div ><?php echo  $_SESSION['service']['free_km'];?></div></td>
       </tr>
        <tr>
        <td>Free Kgs: </td>
       	<td><div ><?php echo $_SESSION['service']['free_kg'];?></div></td>
       </tr>
       <tr>
        <td>Price/Km:</td>
       <td><div ><?php echo $_SESSION['service']['price_km'];?> </div></td>
       </tr>
             <tr>
        <td>Price/Kg:</td>
       	<td><div ><?php echo $_SESSION['service']['price_kg'];?></div></td>
       </tr>
       
    </tbody>
  </table>
  <p style="margin-bottom:100px">Please Contact Admin for any changes in the above information.</p>
       
       	
							</div>
						
						</div>
						
						</div>
				</div>
            </div>
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
          	<a href="aboutus.php" >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.html" >Terms & Privacy</a>

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
	<script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>

	  </body>
</html>