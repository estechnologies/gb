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
<?php


	
	function checkImage($name){
		if($name == ''){
			return "admin/customOrdersUploads/default.jpg";
		}else{
			return $name;
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>MyProfile</title>
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
td{width:50%;}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: middle;
        font-size: 16px;
    border-top: 1px solid #ddd;
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

	<div class="main"  >
	<div class="container" style="margin-top: 100px;margin-bottom: 100px;color:black;">
	 <table class="table table-striped table-bordered table-hover table-condensed">
<thead>
  <tr>
    	<th colspan="2">My Profile</th>
    </tr>
</thead>
    <tbody>
  
      <tr>
        <td>Employee Id: </td>
       	<td> <div ><?php echo $_SESSION['emp']['Employee_ID'];?></div></td>
       </tr>
       <tr>
        <td>Service Type: </td>
       <td><div > <?php echo $_SESSION['emp']['service_type']; ?></div></td>
       </tr>
       <tr>
        <td>Salutation: </td>
       <td><div > <?php echo  $_SESSION['emp']['Salutation'];?></div></td>
       </tr>
        <tr>
        <td>First Name: </td>
       	<td><div ><?php echo $_SESSION['emp']['first_name'];?> </div></td>
       </tr>
       <tr>
        <td>Last Name: </td>
       <td><div ><?php echo $_SESSION['emp']['last_name'];?> </div></td>
       </tr>
             <tr>
        <td>Username:</td>
       	<td><div ><?php echo $_SESSION['emp']['username'];?></div></td>
       </tr>
       <tr>
        <td>Date of birth:</td>
        <td><div > <?php echo $_SESSION['emp']['date_of_birth'];?></div></td>
       </tr>
    	 <tr>
        <td>Pan card number:</td>
       	<td> <div ><?php echo $_SESSION['emp']['pancard_number'];?></div></td>
       </tr>
       <tr>
        <td>Address:</td>
       <td><div > <?php echo $_SESSION['emp']['address'];?></div></td>
       </tr>
        <tr>
        <td>Personal email address:</td>
       	<td><div ><?php echo $_SESSION['emp']['email'];?></div></td>
       </tr>
       <tr>
        <td>Mobile number: </td>
       <td><div ><?php echo  $_SESSION['emp']['mobile'];?> </div></td>
       </tr>
             <tr>
        <td>Goods CAB Email address:</td>
       	<td><div > <?php echo $_SESSION['emp']['gemail'];?></div></td>
       </tr>
      
       
    </tbody>
  </table>
  <p>Please Contact Admin for any changes in the above information.</p>
	</div>
	</div>


<div class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php"  >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.html" >Terms & Privacy</a>

      </p>
      
     <p class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="t-blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>
     <script>
function InvalidMsg(textbox) {
    
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
</body>
</html>