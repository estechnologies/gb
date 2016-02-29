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
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
  <!-- Custom CSS -->
   <link href="css/style.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="./js/jquery.geocomplete.js"></script>
	<script src="./js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>
<style>
input[type="submit"]:hover{
    border: 1px solid #999;color:#000;
       background-color: #333030;
}
</style>
	
</head>
<body >

  <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div id="logoimage" ><img src="images/GoodsCAB_logo.png"></div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
           
            <!-- /.navbar-collapse -->
        
        <!-- /.container-fluid -->
    </nav>

	<div class="main" style="margin-top: 14px;">
	
		<div id="booking">
		<div class="container" style="margin-top:130px;">
			<div class="row" style="background-color:#f7f7f7;">
<?php
if(isset($_POST['submit']))
{
	require 'connect.php';
	
	$database = new connect();
	
	$date = htmlspecialchars($_POST['Drop_Time']);
	$shipmentType = htmlspecialchars($_POST['Shipment_Type']);
	$email = htmlspecialchars($_POST['Email']);
	$number = htmlspecialchars($_POST['usrtel']);
	$details = htmlspecialchars($_POST['Details']);
	
	
	$query = "INSERT INTO goodscab_Booking(booking_time,Travel_Date_Time,Shipment_Type,Email,usrtel,Marterial_Description,type)VALUES(NOW(),'$date','$shipmentType','$email','$number','$details','projection')";
	$resultQuery = $database->insertDatabase($query);
	
	
	if($resultQuery == true){
		echo "<script>alert('thank you we will shortly contact'); window.close();</script>";
	}else{
		echo "<script>alert('sorry,message not reached');window.close();</script>";
	}
}
else
{
?>

<form method="post" action="calendar.php" style="margin-top:60px;" >
				<div class="col-md-6">
					<div class="col-md-12">
					<div class="col-md-1">
					<img src="images/datetime.png">
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input class="form-control" size="16" type="text" name="Drop_Time" placeholder="Date" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
							<input type="hidden" id="dtp_input2" value="" /><br/>
						</div>
					</div>
					</div>
					<div class="col-md-12">
					<div class="col-md-1">
					<img src="images/delivery30.png">
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<select id="Shipment_Type"  name="Shipment_Type" class="form-control">
								<option selected="selected">Shipment Type</option>
								<option value="Courier">Courier</option>
								<option value="Part Consignment">Part Consignment</option>
								<option value="Full Part Consignment"> Full Consignment</option>
							</select>
						</div>
					</div>
					</div>
					<div class="col-md-12">
					<div class="col-md-1">
					<img src="images/email.png">
					</div>
					<div class="col-md-10">
						<div class="form-group">
						
							<input type="email" maxlength="100" min="1" required="required" name="Email" id="Email"class="form-control"  placeholder="Email Address" />
								
						</div>
					</div>
					</div>
					<div class="col-md-12">
					<div class="col-md-1">
					<img src="images/mobile.png">
					</div>
					<div class="col-md-10">
						<div class="form-group">
						
							<input maxlength="100" type="text"  pattern="[0-9]{10}"  title="Please Enter vaild mobile number" required="required" name="usrtel" id="usrtel"class="form-control"  placeholder="Mobile Number" />
								
						</div>
					</div>
					</div>
					
			</div>
			<div class="col-md-6">
					<div class="col-md-12">
					<div class="col-md-1">
					<img src="images/weight11.png">
					</div>
					<div class="col-md-10">
					<div class="form-group">
					 <textarea class="form-control" style="height:203px;" id="Details" name="Details" placeholder="Details"></textarea>
					  </div>
					  </div>
					</div>
				</div>
					<div class="col-md-12">
						<center>
						<div class="form-group" >
							<center>
							<input type="submit" class="submit"  id="submit"style="margin-top:30px;height:30px;color:white;background-color:black;margin-bottom:50px;"  />
							
							</center>
						</div>
						</center>
					</div>
					

</div>
</div>
</div>
</form>
<?php
}
?>


 <!-- Footer -->
        <footer>
			<div class="container">
				<div class="row">
					<div class="col-md-6" style="text-align:left;">
					   <a href="#" style="text-align:left;color:gray;">About us</a>&nbsp;&nbsp;&nbsp; 
						<a href="#" style="text-align:left;color:gray;">Privacy Policy</a>&nbsp;&nbsp;&nbsp; 
						 <a href="#" style="text-align:left;color:gray;">Terms of Use </a>&nbsp;&nbsp;&nbsp; 
						 <div class = "btn-group dropup">
							  <a style="color:gray;" class = " dropdown-toggle" data-toggle = "dropdown">
								 GoodsCAB LOGIN
								 <span class = "caret"></span>
							  </a>
							  
							  <ul style="color:black;" class = "dropdown-menu" role = "menu">
								 <li><a style="color:black;" href = "Sign_In.php">Team LOGIN</a></li>
								 <li><a style="color:black;" href = "logistics.php">Logistics Partners LOGIN</a></li>
							  </ul>
						</div>
					</div>
		
					<div class="col-md-6" style="text-align:right;">
					   <a href="#" style="text-align:right;color:gray;">Copyright 2015 &copy; Yodhaa Business Solutions Pvt Ltd</a>
					</div>
				</div>
			</div>
        </footer>

    </div>


    <!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="./js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
		startDate:new Date() 
    });
	$('.form_date').datetimepicker({
//language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		startDate:new Date() 
    });
	$('.form_time').datetimepicker({
      //  language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });

</script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy MM dd- hh:ii",
        autoclose: true,
        todayBtn: true,
        startDate: "today",
        minuteStep: 10
		minDate: 0
    });
	
</script> 

</body>

</html>