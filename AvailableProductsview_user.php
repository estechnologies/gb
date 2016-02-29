<?php

// Inialize session
session_start();
require 'packagingConnection.php';

$database = new packagingConnection();

// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['id']['username'])) {
header('Location:index.php');
}

?>
<?php

	if(isset($_GET['pdid'])){
		$id = htmlspecialchars($_GET['pdid']);
		
		
		
		$query = "SELECT * FROM products WHERE productcode='$id'";
		$resultQuery = mysql_query($query);
		
		$row = mysql_fetch_array($resultQuery);
	}
	
	
	function checkImage($name){
		if($name == ''){
			return "customOrdersUploads/default.jpg";
		}else{
			return $name;
		}
	}


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
    <script type="text/javascript" src="jquery-2.1.4.js"></script>
   <link href="css/logistics.css" rel="stylesheet">
  <!-- Custom CSS -->
   <link href="css/style.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
<style>
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color: #f1c40f;
    background-color: #f1c40f;
}

</style>
 <script>
 $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});
</script>
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
<nav style="margin-top: 100px;"  class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="my">
      <ul class="nav nav-pills">
 
	<li class="headerlinks"  ><a style=""  href="PackingSolutions.php" >Store</a></li>
  </ul>
    </div>
  </div>
</nav>
  
	<div class="main" style="margin-top:20px;" >
	<div class="container">
	
	<div class="col-md-6">
	  <div class="col-md-12">
	<center><a href="#" class="pop">
<center><img src="<?php echo "admin/".checkImage($row['image0']); ?>" style="width: 400px; height: 264px;" border="2" class="img-thumbnail img-responsive"></center>
</a></center>
</div>
    <div class="col-md-3">
<a href="#" class="pop">
   <center> <img src="<?php echo "admin/".checkImage($row['image1']); ?>" class="img-thumbnail" border="2" style=" margin-top:20px;width: 100px; height: 100px;"></center>
</a>
</div>
   <div class="col-md-3">
<a href="#" class="pop">
   <center>   <img src="<?php echo "admin/".checkImage($row['image2']); ?>" class="img-thumbnail" style="margin-top:20px;width: 100px; height: 100px;"> </center> 
</a>
</div>
   <div class="col-md-3">
<a href="#" class="pop">
    <center>  <img src="<?php echo "admin/".checkImage($row['image3']); ?>" class="img-thumbnail" style="margin-top:20px;width: 100px; height: 100px;"> </center> 
</a>
</div>
   <div class="col-md-3">
<a href="#" class="pop">
    <center>  <img src="<?php echo "admin/".checkImage($row['image4']); ?>" class="img-thumbnail" style="margin-top:20px;width: 100px; height: 100px;"> </center> 
</a>
</div>
</div>
<div class="col-md-6">


    <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>Product Details</strong></h3>
      
  </div> </center> 
  
  <div class="panel-body">
   <form id="register-form" action="availableProductOrderUserBack.php" method="post" role="form" >
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
   <p><b>Product Name :</b> <?php echo $row['productname'];?></p>
<p><b>Unit Price : </b><?php echo $row['unitprice'];?></p>
<p><b>MOQ :</b> <?php echo $row['moq'];?></p>
<p><b>Lead Time : </b><?php echo $row['leadtime'];?> </p>
<p><b>Product Description:</b> <?php echo $row['productdescription'];?></p>
<center> <p style="color:red" id="moqAndquantity"></p></center>
	<label for="Quantity">Quantity*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><img src="images/quantity.png"></img></span>
		  <input type="number" id="quantity"name="quantity" min="0"  onfocusout="checkMoq();" oninvalid="InvalidMsgError(this);"  oninput="InvalidMsgError(this);" placeholder="Quantity" required="required" class="form-control input-md">                                    
  </div>
	<label for="email">Email address*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
		<input  name= "email" id="email" maxlength="50"  class="form-control" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninvalid="InvalidMsgEmail(this);"  oninput="InvalidMsgEmail(this); " type="text" class="form-control" value="<?php echo $_SESSION['id']['email'];?>" placeholder="Enter Email Address">                                     
  </div>
	<label for="Mobilenumber">Mobile Number*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
             <input type="text" name="number" id="number" tabindex="1" oninvalid="InvalidMsg(this);" maxlength="10" oninput="InvalidMsg(this);" required="required" class="form-control" pattern="[0-9]{10}" placeholder="Enter mobile number" value="<?php echo $_SESSION['id']['mobile'];?>">                                       
  </div>
   <input type="hidden" name="productId"  value="<?php echo $row['productcode'];?>"/> 
<input type="hidden" name="productname" value="<?php echo $row['productname'];?>" class="form-control input-md">  
<input type="hidden" name="unitPrice"  value="<?php echo $row['unitprice'];?>" class="form-control input-md"> 
<input type="hidden" name="moq" value="<?php echo $row['moq'];?>" class="form-control input-md"> 
<input type="hidden" name="leadTime" value="<?php echo $row['leadtime'];?>" class="form-control input-md"> 
<input type="hidden" name="productDescription" value="<?php echo $row['productdescription'];?>"class="form-control input-md"> 
<input type="hidden" name="url" value="<?echo 'AvailableProductsview_user.php?pdid='.$id;?>" class="form-control input-md"> 
 <center><button  style="margin-bottom: 12px" type="submit" class="btn btn-default">Order Now</button></center>
 </div>
</form>
  </div>
</div>

</div>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" data-dismiss="modal">
    <div class="modal-content"  >              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width:80%; height: 400px;" >
      </div> 
     
	 </div>
	 
	 
	  <!--  checking moq condition -->
  <script type="text/javascript">

		function checkMoq(){
			
				var quantity = $("#quantity").val();
				var moq = "<?php echo $row['moq']; ?>";
				moq = parseInt(moq);
				if(moq > quantity){
					
					 document.getElementById("moqAndquantity").innerHTML = "Please enter Quantity more than or equal to MOQ";
				}else{
					document.getElementById("moqAndquantity").innerHTML = "";
				}
		}

   </script>
          
          
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
	<script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>
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
function InvalidMsgError(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('Please fill in this field');
    }
    else if(textbox.validity.typeMismatch){
        textbox.setCustomValidity('Please fill in this field');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}

</script>
 
	  </body>
</html>