<?php

	session_start();


 if (isset($_SESSION['id']['username'])) {
        header('Location:main.php');
    }

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register with GoodsCAB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/images/goodscab.ico" type="image/x-icon" />
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="src/jquery.floating-social-share.css" />
 <style>
@media (max-width:1500px) {
.panel-default {
    border-color: #ddd;
    margin-bottom: 90px;
}}
@media (max-width:990px) {
.panel-default {
    border-color: #ddd;
    margin-bottom: 137px;}
body{overflow-y:visible;}}
@media (max-width:668px) { body{overflow-y:visible;}
.panel-default {
    border-color: #ddd;
    margin-bottom: 150px; 
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
		 <li style="margin-right:20px;"><a href="index.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        
       
      </ul>
    </div>
  </div>
</nav>
<div class="container" style="margin-top:100px">
<div class="col-md-3">
</div>


<div class="col-md-6 ">
    <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>REGISTER</strong></h3>
      
  </div> </center> 
  
  <div class="panel-body">
   <form id="register-form" action="email3.php" method="post" role="form" >
 <center><?php 
	


	

		if(isset($_GET['msg1'])){
			
			$msg1 = $_GET['msg1'];
			$httphost = $_SERVER['HTTP_HOST'];
			$link = "http://$httphost/"."popup.php?msg=$msg";
			//echo "<script>window.open('$link','popup','width=400,height=200,scrollbar=yes' );</script>";
			//echo "<script>window.open('$link')</script>";
			?>
			<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <center class="message"> <label style="font-size: 14px;color:Red;"><?php echo $msg1;?></label></center> 
  </div>
		 <?php	
		}?></center>
		 <center><?php 
		

		if(isset($_GET['msg'])){
			
			$msg = $_GET['msg'];
			$httphost = $_SERVER['HTTP_HOST'];
			$link = "http://$httphost/"."popup.php?msg=$msg";
			//echo "<script>window.open('$link','popup','width=400,height=200,scrollbar=yes' );</script>";
			//echo "<script>window.open('$link')</script>";
			?>
		<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <center class="message"> <label style="font-size: 14px;color:green;"><?php echo $msg;?></label></center>
  </div>
		 <?php	
		}?></center>
	 <label for="Username">Username*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input type="text" name="username" id="username" maxlength="50" minlength="4" oninvalid="InvalidMsglength(this);"  oninput="InvalidMsglength(this);" required="required" tabindex="1" class="form-control" placeholder="Enter username" value="">
	</div>
	<label for="email">Email address*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
		<input  name= "email1" id="email1" maxlength="50"  class="form-control" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninvalid="InvalidMsgEmail(this);"  oninput="InvalidMsgEmail(this); " type="text" class="form-control"  value="" placeholder="Enter Email Address">                                     
  </div>
	<label for="Mobilenumber">Mobile Number*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
             <input type="text" name="number" id="number" tabindex="1" oninvalid="InvalidMsg(this);" maxlength="10" oninput="InvalidMsg(this);" required="required" class="form-control" pattern="[0-9]{10}" placeholder="Enter mobile number" value="">                                       
  </div>
 <label for="password">Password*</label>
  <div style="margin-bottom: 12px" class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
     <input type="password" minlength="6" maxlength="20" name="password1" id="password" required="required" onpaste="return false;" tabindex="2" class="form-control"  oninvalid="InvalidMsglength(this);"  oninput="InvalidMsglength(this);" placeholder="Enter password">

  </div>
   <label for="password">Confirm Password*</label>
  <div style="margin-bottom: 12px" class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input type="password" minlength="6" maxlength="20" name="password2" id="confirm-password" onpaste="return false;" required="required" tabindex="2" oninvalid="InvalidMsglength(this);"  oninput="InvalidMsglength(this);" class="form-control"  placeholder="Re-enter password">
  </div>
 <center><button style="margin-bottom: 12px;width:115px;" type="submit" class="btn btn-default">Register Now</button></center>
 </div>
</form>
  </div>
</div>
</div>
</div>
<div class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php" target="_blank" >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" target="_blank">Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.html" target="_blank">Terms & Privacy</a>

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
function InvalidMsgEmail(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Please fill in this field');
    }
    else if(textbox.validity.patternMismatch){
        textbox.setCustomValidity('Please enter a valid email address');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}


</script>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>