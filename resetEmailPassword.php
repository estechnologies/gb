<?php

 require 'connect.php';
 
 $database = new connect();
 
 
 

	if(isset($_GET['link'])){
		$id = htmlspecialchars($_GET['link']);
		
		$query = "SELECT * FROM forgot WHERE id='$id' AND validTime >= NOW()";
		$resultQuery = mysql_query($query);
		
			if(mysql_num_rows($resultQuery) != 0){
				while($row = mysql_fetch_array($resultQuery)){
					$email = $row['email'];
				}
			}else{
				header("Location:resetEmailPassword.php?msg= Sorry time out. Please try again");
			}
			
		
	
		
	}
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
    <link href="css/registration.css" rel="stylesheet">
       <link href="css/index.css" rel="stylesheet">
  </head>
  <body style="font-size: 15px;">
	
		
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

	<div class="main" style="background-color:white;margin-top: -50px;">
	 <div class="container" >
		
	
			<div class="row">
		
				<div class="col-md-6 col-md-offset-3" style="margin-top: 75px;">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12">
									<a href="#" class="active" id="Employee-form-link">Reset Password</a>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
							
								<div class="col-lg-12">
									<form id="Employee-form" action="resetPasswordEmailBack.php" method="POST" role="form" style="display: block;">
									<center><?php 
	


	

		if(isset($_GET['msg'])){
			
			$msg = $_GET['msg'];
			$email = $_GET['email'];
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
		<label for="email">Email address*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
		<input type="text" readonly name="email" id="email" value="<?php echo $email;?>" tabindex="2" class="form-control" placeholder="Email">                                    
  </div>
  <label for="password">Password*</label>
  <div style="margin-bottom: 12px" class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
     <input  minlength="5"  maxlength="20" type="password" required="required"  name="password1" required id="password" tabindex="2" class="form-control" placeholder="Enter new password">

  </div>
   <label for="password">Confirm Password*</label>
  <div style="margin-bottom: 12px" class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input  minlength="5" maxlength="20" type="password" required="required" name="password2" id="password2" tabindex="2" class="form-control" minlenght="6" placeholder="Re-enter new password">
  </div>
										
	 <center><button style="margin-bottom: 12px" type="submit" name="login-submit" id="login-submit" class="btn btn-default">Reset</button></center>							
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div><!--/#contact-page-->
	<!-- Footer -->
   <div class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php"  >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.html" >Terms & Privacy</a>

      </p>
      
     <p class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="t-blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>
	
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
 <script>
function InvalidMsgEmail(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Please fill in this field');
    }
    else if(textbox.validity.patternMismatch){
        textbox.setCustomValidity('please enter a valid email address');
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