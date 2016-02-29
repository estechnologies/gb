<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
	header('Location:index.php');
}else if($_SESSION['emp']['mtsbookingeditAccess'] != '1' or $_SESSION['emp']['mtsbookingsAccess'] != '1'){
	header('Location:main.php');
}


require 'connect.php';

	$database = new connect();

?><?php


	

	if(isset($_GET['id'])){
		$getId = htmlspecialchars($_GET['id']);
		
		
		require 'packagingConnection.php';
		
		$database =  new packagingConnection();
		
		$getQuery = "SELECT * FROM productOrders WHERE pdoId='$getId'";
		$getResults = mysql_query($getQuery);
		
		
		if(mysql_num_rows($getResults) != 0){
			$row = mysql_fetch_array($getResults);
		}else{
			echo "<script>alert('id not found');</script>";
		}
		
	}



?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Edit MTS Bookings</title>
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
    a{color:black;}
    </style>
    <script>
    
function delRow(currElement) {
     var parentRowIndex = currElement.parentNode.parentNode.rowIndex;
     document.getElementById("contactsno").deleteRow(parentRowIndex);
}


    function contact_number(j)
{
if(j<5){
    if (j <= document.getElementById("contactsno").rows.length) {
        for (var i= document.getElementById("contactsno").rows.length; i>j ;i--) {
            var elName = "addRow[" + i + "]";
            var newName = "addRow[" + (i+1) + "]";
            var newClick = "displayResult(" + (i+1) + ")";
            var modEl = document.getElementsByName(elName);

            modEl.setAttribute("onclick", newClick);
            document.getElementsByName("addRow[" + i + "]").setAttribute('name', "addRow[" + (i+1) + "]");
        }
    }
    var table=document.getElementById("contactsno");
    var row=table.insertRow(j);
    var cell1=row.insertCell(0);
    var cell2=row.insertCell(1);
  var cell3=row.insertCell(2);
    cell1.innerHTML="<input id='browser' name='browser"+j+"' class='form-control' type='file'/>";
   
    cell2.innerHTML="<input type='button' name='addRow["+ j + "]' class='add' onclick=\"contact_number(" + (j+1) + ")\" value='+' />";
   cell3.innerHTML="<input type='button' value='x' onclick=\"delRow(this)\"/>";
	}
};

</script>	
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
	 <div class="col-md-6">
			 <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>Edit MTS Product</strong></h3>
      
  </div> </center> 
  
  <div class="panel-body">
   
  <center></center>
		 <center></center>

		 <form class="form-horizontal" action="empMtsEditBookingBack.php" method="post" enctype="multipart/form-data">
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
		<label for="Productbookingid">Product Booking Id*</label> 
  <div style="margin-bottom: 12px" id="lenghts" class="input-group">
									
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                       
                                        <input  id="productbookingid" name="productbookingid" type="text" required="required" readonly oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);"  maxlength="200" placeholder="Enter Product name" value="<?php echo $row['pdoId'];?>"class="form-control input-md">
                                        
                                    </div>
			 <label for="ProductName">Product Name*</label> 
  <div style="margin-bottom: 12px" id="lenghts" class="input-group">
									
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                        <input  id="productName" name="productName" type="text" required="required" readonly oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);"  maxlength="200" placeholder="Enter Product name" value="<?php echo $row['productname'];?>"class="form-control input-md">
                                        
                                    </div>
                                 
 <label for="productCode">Product Code*</label>
                            <div style="margin-bottom: 12px" id="widths" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                       <input id="productCode" name="productCode" type="text" placeholder="Enter Product code" readonly required="required" oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);"  maxlength="50"  value="<?php echo $row['productCode'];?>" class="form-control input-md">
                                    </div>
                 <center> <p style="color:red" id="msgsheight"></p></center>                  
 <label for="producDescription">Product Description*</label>
                            <div style="margin-bottom: 12px" id="heights" class="input-group">
							 <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                       <input id="producDescription" name="producDescription" readonly type="text" placeholder="Enter Product description" maxlength="300" required="required" oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);"   value="<?php echo $row['productDescription'];?>" class="form-control input-md">
                                    </div>
									<label for="Quantity">Quantity*</label>
  <div style="margin-bottom: 12px" id="quantitys" class="input-group">
									 
                                        <span class="input-group-addon"><img src="images/quantity.png"></img></span>
                                        <input id="quantity" name="quantity" type="text" placeholder="Enter Quantity" readonly required="required" oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);" value="<?php echo $row['quantity'];?>" class="form-control input-md">
							
                                    </div>
                                      <div id="unitPrices">
									 <label for="unitPrice">Unit price*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><img src="images/price-tag.png"></img></span>
                                        <input id="unitPrice" name="unitPrice" type="text" placeholder="Enter Unit Price" readonly maxlength="10" value="<?php echo $row['unitprice'];?>" required="required" oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);" class="form-control input-md">                         
										
                            </div>
                            </div>
							 <label for="netamount">Net Amount*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><img src="images/price-tag.png"></img></span>
                                       <input id="Total" name="Total"  type="text" placeholder="Enter Net Amount" value="<?php echo $row['total'];?>" readonly required="required" oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);" class="form-control input-md">
                                        
                               </div>
					<label for="Status">Status*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                       <span class="input-group-addon"><img src="images/status.png"></img></span>
                                       <!-- status selected -->
                                       <?php 
                                       			
                                       			$status = $row['status'];
                                       ?>
                                       
                                        <select id="status" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); "  name="status"  class="form-control" >
								<option value=""  hidden>Select Status</option>
								<option style="color:black;" <?php if($status == 'Confirmation Pending'){echo  'selected';}?> value="Confirmation Pending">Confirmation Pending</option>
								<option style="color:black;" <?php if($status == 'Under Negotiations'){echo  'selected';}?>  value="Under Negotiations">Under Negotiations</option>
								<option style="color:black;"<?php if($status == 'Confirmed'){echo  'selected';}?> value="Confirmed">Confirmed</option>
								<option style="color:black;" <?php if($status == 'Under Execution'){echo  'selected';}?> value="Under Execution">Under Execution</option>
								<option style="color:black;"<?php if($status == 'Completed'){echo  'selected';}?> value="Completed">Completed</option>
								<option style="color:black;"<?php if($status == 'Cancelled'){echo  'selected';}?> value="Cancelled">Cancelled</option>
							</select>
                                    </div>
                                      <label for="References">References*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><img src="images/Reference.png"></img></span>
                                       <input  type="text"  id="References" oninvalid="InvalidMsgError(this);" required="required"  oninput="InvalidMsgError(this); " placeholder="Enter references" maxlength="100" name="reference"  value="<?php echo $row['reference'];?>" class="form-control" />
                                  </div>		   
                                    
                                    <center><button  type="submit"  name="submit" id="submit" style="width:auto" class="btn btn-default">Update Product Booking</button></center>
                                  
                                    </div>
                    </form>  
                    
                    
                  
  </div>
</div>
	</div>
	</div>

<div style="margin-bottom:100px;">
</div>
<div class="navbar navbar-default navbar-fixed-bottom">
      <p class="footer navbar-text pull-left">
          	<a href="aboutus.php"  >About us</a>&nbsp;&nbsp; |&nbsp;
			<a href="contactus.php" >Contact</a>&nbsp;&nbsp;|&nbsp;
			<a href="Terms_Privac.php" >Terms & Privacy</a>

      </p>
      
      <p  class="footer navbar-text pull-right">All Rights Reserved - 2016. <a target="t-blank" href="http://www.yodhaa.com">Yodhaa Business Solutions Pvt Ltd. </a></p>
    </div>



    </div>
   <!-- /.container -->


<script>
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
 <script>

$(function() {
  $('#unitPrices').on('keydown', '#unitPrice', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
$(function() {
  $('#moqs').on('keydown', '#MOQ', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
</script>
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
</body>
</html>