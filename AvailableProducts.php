<?php
	require 'packagingConnection.php';
	
	
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
 <title>Goods CAB Product Details</title>
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
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color: #f1c40f;
    background-color: #f1c40f;
}
td,th{ text-align: center;padding: 15px;}
</style>
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


.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: middle;
        font-size: 16px;
    border-top: 1px solid #ddd;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #000000;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #000;
}
table{border: 1px solid #000;}
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
<body style="font-size: 16px;">
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
  
	<div class="main" style="background-color:white;margin-top:20px;">
	<div class="container" >

							<?php

							// databases
							$database = new packagingConnection();
							
							
							
							
							
							
							/*
							 * reteriving orders according search or whole
							 */
							$pageNumber = intval($_GET['page']);
							
							
							if($pageNumber == null or $pageNumber == '1'){
								$pageNumber = 0;
							}else{
								$pageNumber = ($pageNumber*5)-5;
							}
							
							$query = "SELECT * FROM products ORDER BY productId DESC LIMIT $pageNumber,5 ";
							if(isset($_POST['search'])){

$search_term = htmlspecialchars($_POST['search_box']);



$query = "SELECT * FROM products WHERE productcode ='$search_term' LIMIT $pageNumber,5";

$checkQuery= mysql_query($query);
if(mysql_num_rows($checkQuery) <= 0){
	$noFound= "Entered Product code is not found in our records.";
}else{
	$noFound = "";
}

}


							if(isset($_POST['reset'])){


			


$query = "SELECT * FROM products  ORDER BY productId DESC LIMIT $pageNumber,5 ";


}




$resultQuery = mysql_query($query);



								/*
								 *page number counts 
								 */


							$pagesTotalCount = "SELECT * FROM products";

							$resultPagesTotalCount = mysql_query($pagesTotalCount);
							$pages = mysql_num_rows($resultPagesTotalCount);

							if(isset($_POST['search'])){
								$pages = mysql_num_rows($resultQuery);
							}
							
							$pageCount = floatval($pages/5);
							$pageCount = ceil($pageCount);


							?>

							
							 <form name="search_form" method="POST" style="" action="AvailableProducts.php">
							  <b><h3 style="margin-bottom:30px">Available Products</h3></b>
							 <div class="container">
								<div class="row">
								
									<div class="col-md-3">
									<div class="search">
							<input type="text" name="search_box" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" class="form-control input-sm" maxlength="8" placeholder="Enter Product Code" />
							
								
								
							</div>
							</div>
							<div class="col-md-1">
							 <button type="submit"  name="search" style="width:100px;" class="btn btn-default">Search</button>							</div></form><form name="search_form" method="POST" style="" action="AvailableProducts.php">
							<div class="col-md-1">
							 <button type="submit" name="reset" style="width:100px;"  class="btn btn-default">Reset</button>
							</div>
							</div>
							</div>
							 </form>
							 <div class="table-responsive" style="margin-top:20px;">
							 <table class="table table-striped"  id="someid">
			<thead>
			  <tr>
			  					<th ><strong>Product Image</strong></th>
								 <th ><strong>Product Name</strong></th> 
								 <th><strong>Product Code</strong> </th> 
								   
								   <th> <strong>View</strong></th> 
								 </tr>
			</thead>
			<tbody>
			
			<?php 
			/*
			 *if no found isset 
			 */
				if(isset($noFound)){
							 if(mysql_num_rows($resultQuery) <= 0){
							echo "<td style='font-size: 14px;color:Red;'>$noFound</td> ";
							echo  "<td></td><td></td><td></td>";
								}
				}
			?>
			
			
			 <?php while($row = mysql_fetch_array($resultQuery)){ ?>
							<tr> <td>  <center>  <a href="AvailableProductsview.php?pdid=<?php echo $row['productcode']?>"> <img src="<?php echo "admin/".checkImage($row['image0']); ?>" class="img-thumbnail" style="width: 80px; height: 80px;"> </a></center> </td>
								 <td><a href="AvailableProductsview.php?pdid=<?php echo $row['productcode']?>"><?php echo $row['productname'];?></a></td> 
								 <td><a href="AvailableProductsview.php?pdid=<?php echo $row['productcode']?>"><?php echo $row['productcode'];?></a></td>
								 
								  <td><a href="AvailableProductsview.php?pdid=<?php echo $row['productcode']?>">View Details</a></td>
							</tr>
							  
								 <?php } ?>
			</tbody>
		  </table>
		    <ul class="pagination pull-right" >
        
        <!--
        
        	pagnation reference
        	
        	  
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
            
            
            -->
            <?php 
            
            	for($i = 1;$i <= $pageCount; $i++){
            		?>  <li><a href="AvailableProducts.php?page=<?php echo $i;?>"><?php  echo $i; ?></a></li> <?php 
            	}
            
            ?>
            
            
        </ul>
	</div>
	</div>
	
			   <div>
      
    </div>
	</div>
	
	
 <div style="margin-bottom:150px">
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