
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Goods CAB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Custom CSS -->
   <link href="css/style.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
	<style>
	body {padding-top:20px;}
	</style>
</head>
<body style="height:300px;width:300px;font-family:cambria;color:black">

  <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
               
                <div id="logoimage" ><img src="images/GoodsCAB_logo.png"></div>
            </div>

            
            <!-- /.navbar-collapse -->
        
        <!-- /.container-fluid -->
    </nav>
	<div class="main" style="margin-top: 75px;" >
	<div class="container">
	<div class="row">
      <div class="col-md-12">
      
      
      <!-- message -->
      
   <center>   
<?php 
		
		
	if(isset($_GET['msg'])){
		//echo "<script>alert('comming');</script>";
		$msg = $_GET['msg'];
		echo "<p>$msg</p>";
	}
	
	
	

?></center>
      </div>
	</div>
</div>
	</div>
<!-- Footer -->
     
</body>
</html>