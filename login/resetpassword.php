<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
	header('Location:index.php');
}


require 'connect.php';

	$database = new connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Goods CAB Reset Password</title>
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
    <link href="css/registration.css" rel="stylesheet">

<style>
.message label a{ color: black;
    text-decoration: underline;}
.btn{background: black; color: white;border-color: #080808;}
.btn:focus,
.btn:active,
.btn.active,
.btn:hover
{
  background-color: #F1C40F;
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
		<div class="main"  style="margin-top:30px;">
	   <div style="font-family:cambria;color:black;" >
			
		 <div class="container" >
		 	<div class="col-md-3 ">
		 	</div>
	<div class="col-md-6 ">
       <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>Reset password</strong></h3>
      
  </div> </center> 
  
  <div class="panel-body">
   <form id="Employee-form" action="resetPasswordBack.php" method="POST" role="form >
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
						

	<label for="Email Address"><b>Email Address*</b></label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
		<input type="hidden" name="id" value="<?php echo $_SESSION['emp']['Employee_ID'];?>"/>
		<input id="email" name="email" type="email" placeholder="Enter your email address" maxlength="50" readonly  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninvalid="InvalidMsgEmail(this);"   oninput="InvalidMsgEmail(this);"  value="<?php echo $_SESSION['emp']['email'];?>"  class="form-control">                                     
  </div>
	                                    
  
														<label for="password">Current Password*</label>
  <div style="margin-bottom: 12px" class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
     <input type="password" minlength="6" maxlength="20" required name="oldPassword" id="password" tabindex="2" class="form-control" onpaste="return false;"  placeholder="Please Enter Current Password">			
	 </div>	
								
							 <label for="password">New Password*</label>
  <div style="margin-bottom: 12px" class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
     <input type="password" minlength="6" maxlength="20" required name="password1" id="password" tabindex="2" class="form-control" onpaste="return false;" placeholder="Please Enter New Password ">

  </div>
   <label for="password">Confirm New Password*</label>
  <div style="margin-bottom: 12px" class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input type="password" minlength="6" maxlength="20" required name="password2" id="password" tabindex="2" class="form-control" onpaste="return false;" placeholder="Please Re-enter New Password">
  </div>
 
   
<center><button style="margin-bottom: 12px;width:100px;" type="submit"  name="login-submit" id="login-submit" class="btn btn-default">Reset</button></center>
									
 </div>
</form>
  </div>
</div>
       
	</div>
			
		</div>
    </div></div><!--/#contact-page-->
	  <!-- Footer -->
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

	
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
<script src="content/js/jquery.min.js"></script>
<script src="content/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>

	
  </body>
</html>