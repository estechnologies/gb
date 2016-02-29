<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
	header('Location:index.php');
}else if($_SESSION['emp']['mtsbookingeditAccess'] != '1'or $_SESSION['emp']['mtsbookingsAccess'] != '1'){
	header('Location:main.php');
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
 <title>View MTS Bookings</title>
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
td,th{     vertical-align: middle;text-align: center;padding: 15px;}

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: middle;
        font-size: 16px;
    border-top: 1px solid #ddd;
}
	th {
    white-space: nowrap;
}
	td {
    white-space: nowrap;
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
	<div class="container" style="margin-top: 100px;margin-bottom: 150px;color:black;">
		<?php
		
		require 'packagingConnection.php';
		
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
											
											$query="SELECT * FROM productOrders ORDER BY pdoId DESC LIMIT $pageNumber,5";
											if(isset($_POST['search'])){
											
												$search_term = htmlspecialchars($_POST['search_box']);
											
											
											
												
												$query = "SELECT * FROM productOrders WHERE pdoId ='$search_term' LIMIT $pageNumber,5";
											
												$checkQuery= mysql_query($query);
												if(mysql_num_rows($checkQuery) <= 0){
													$noFound= "Entered Product Booking Id is not found in our records.";
												}else{
													$noFound = "";
												}
											
											}
											
											
											if(isset($_POST['reset'])){
											
												$query = "SELECT * FROM productOrders ORDER BY pdoId DESC LIMIT $pageNumber,5";
											
											
											}
											
											
											$resultQuery = mysql_query($query);
											
											
											/*
											 *page number counts
											 */
											
											
											$pagesTotalCount = "SELECT * FROM productOrders";
											
											$resultPagesTotalCount = mysql_query($pagesTotalCount);
											$pages = mysql_num_rows($resultPagesTotalCount);
											
											if(isset($_POST['search'])){
												$pages = mysql_num_rows($resultQuery);
											}
												
											$pageCount = floatval($pages/5);
											$pageCount = ceil($pageCount);
											
											?>
							 				
											 <form name="search_form" method="POST" action="MTSBookingsView.php">
											 <div class="container" style="margin-top:20px;">
											 <h3 style="margin-bottom:20px;"><b>MTS Bookings list</b></h3>
												<div class="row">
												
													<div class="col-md-3">
													<div class="search">
											<input type="text" name="search_box" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" placeholder="Enter Product Booking Id" class="form-control input-sm" maxlength="8"  />
											</div>
											</div>
											<div class="col-md-1">
											<button type="submit" style="width:100px;" name="search" class="btn btn-default" value="">Search</button>
											</div>
											</form>
											<form name="search_form" method="POST" action="MTSBookingsView.php">
											<div class="col-md-1">
											<button type="submit" name="reset" style="width:100px;"  class="btn btn-default" value="">Reset</button>
											</div>
											</div>
											</div>
											 </form>
											 <div class="table-responsive" style="margin-top:20px;">
						<table class="table table-striped table-hover table-condensed">							 
						     <thead>
      <tr>
       <th ><strong>Edit</strong></th> 
								 <th ><strong>Product Booking Id</strong></th>
								   <th ><strong>Product Name</strong></th> 
								   <th> <strong>Description</strong></th>
								    <th ><strong>Quantity</strong></th>  
								   <th> <strong>Unit Price</strong> </th>
								   <th ><strong>Total</strong></th> 
								   <th><strong>Email Address</strong></th> 
								   <th ><strong>Mobile Number</strong></th> 
								   <th><strong>Status</strong></th> 
								    <th><strong>Reference</strong></th>
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
							
							for($a = 0; $a <= 9 ; $a++){
								echo "<td></td>";
							}
							
								}
				}
			?>
    
								 <?php while($row = mysql_fetch_array($resultQuery)){ ?>
							<tr>
								<td><a href="MTSBookingsEdit.php?id=<?php echo $row['pdoId'];?>">Edit</a></td>
								 <td><?php echo $row['pdoId'];?></td> 
								 <td><?php echo $row['productname'];?></td>
								 <td><?php echo $row['productDescription'];?></td> 
								 <td><?php echo $row['quantity'];?></td> 
								  <td><?php echo $row['unitprice'];?></td>
								  <td><?php echo $row['total'];?></td>
								 <td><?php echo $row['email'];?></td>
								 <td><?php echo $row['mobile'];?></td>
								<td><?php echo $row['status'];?></td>
								 <td><?php echo $row['reference'];?></td>

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
            		?>  <li><a href="MTSBookingsView.php?page=<?php echo $i;?>"><?php  echo $i; ?></a></li> <?php 
            	}
            
            ?>
            
            
        </ul>
										</div>	
	</div>
	</div>

<div style="margin-top:100px;">
</div>
<div class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php"  >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privacy.php" >Terms & Privacy</a>

      </p>
      
     <p class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="_blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
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