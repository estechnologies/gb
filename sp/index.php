<?php
	if (isset($_SESSION['service_username'])) {
header('Location:main.php');
}


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
    <link href="css/registration.css" rel="stylesheet">
     <link href="css/index.css" rel="stylesheet">
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
		
       
      </ul>
    </div>
  </div>
</nav>
	<div class="container" style="margin-top:50px">
<div class="col-md-3">
</div>

<div class="col-md-6">
    <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>Service Provider Login</strong></h3>
      
  </div> </center> 
  
  <div class="panel-body">
<form id="Logistric-form" action="loginproc_home.php" method="POST" role="form" style="display: block;">
<center><?php 
	


	

		if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
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
              
			 <label for="Username">Username*</label>
  <div style="margin-bottom: 12px" class="input-group">
										 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" name="username" oninvalid="InvalidMsgError(this);" required="required" oninput="InvalidMsgError(this); " id="username" maxlength="50" class="form-control" placeholder="Enter username" >         
                                    </div>
 <label for="password">Password*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input  minlength="5" maxlength="20" type="password" oninvalid="InvalidMsgError(this);"  oninput="InvalidMsgError(this); " required="required" class="form-control" onpaste="return false;" name="password" id="password" placeholder="Enter password">
                                    </div>
                                    <center><button type="submit" name="login-submit" id="login-submit"  class="btn btn-default">Login</button></center>
                                   
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
			<a href="Terms_Privacy.php" target="_blank">Terms & Privacy</a>

      </p>
      
      <p class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="t-blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>
<script>
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
</script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>