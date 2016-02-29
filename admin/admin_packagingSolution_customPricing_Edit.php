<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if(!isset($_SESSION['admin']['username'])){
		header("Location:index.php");
	}

require 'connect.php';
$database = new connect();


if(isset($_GET['cdid'])){
	require 'packagingConnection.php';
	
	$database =  new packagingConnection();
	
	$cdid = htmlspecialchars($_GET['cdid']);
	
	$query = "SELECT * FROM customDesignPricing WHERE cdid='$cdid'";
	$resultQuery = mysql_query($query);
	
	if(mysql_num_rows($resultQuery) == 0){
		echo "<script>alert('no id found');</script>";
	}else{
		$row = mysql_fetch_array($resultQuery);
	}
	
}

?>

	
	





<!DOCTYPE html>
<html lang="en">
<head>
 <title>Edit MTO Pricing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/goodscab.ico" type="image/x-icon" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
   <link href="css/logistics.css" rel="stylesheet">
   <script type="text/javascript" src="jquery-2.1.4.js"></script>
  <!-- Custom CSS -->
 
    <link href="css/index.css" rel="stylesheet">
<style>
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color: #f1c40f;
    background-color: #f1c40f;
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

 function lengthzero() {
    var x = document.getElementById("length");
    var y = document.getElementById("msgslength");
   if(x.value <= 0){
    y.innerHTML= "Length should be greater than zero";
}else if(x.value > 2000){ y.innerHTML= "Length should not exceed 2000 mm.";}
else{y.innerHTML= "";}
 }
 function widthzero() {
    var x = document.getElementById("width");
    var y = document.getElementById("msgswidth");
   if(x.value <= 0){
    y.innerHTML= "Width should be greater than zero";
}else if(x.value > 2000){ y.innerHTML= "Width should not exceed 2000 mm.";}
else{y.innerHTML= "";}
 }
  function quantityzero() {
    var x = document.getElementById("quantity");
    var y = document.getElementById("msgsquantity");
   if(x.value <= 5){
    y.innerHTML= "Quantity should be greater than 5";
}
else{y.innerHTML= "";}
 }
  function heightzero() {
    var x = document.getElementById("height");
    var y = document.getElementById("msgsheight");
   if(x.value <= 0){
    y.innerHTML= "Height should be greater than zero";
}else if(x.value > 2000){ y.innerHTML= "Height should not exceed 2000 mm.";}
else{y.innerHTML= "";}
 }
 $(function() {
  $('#lenghts').on('keydown', '#length', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
$(function() {
  $('#widths').on('keydown', '#width', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
$(function() {
	 $("#quantity").blur(function (e) {
        var value = this.value.replace(/\$/g,"");
        var dotPos = value.indexOf(".");
        var dollars = dotPos>-1?value.substring(0,dotPos):value;
        $(this).val(dollars+"");
      });
      
      $("#quantity").blur();
  $('#quantitys').on('keydown', '#quantity', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
$(function() {
  $('#heights').on('keydown', '#height', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
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
 
    cell1.innerHTML="<input id='browser' name='browser"+j+"' class='form-control' type='file'/>";
   
    cell2.innerHTML="<input type='button' name='addRow["+ j + "]' class='add' onclick=\"contact_number(" + (j+1) + ")\" value='+' />";
	}
};

 function checkButton(){
   document.getElementById('browsers').style.display='inline'

}
 function checkButton1(){
   document.getElementById('browsers').style.display='none'

}

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
   <li style="margin-right:20px;margin-top:10px;"><a href="admin.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		 <li style="margin-right:20px;margin-top:10px;"><a  href="logout.php" class="navbar-btn btn-default btn pull-right"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
       
      </ul>
    </div>
  </div>
</nav>

  
	<div class="main" style="margin-top: 100px;" >
       
		<div class="container" style="margin-bottom:120px;">
			<div class="col-md-6">
			 <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>Edit MTO Pricing</strong></h3>
      
  </div> </center> 
  
  <div class="panel-body">
   
  <center></center>
		 <center></center>

		 <form action="adminCustomDesignPriceEditback.php" method="post" enctype="multipart/form-data">

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
		<label for="Pricing id">Pricing id*</label> 
  <div style="margin-bottom: 12px" id="lenghts" class="input-group">
									
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                        <input  id="Pricingid" name="Pricingid" type="text" required="required" readonly oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);"  placeholder="Enter Pricing id" value="<?php echo $cdid; ?>" class="form-control input-md">
                                        
                                    </div>
             <center> <p style="color:red" id="msgslength"></p></center>
			 
                                    <label for="MaterialType">Material Type*</label>
  <div style="margin-bottom: 12px" id="shipsment" class="input-group">
									 
									 
									 <?php 
									 
									 	$material = $row['material'];
									 
									 ?>
                                       <span class="input-group-addon"><img src="images/materialbox.png"></img></span>
                                        <input name="cdid" type="hidden" value="<?php echo $cdid; ?>" />
                                        <select id="material" name="material" value="<?php echo $row['material'];?>" required="required" oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);"  class="form-control">
									    <option value="" hidden>Select Material type</option>
									      <option <?php if($material == '150 GSM'){echo 'selected';}?> value="150 GSM">150 GSM</option>
									      <option <?php if($material == '180 GSM'){echo 'selected';}?> value="180 GSM">180 GSM</option>
									    </select>
                                      </div>
                               
 <label for="Thickness">Thickness*</label>
                            <div style="margin-bottom: 12px" id="packsage" class="input-group">
                            
                            <?php 
                            	
                            		$thickness = $row['thickness'];
                            ?>
                            
                                        <span class="input-group-addon"><img src="images/thickness.png"></img></span>
                                        <select id="thickness" name="thickness"  required="required" oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);" class="form-control">
									    <option value=""  hidden>Select thickness</option>
									      <option <?php if($thickness == '3 PLY'){echo 'selected';}?> value="3 PLY">3 PLY</option>
									      <option <?php if($thickness == '5 PLY'){echo 'selected';}?> value="5 PLY">5 PLY</option>
									      <option <?php if($thickness == '7 PLY'){echo 'selected';}?> value="7 PLY">7 PLY</option>
									    </select>
                                    </div>
									
							 <label for="Price">Price*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><img src="images/price-tag.png"></img></span>
                                       <input id="Price" name="Price" type="text" placeholder="Enter Price in Rupees" value="<?php echo $row['price'];?>" required="required" oninvalid="InvalidMsgfill(this);"  oninput="InvalidMsgfill(this);" maxlength="10" class="form-control input-md">
                                        
                               </div>
                                    <center><button  type="submit"  name="submit" id="submit" style="width:auto;" class="btn btn-default">Update Pricing</button></center>
                                  
                                    </div>
                    </form>  
  </div>
</div>

		</div>
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
	  </body>
</html>