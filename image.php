<?php



	
	if(isset($_GET['pdid'])){
		$id = htmlspecialchars($_GET['pdid']);
		require 'packagingConnection.php';
		$database = new packagingConnection();
		
		$query = "SELECT * FROM products WHERE productcode='$id'";
		$resultQuery = mysql_query($query);
		
		$row = mysql_fetch_array($resultQuery);
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
   <link href="css/logistics.css" rel="stylesheet">
  <!-- Custom CSS -->
   <link href="css/style.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
<style>

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
  <body style="font-size:16px;font-family:calibri;color:black;">
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
  
	<div class="main" style="margin-top:100px;" >
	<div class="container">
	<div class="col-md-6">
	  <div class="col-md-12">
	<a href="#" class="pop">
<center><img src="<?php echo "admin/".$row['image0']; ?>" style="width: 400px; height: 264px;" class="img-responsive"></center>
</a>
</div>
   
   <div class="col-md-3">
<a href="#" class="pop">
   <center>   <img src="<?php echo "admin/".$row['image1']; ?>" style="width: 100px; height: 100px;"> </center> 
</a>
</div>
   <div class="col-md-3">
<a href="#" class="pop">
    <center>  <img src="<?php echo "admin/".$row['image2']; ?>" style="width: 100px; height: 100px;"> </center> 
</a>
</div>
   <div class="col-md-3">
<a href="#" class="pop">
    <center>  <img src="<?php echo "admin/".$row['image3']; ?>" style="width: 100px; height: 100px;"> </center> 
</a>
</div>
   <div class="col-md-3">
<a href="#" class="pop">
    <center>  <img src="<?php echo "admin/".$row['image4']; ?>" style="width: 100px; height: 100px;"> </center> 
</a>
</div>
</div>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" data-dismiss="modal">
    <div class="modal-content"  >              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 70%;" >
      </div> 
      <div class="modal-footer">
          <div class="col-xs-12">
               <p class="text-left">1. line of description<br>2. line of description <br>3. line of description</p>

          </div>

      </div>
	 </div>
          
          
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
      
    <p  class="footer navbar-text pull-right">All Rights Reserved - 2016. <a href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
	<script src="js/wow.min.js"></script>
	<script src="js/functions.js"></script>
	  </body>
</html>