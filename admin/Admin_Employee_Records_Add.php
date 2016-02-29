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
 <title>Add Employee</title>
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
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="css/index.css" rel="stylesheet">
<script>
function validate(){
    var remember = document.getElementById('ShipmentBookings');
    if (remember.checked){
        document.getElementById('ship').style.display='inline';
    }else{
       document.getElementById('ship').style.display='none';
    }
}
function validatepack(){
    var remember = document.getElementById('PackingSolution');
    if (remember.checked){
        document.getElementById('pack').style.display='inline';
    }else{
       document.getElementById('pack').style.display='none';
       document.getElementById('MTOBook').style.display='none';
        document.getElementById('MTOPrice').style.display='none';
        document.getElementById('MTSProd').style.display='none';
        document.getElementById('MTSBook').style.display='none';
    }
}
function validateMTOBook(){
    var remember = document.getElementById('MTOBooking');
    if (remember.checked){
        document.getElementById('MTOBook').style.display='inline';
    }else{
       document.getElementById('MTOBook').style.display='none';
    }
}
function validateMTOPrice(){
    var remember = document.getElementById('MTOPricing');
    if (remember.checked){
        document.getElementById('MTOPrice').style.display='inline';
    }else{
       document.getElementById('MTOPrice').style.display='none';
    }
}
  function validateMTSProd(){
    var remember = document.getElementById('MTSProducts');
    if (remember.checked){
        document.getElementById('MTSProd').style.display='inline';
    }else{
       document.getElementById('MTSProd').style.display='none';
    }
}
 function validateMTSBook(){
    var remember = document.getElementById('MTSBookings');
    if (remember.checked){
        document.getElementById('MTSBook').style.display='inline';
    }else{
       document.getElementById('MTSBook').style.display='none';
    }
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
function InvalidMsgfile(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Please browse a photo file');
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
function InvalidMsgpan(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Please fill in this field');
    }
    else if(textbox.validity.patternMismatch){
        textbox.setCustomValidity('Please enter valid PAN number');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}
function InvalidMsgdate(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Please select date of birth');
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
	<form class="form-horizontal" method="post" action="upload.php" enctype="multipart/form-data" onSubmit="return validate();">
<div class="col-md-6">
    <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>Add Employee</strong></h3>
      
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
	
		 <label for="Salutation">Salutation*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                         <select id="Salutation" name="Salutation"  class="form-control" required="required" value="">
								<option value="" disabled selected hidden>Select Salutation</option>
								<option style="color:black;"value="Mr">Mr</option>
								<option style="color:black;"value="Miss">Miss</option>
								<option style="color:black;" value="Mrs">Mrs</option>
							</select>
                                        </div>
							
									<label for="FirstName">First Name*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                         <span class="input-group-addon"><img src="images/Serviceprovider.png"></img></span>
                                       <input  type="text"   id="first_name" name="first_name" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); "  placeholder="Enter first name" maxlength="50"  class="form-control" />
                                  </div>
								  <label for="LastName">Last Name*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                         <span class="input-group-addon"><img src="images/Serviceprovider.png"></img></span>
                                       <input  type="text"  id="last_name" name="last_name" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); "  placeholder="Enter last name" maxlength="50"  class="form-control" />
                                  </div> <center> <p style="color:red" id="msgdatebirth"></p></center>
								   <label for="DateofBirth">Date of Birth*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									<div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
										<input class="form-control" style="background-color: white;"  type="text" oninvalid="InvalidMsgdate(this);"  oninput="InvalidMsgdate(this);" required="required" placeholder="Select date of birth" name="date_of_birth" id="date_of_birth"  value="" size="16" >
										<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
                                    </div>
									 <label for="ContactPerson">Pan card Number*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                        <input maxlength="10" type="text" id="pancard_number" name="pancard_number"  pattern="[A-Z]{3}[P]{1}[A-Z]{1}[0-9]{4}[A-Z]{1}" required="required"  oninvalid="InvalidMsgpan(this);"  oninput="InvalidMsgpan(this);" onfocus="myFunction()" placeholder="Enter permanent account number" class="form-control"/>
                                    </div>
              
			 <label for="Address">Address*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                        <textarea type="text" id="address" name="address" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); " maxlength="200" placeholder="Enter employee address"  class="form-control" /></textarea>
                                        
                                    </div>
									 <label for="Email Address">Personal Email address*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                       <input type="email" maxlength="50" min="1" required="required"   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninvalid="InvalidMsgEmail(this);"  oninput="InvalidMsgEmail(this); " name="Email" id="Email"class="form-control"   placeholder="Enter email address" />
                                        
                                    </div>
 <label for="Mobile Number">Mobile Number*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                        <input type="text"  oninvalid="InvalidMsg(this);" maxlength="10"  oninput="InvalidMsg(this);" pattern="[0-9]{10}"  required="required" name="usrtel" id="usrtel" class="form-control" value="<?php echo $row['usrtel'];?>" placeholder="Enter mobile number" />                          
										</div>
                                   
 <label for="UploadPhoto*">Upload Photo*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                        <input id="photo" name="photo" class="input-file form-control" type="file" oninvalid="InvalidMsgfile(this);" required="required"  oninput="InvalidMsgfile(this); "  >
							</input>
                                    </div>
 <label for="Other Attachments">Other Attachments</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                        <input id="attachments" name="attachments" class="input-file form-control" type="file"  />
                                    </div>
									 <label for="goodscabEmailAddress">Goods CAB Email address*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                       <input type="email" maxlength="50" min="1" required="required"  id="Goodscab_email_id" name="Goodscab_email_id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninvalid="InvalidMsgEmail(this);"  oninput="InvalidMsgEmail(this); " class="form-control"  placeholder="Enter email address" />
                                        
                                    </div>
                                   <center><p style="color: red;" id="msgUsername" name="msgUsername" ></p></center>
                                        <label for="Username">Username*</label>
  <div style="margin-bottom: 12px" class="input-group">
										 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" name="username" oninvalid="InvalidMsgError(this);" required="required" oninput="InvalidMsgError(this); " id="username" maxlength="50" class="form-control" placeholder="Enter username" >         
                                    </div>
 <label for="password">Password*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input  minlength="5" maxlength="20" type="password" oninvalid="InvalidMsgError(this);" onfocusout="checkUsername()" oninput="InvalidMsgError(this); " required="required" class="form-control" onpaste="return false;" name="password" id="password"  value="" placeholder="Enter Password">
                                    </div>
                                    <center><p style="color: red;" id="msgPassword" name="msgPassword" ></p></center>
									 <label for="password">Confirm Password*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input  minlength="5" maxlength="20" type="password" oninvalid="InvalidMsgError(this);"  oninput="InvalidMsgError(this); " required="required" class="form-control" onpaste="return false;" name="rpassword" id="rpassword" value=""    onfocusout="checkPasswords()" placeholder="Re-enter password">
                                    </div>
                                    <!--  don`t touch -->
                                    <script type="text/javascript">

											function checkUsername(){
											
												var username = $("#username").val();
												var query = "SELECT * FROM employee_record WHERE username='"+username+"'";
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
                                    <!-- don`t touch -->
                                    
                                    	<!-- Multiple Checkboxes (inline) -->

  <label  for="checkboxes">Permission to Access Modules:</label>
  <div style="margin-bottom: 12px" class="input-group">
    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name="ShipmentBookings" id="ShipmentBookings" onclick="validate()" value="1">
      Shipment Bookings
    </label>
    <label class="checkbox-inline" for="checkboxes-1">
      <input type="checkbox" name="PackingSolution" id="PackingSolution" onclick="validatepack()" value="1">
     Packing Solution
    </label>
    <label class="checkbox-inline" for="checkboxes-2">
      <input type="checkbox" name="CargoInsurance" id="CargoInsurance" value="1">
   Cargo Insurance
    </label>
    <label class="checkbox-inline" for="checkboxes-3">
      <input type="checkbox" name="Documentation" id="Documentation" value="1">
     Documentation
    </label>

  </div>
  <div class="col-md-12" >
   <div  class="input-group" style="display:none;margin-bottom: 12px;" id="ship">
   <div class="col-md-6" >
    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name=" CreateBooking" id="CreateBooking" value="1">
     Create Booking
    </label>
    </div>
    <div class="col-md-6" >
    <label class="checkbox-inline" for="checkboxes-1">
      <input type="checkbox" name="ViewEditBooking" id="ViewEditBooking" value="1">
    View & Edit Booking
    </label>
    </div>
</div>
</div>

   <div style="display:none;margin-bottom: 12px;" id="pack" class="input-group">

    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name="MTOBooking" id="MTOBooking" onclick="validateMTOBook()"  value="1">
    MTO Booking
    </label>
    <label class="checkbox-inline" for="checkboxes-1">
      <input type="checkbox" name="MTOPricing" id="MTOPricing" onclick="validateMTOPrice()"  value="1">
MTO Pricing
    </label>
      <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name="MTSProducts" id="MTSProducts" onclick="validateMTSProd()"  value="1">
    MTS Products
    </label>
    <label class="checkbox-inline" for="checkboxes-1">
      <input type="checkbox" name="MTSBookings" id="MTSBookings" onclick="validateMTSBook()"  value="1">
MTS Bookings
    </label>
</div>
  <div class="col-md-12" >
  
   <div  class="input-group" style="display:none;margin-bottom: 12px;" id="MTOBook">
   <div class="col-md-6" >
    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name=" CreateMTOBooking" id="CreateMTOBooking" value="1">
     Create MTO Booking
    </label>
    </div>
    <div class="col-md-6" >
    <label class="checkbox-inline" for="checkboxes-1">
      <input type="checkbox" name="ViewEditMTOBooking" id="ViewEditMTOBooking" value="1">
    View & Edit MTO Booking
    </label>
    </div>
</div>
</div>
  <div class="col-md-12" >
   <div  class="input-group" style="display:none;margin-bottom: 12px;" id="MTOPrice">
   <div class="col-md-6" >
    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name="CreateMTOPricing" id="CreateMTOPricing" value="1">
    Create MTO Pricing
    </label>
    </div>
    <div class="col-md-6" >
    <label class="checkbox-inline" for="checkboxes-1">
      <input type="checkbox" name="ViewMTOPricing" id="ViewMTOPricing" value="1">
    View & Edit MTO Pricing
    </label>
    </div>
 
</div>
</div>
  <div class="col-md-12" >
   <div  class="input-group" style="display:none;margin-bottom: 12px;" id="MTSProd">
   <div class="col-md-6" >
    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name="CreateMTSProduct" id="CreateMTSProduct" value="1">
    Create MTS Product
    </label>
    </div>
    <div class="col-md-6" >
    <label class="checkbox-inline" for="checkboxes-1">
      <input type="checkbox" name="ViewEditMTSProduct" id="ViewEditMTSProduct" value="1">
    View & Edit MTS Product
    </label>
    </div>
</div>
</div>
  <div class="col-md-12" >
   <div  class="input-group" style="display:none;margin-bottom: 12px;" id="MTSBook">
   <div class="col-md-6" >
    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name="CreateMTSBookings" id="CreateMTSBookings" value="1">
     Create MTS Bookings
    </label>
    </div>
    <div class="col-md-6" >
    <label class="checkbox-inline" for="checkboxes-1">
      <input type="checkbox" name="ViewEditMTSBookings" id="ViewEditMTSBookings" value="1">
    View & Edit Booking
    </label>
    </div>
</div>
</div>
                                    <center><button  type="submit" style="margin-top:10px"  name="submit" id="submit" class="btn btn-default">Add</button></center>
                                  
                                    </div>
                                    
  
  

  </div>
</div>
<br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 ?>
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

        
<script type="text/javascript" src="jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
		startDate:new Date() 
    });
	$('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });

</script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy MM dd- hh:ii",
        autoclose: true,
        todayBtn: true,
        startDate: "today",
        minuteStep: 10
		minDate: 0
    });
	
</script> 
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy MM dd- hh:ii",
        autoclose: true,
        todayBtn: true,
        startDate: "",
        minuteStep: 10
		minDate: 0
    });
    </script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy MM dd- hh:ii",
        autoclose: true,
        todayBtn: true,
        startDate: "",
        minuteStep: 10
		minDate: 0
    });
    </script>
<script>
function myFunction() {
 document.getElementById("date_of_birth").setAttribute("required","required");
var x = document.getElementById("date_of_birth").value;
    
   var year = x.slice(0,4);
   var birthyear = parseInt(year);
   var date = new Date();
   var presentYear = date.getFullYear();
   presentYear = parseInt(presentYear);
var age = presentYear - birthyear;
  var y = document.getElementById("msgdatebirth");
   if(age  < 18){
    y.innerHTML= "Employee age should be above 18 years";
}else{ y.innerHTML= "";}
   
}
</script>
</body>
</html>