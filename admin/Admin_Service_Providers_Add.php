<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if(!isset($_SESSION['admin']['username'])){
		header("Location:index.php");
	}
	
	


?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Add Service provider</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" href="/images/goodscab.ico" type="image/x-icon" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/javascript" src="jquery-2.1.4.js"></script>
  <!-- Custom CSS -->
   <link href="css/style.css" rel="stylesheet">
   <link href="css/index.css" rel="stylesheet">
    <style>
    a{color:black;}
    .btn-default.disabled, .btn-default[disabled], fieldset[disabled] .btn-default, .btn-default.disabled:hover, .btn-default[disabled]:hover, fieldset[disabled] .btn-default:hover, .btn-default.disabled:focus, .btn-default[disabled]:focus, fieldset[disabled] .btn-default:focus, .btn-default.disabled.focus, .btn-default[disabled].focus, fieldset[disabled] .btn-default.focus, .btn-default.disabled:active, .btn-default[disabled]:active, fieldset[disabled] .btn-default:active, .btn-default.disabled.active, .btn-default[disabled].active, fieldset[disabled] .btn-default.active {
    background-color: #E2C44A;
    border-color: #ccc;
    color: black;
}
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
	<form class="form-horizontal" method="post" action="adminServiceProviderCreateBack.php" >
<div class="col-md-6">
    <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>Add Service Provider</strong></h3>
      
  </div> </center> 
  
  <div class="panel-body">
   
  <center><?php 
	


  	if(isset($_POST['username'])){
  		require 'checkUsername.php';
  		
  		echo "<script>alert('coming');</script>";
  		
  		
  		$check = new checkUsername();
  		
  		$username = htmlspecialchars($_POST['username']);
  		$checkMesg =  $check->spCreateCheck($username);
  		
  		echo "<script>alert($checkMesg);</script>";
  		
  		
  		
  		
  	}
	

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
		<h4><b>BASIC INFORMATION:</b></h4>
		 <label for="ServiceType">Service Type*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                         <span class="input-group-addon"><img src="images/vcapacity.png"></img></span>
                                         <select id="service_type"  name="service_type"  class="form-control" required="required" value="">
								<option value="" disabled selected hidden>Select Service type</option>
								<option style="color:black;"value="Courier">Courier</option>
								<option style="color:black;"value="Part Consignment">Part Consignment</option>
								<option style="color:black;" value="Full Consignment">Full Consignment</option>
							</select>
                                        </div>
										<label for="Delivery Type">Delivery Type*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                         <span class="input-group-addon"><img src="images/vcapacity.png"></img></span>
                                        <select id="Delivery_Type"  name="Delivery_Type" required="required" class="form-control" >
								<option value="" disabled selected hidden>Select Delivery type</option>
								<option style="color:black;"value="Regular Service">Regular Service</option>
								<option style="color:black;" value="Express Service">Express Service</option>
								<option style="color:black;" value="Both">Both</option>
							</select>
                                    </div>
									<label for="ServiceProvidercode">Service Provider code*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                         <span class="input-group-addon"><img src="images/Serviceprovider.png"></img></span>
                                       <input  type="text"  id="service_provider_code" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); "  placeholder="Enter service provider code" maxlength="10" name="service_provider_code" class="form-control" />
                                  </div>
								  <label for="ServiceProvidercode">Service Provider Name*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                         <span class="input-group-addon"><img src="images/Serviceprovider.png"></img></span>
                                       <input  type="text"  id="service_provider_name" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); "  placeholder="Enter Service Provider Name" maxlength="50" name="service_provider_name" class="form-control" />
                                  </div>
              
			 <label for="Address">Address*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                        <textarea type="text" id="Contact_address" name="Contact_address" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); " maxlength="100" placeholder="Enter service location address"  class="form-control" /></textarea>
                                        
                                    </div>
 <label for="ContactPerson">Contact Person*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                         <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input maxlength="50" type="text" id="contact_person" name="contact_person" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); " placeholder="Enter Contact person name" class="form-control"/>
                                    </div>
									 <label for="Email Address">Email Address*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                       <input type="email" maxlength="50" min="1" required="required"   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninvalid="InvalidMsgEmail(this);"  oninput="InvalidMsgEmail(this); " name="Email" id="Email"class="form-control" value="<?php echo $row['Email'];?>"  placeholder="Enter email address" />
                                        
                                    </div>
 <label for="Mobile Number">Mobile Number*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                        <input type="text"  oninvalid="InvalidMsg(this);" maxlength="10"  oninput="InvalidMsg(this);" pattern="[0-9]{10}"  required="required" name="usrtel" id="usrtel" class="form-control" value="<?php echo $row['usrtel'];?>" placeholder="Enter mobile number" />                          
										</div>
										<h4><b>SERVICE LOCATION: </b></h4>
                                   
 <label for="Shipment Type">City Name*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                        <input id="base_location" name="base_location" oninvalid="InvalidMsgError(this);" required="required" maxlength="50"  oninput="InvalidMsgError(this); " placeholder="Enter service location"  class="form-control">
							</input>
                                    </div>
									 <label for="Address">Address*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                        <textarea type="text" id="base_location_address" name="base_location_address" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); " maxlength="100" placeholder="Enter service location address"  class="form-control" /></textarea>
                                        
                                    </div>
 <label for="ContactPerson">Contact Person*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input maxlength="50" type="text" id="base_location_contact_person" name="base_location_contact_person" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); " placeholder="Enter Contact person name" class="form-control"/>
                                    </div>
									 <label for="Email Address">Email Address*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                       <input type="email" maxlength="50" min="1" required="required"  id="base_location_email_id" name="base_location_email_id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninvalid="InvalidMsgEmail(this);"  oninput="InvalidMsgEmail(this); " class="form-control" value="<?php echo $row['Email'];?>"  placeholder="Enter email address" />
                                        
                                    </div>
 <label for="Mobile Number">Mobile Number*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                        <input type="text"  oninvalid="InvalidMsg(this);" maxlength="10" id="base_location_contact_number" name="base_location_contact_number" oninput="InvalidMsg(this);" pattern="[0-9]{10}"  required="required" class="form-control" value="<?php echo $row['usrtel'];?>" placeholder="Enter mobile number" />                          
										</div>
										<h4><b>PRICE LIST</b></h4>	
                                   <div id="base_prices">
                                    <label for="Base Price">Base Price*</label>
  <div style="margin-bottom: 12px" id="shipsment" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                        <input  type="text"   id="base_price" name="base_price" maxlength="10"  oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); "  placeholder="Enter base prince in Rupee" class="form-control" />
                                      </div> 
									  </div>
									  <div id="free_kms">
 <label for="Free Km’s">Free Km’s*</label>
                            <div style="margin-bottom: 12px" id="packsage" class="input-group">
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                       <input type="text" maxlength="10" id="free_km" name="free_km" class="form-control" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); " placeholder="Enter no of free km" />
                                   
                                    </div>
									</div>
									<div id="free_kgs">
                                    <label for="Free Kgs">Free Kgs*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                        <input type="text" class="form-control" maxlength="10"  id="free_kg" name="free_kg" placeholder="Enter no of free kg" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); "  ></input>
							
                                    </div>
									</div>
									<div id="price_kms">
									 <label for="Price/km">Price/km*</label>
                            <div style="margin-bottom: 12px" id="packsage" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                       <input type="text" maxlength="10" id="price_km" name="price_km" class="form-control"  placeholder="Enter price per km" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); " />
                                   
                                    </div>
									</div>
									<div id="price_kgs">
                                    <label for="Price/kg">Price/kg*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                        <input type="text" class="form-control" maxlength="10"  id="price_kg" name="price_kg" placeholder="Enter price per kg" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); " ></input>
							
                                    </div>
									</div>
                                  <h4><b>LOGIN</b></h4>
                                   		<center><p style="color: red;" id="msgUsername" name="msgUsername" ></p></center>
                                        <label for="Username">Username*</label>
  <div style="margin-bottom: 12px" class="input-group">
										 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    
                                        <input type="text" id="username" name="username" oninvalid="InvalidMsgError(this);" onfocusout="checkUsername()" required="required" oninput="InvalidMsgError(this); " id="username" maxlength="50" class="form-control" placeholder="Enter username" >         
                                    </div>
 <label for="password">Password*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input  minlength="5" maxlength="20" type="password" oninvalid="InvalidMsgError(this);"  oninput="InvalidMsgError(this); " required="required" class="form-control" onpaste="return false;" name="password" id="password" value="" placeholder="Enter Password">
                                    </div>
                                    <center><p style="color: red;" id="msgPassword" name="msgPassword" ></p></center>
									 <label for="password">Confirm Password*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                            			
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input  minlength="5" maxlength="20" type="password" oninvalid="InvalidMsgError(this);"  onfocusout="checkPasswords();" oninput="InvalidMsgError(this); " required="required" class="form-control" onpaste="return false;" name="rpassword" value="" id="rpassword" placeholder="Re-enter password">
                                    </div>
                                    <center><button  type="submit" name="submit" id="submit" class="btn btn-default">Add</button></center>
                                  
                                    </div>
                                    
                                    
                                   <script type="text/javascript">

											function checkUsername(){
												var username = $("#username").val();
												var query = "SELECT * FROM service_providers WHERE service_username ='"+username+"'";
												$.post("checkUsername.php",{query:query},function(data){
																										
														document.getElementById("msgUsername").innerHTML = data;
													});
											}


												function checkPasswords(){
														var password1 = $("#password").val();
														var password2 = $("#rpassword").val();

														if(password1 != password2){
															document.getElementById("msgPassword").innerHTML = "Password and Confirm Passwords should be same";
															document.getElementById("submit").disabled = true;
															
														}else{
															document.getElementById("msgPassword").innerHTML = "";
															document.getElementById("submit").disabled = false;
															
														}
												}

                                    </script>
                                    
  
  

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
function InvalidMsgEmail(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Please fill in this field');
    }
    else if(textbox.validity.patternMismatch){
        textbox.setCustomValidity('Please enter valid Email Address');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}
 $(function() {
  $('#base_prices').on('keydown', '#base_price', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
 $(function() {
  $('#free_kms').on('keydown', '#free_km', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
 $(function() {
  $('#free_kgs').on('keydown', '#free_kg', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
 $(function() {
  $('#price_kms').on('keydown', '#price_km', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
 $(function() {
  $('#price_kms').on('keydown', '#price_kg', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})

</script>
</body>
</html>