<?php

	if(isset($_GET['pdid'])){
		$id = htmlspecialchars($_GET['pdid']);
		require 'packagingConnection.php';
		
		$database= new packagingConnection();
		
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
<style>
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color: #f1c40f;
    background-color: #f1c40f;
}
input {
    display: block;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #000;
    /* border-radius: 4px; */
    /* border-right-style: hidden; */
    /* border-top-style: hidden; */
    border-top-color: #040404;
    border-left-color: black;
    border-bottom-style: groove;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
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
   <li style="margin-right:20px;margin-top:10px;"><a href="index.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		 <li style="margin-right:20px;margin-top:10px;"><a  href="login.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li style="margin-right:10px;margin-top:10px;"><a  href="Registration.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-user"></span> Register</a></li>
       
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
  
	<div class="main" style="margin-top:20px;margin-bottom:100px;" >
	<div class="col-md-5">
	  <div class="col-md-12">
	<center><a href="#" class="pop">
<center><img src="<?php echo "admin/".checkImage($row['image0']); ?>" style="width: 400px; height: 264px;" border="2" class="img-thumbnail img-responsive"></center>
</a></center>
</div>
   <center> <div class="col-md-3">
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
</div></center>
</div>
 <form id="register-form" action="availableProductOrderUserBack.php" method="post" role="form" >
<div class="col-md-4">


    <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>Product Description</strong></h3>
      
  </div> </center> 
  
  <div class="panel-body">
  <p style=""><?php echo $row['productdescription'];?></p>
  </div>
</div>

</div>
<div class="col-md-3">

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

<center> <p style="color:red" id="moqAndquantity"></p></center>
	<label for="Quantity">Quantity*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><img src="images/quantity.png"></img></span>
		
		
		  <input type="number" name="quantity" id="quantity" min="0" onfocusout="checkMoq();" oninvalid="InvalidMsgError(this);"  oninput="InvalidMsgError(this);" placeholder="Quantity" required="required" class="form-control input-md">                                    
  </div>
	<label for="email">Email address*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
		<input  name= "email" id="email" maxlength="50"  class="form-control" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninvalid="InvalidMsgEmail(this);"  oninput="InvalidMsgEmail(this); " type="text" class="form-control" value="" placeholder="Enter Email Address">                                     
  </div>
	<label for="Mobilenumber">Mobile Number*</label>
  <div style="margin-bottom: 12px" class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
             <input type="text" name="number" id="number" tabindex="1" oninvalid="InvalidMsg(this);" maxlength="10" oninput="InvalidMsg(this);" required="required" class="form-control" pattern="[0-9]{10}" placeholder="Enter mobile number" value="">                                       
   </div>
 <input type="hidden" name="productId"  value="<?php echo $row['productcode'];?>"/> 
<input type="hidden" name="productname" value="<?php echo $row['productname'];?>" class="form-control input-md">  
<input type="hidden" name="unitPrice"  value="<?php echo $row['unitprice'];?>" class="form-control input-md"> 
<input type="hidden" name="moq" value="<?php echo $row['moq'];?>" class="form-control input-md"> 
<input type="hidden" name="leadTime" value="<?php echo $row['leadtime'];?>" class="form-control input-md"> 
<input type="hidden" name="productDescription" value="<?php echo $row['productdescription'];?>"class="form-control input-md"> 
<input type="hidden" name="url" value="<?echo 'AvailableProductsview.php?pdid='.$id;?>" class="form-control input-md"> 
 <center><button  style="margin-bottom: 120px" type="submit" class="btn btn-default">Order Now</button></center>
 </div>

</div>
</div>
</form>
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