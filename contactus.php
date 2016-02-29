<?php
	require 'connect.php';
	
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
 <title>Contact GoodsCAB</title>
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
	<style>
	body {padding-top:20px;}
input[type="submit"] {
color:white;
 background-color:black;
}
input[type="submit"]:hover {
    color:white;
    background-color:#333131;

}
	</style>
	<script>
	function InvalidMsg(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Please fill in this field');
    }
    else if(textbox.validity.patternMismatch){
        textbox.setCustomValidity('Please enter valid 10-digit mobile number.');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}function InvalidMsgEmail(textbox) {
    
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
function InvalidMsgfill(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Please fill in this field');
    }
    else if(textbox.validity.typeMismatch){
        textbox.setCustomValidity('');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}

	</script>
</head>
<body style="font-size: 16px; ">
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
        <li style="margin-right:10px;margin-top:10px;"><a href="Registration.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-user"></span> Register</a></li>
       
      </ul>
    </div>
  </div>
</nav>
	<div class="main" style="background-color:white;margin-top:100px;">
	<div class="container" >

	
	
	<div class="row">
	<div class="col-md-3">
	</div>
      <div class="col-md-6 ">
       <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>Contact Us</strong></h3>
      
  </div> </center> 
  
  <div class="panel-body">
   <form id="contact-form" action="contactus.php" method="post" >
   		           <?php 
	
		           if(isset($_POST['submit'])){
		           
		           
		           
		           	$database = new connect();
		           	$name = htmlspecialchars($_POST['name']);
		           	$email = htmlspecialchars($_POST['email']);
		           	$number = htmlspecialchars($_POST['number']);
		           	$comments = htmlspecialchars($_POST['comments']);
		           
		           	// checking all fields
		           	if(!empty($name) && !empty($email) && !empty($number) && !empty($comments)){
		           			
		           			
		           		// database  querying
		           		$query = "INSERT INTO messages(time,name,email,number,message)VALUES(NOW(),'$name','$email','$number','$comments')";
		           
		           		$result = $database->insertDatabase($query);
		           		if($result == true){
		           			
		           			
		           			?><div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <center> <label style="color:Green"><?php echo "Your message has been submitted.We will contact you shortly."?></label></center>
  </div>
		           					
		           					 <?php
		           		}else{
		           			?>
		           			<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <center> <label style="color:red"><?php echo "sorry,message not reached please contact."?></label></center> 
  </div>
		           			
		           			
		           		<?php
		           		}
		           	}else{
		           		?>
		           			           			<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <center> <label style="color:red"><?php echo "Please enter all the fields to submit the message."?></label></center> 
  </div>
		           		
		           		
		           	<?php
		           	}
		           }
	


?>

	
	 <label for="Name">Name*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		 <input id="name" name="name" required="required" maxlength="50" type="text" placeholder="Enter your name" oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);" class="form-control">
	</div>
	<label for="eEmail Address">Email Address*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
		<input id="email" name="email" type="email" placeholder="Enter your email address" maxlength="50"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninvalid="InvalidMsgEmail(this);"  required="required"  oninput="InvalidMsgEmail(this);" class="form-control">                                     
  </div>
	<label for="Mobilenumber">Mobile Number*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
              <input id="mobile" name="number" type="text"  pattern="[0-9]{10}"  oninvalid="InvalidMsg(this);" maxlength="10" oninput="InvalidMsg(this);" required="required" placeholder="Enter your mobile number " class="form-control">
              </div>                                      
  
 <label for="Message">Message*</label>
  <div style="margin-bottom: 12px" class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
     <textarea class="form-control" id="message" required="required"  name="comments" oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);" maxlength="200" rows="5" placeholder="Enter your message here" ></textarea>

  </div>
 
   
 <center><button style="margin-bottom: 12px" type="submit" name="submit" class="btn btn-default">Submit </button></center>
 </div>
</form>
  </div>
</div>
       
	</div>
 <div style="margin-bottom:100px">
  </div>

	<!-- Footer -->
      <div  class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php"  >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php">Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.html" >Terms & Privacy</a>

      </p>
      
    <p class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="t-blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>
    </body>
</html>