<?php
    

if ((function_exists('session_status')
		&& session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
			session_start();
		}
    
    // Check, if username session is NOT set then this page will jump to login page
    if (!isset($_SESSION['id']['username'])) {
        header('Location:index.php');
    }

    $personName = $_SESSION['id']['username'];
    $personMail  =$_SESSION['id']['email']; 
    
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Book your shipment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" href="/images/goodscab.ico" type="image/x-icon" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
  <script type="text/javascript" src="jquery-2.1.4.js"></script>
  <!-- Custom CSS -->
   <link href="css/style.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
     <link href="css/main.css" rel="stylesheet">
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="./js/jquery.geocomplete.js"></script>
	<script src="./js/bootstrap-datetimepicker.min.js"></script>
	  
    <script>
	 $(function () {
		
	var optionsfrom = {
          map: "#map",
          location: ""
        };
        var optionsto = {
          map: "#map",
          location: ""
        };
       $("#from").geocomplete(optionsfrom);
		$("#to").geocomplete(optionsto);
		 $("#mapview").hide();
	});
      function calculateRoute(from, to) {
	   $("#mapview").show();
        // Center initialized to Naples, Italy
        var myOptions = {
          zoom: 10,
          center: new google.maps.LatLng(17.3700, 78.4800),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);

        var directionsService = new google.maps.DirectionsService();
        var directionsRequest = {
          origin: from,
          destination: to,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
		$("#mapview").show();
        directionsService.route(
          directionsRequest,
          function(response, status)
          {
            if (status == google.maps.DirectionsStatus.OK)
            {
			distance  = response.routes[0].legs[0].distance.text;
			//distance  = response.routes[0].legs[0].distance.value/1000;
				//$("#distance").html(Math.round(distance / 1609.344));
				
				$("#distance").val(distance);
				 var point = response.routes[ 0 ].legs[ 0 ];
				 //+ ' (' + point.distance.text + ')'
        $( '#travel_data' ).val( ' ' + point.duration.text  );
              new google.maps.DirectionsRenderer({
                map: mapObject,
                directions: response
              });
            }
            else
              $("#error").append("Unable to retrieve your route<br />");
          }
        );
      }

      $(document).ready(function() {
        // If the browser supports the Geolocation API
        if (typeof navigator.geolocation == "undefined") {
          $("#error").text("Your browser doesn't support the Geolocation API");
          return;
        }

        $("#from-link, #to-link").click(function(event) {
          event.preventDefault();
          var addressId = this.id.substring(0, this.id.indexOf("-"));

          navigator.geolocation.getCurrentPosition(function(position) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
              "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
            },
            function(results, status) {
              if (status == google.maps.GeocoderStatus.OK)
                $("#" + addressId).val(results[0].formatted_address);
              else
                $("#error").append("Unable to retrieve your address<br />");
            });
          },
          function(positionError){
            $("#error").append("Error: " + positionError.message + "<br />");
          },
          {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          });
        });

        $("#datetime").focusin(function(event) {
          event.preventDefault();
          calculateRoute($("#from").val(), $("#to").val());
        });
      });
    </script>
    <style type="text/css">
      #map {
  
        height: 580px;
        margin-top: 10px;
      }
	  .hide{
	  display:none;
	  
	  
	  }
    </style>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
  });

  function checkDate(){
		var value = $("#datetime").val();
		$.post("time2.php",{Travel_Date_Time:value},function(data){ 
			document.getElementById("datetimemsg").innerHTML = data;
			});
		
	}
  
   function selectrow1() {
var selectedValue = document.getElementById('Shipment_Type').value
if (selectedValue == 'Part Consignment'){

document.getElementById('shipmentwg').style.display='inline';
document.getElementById('no_package').style.display='inline';
document.getElementById('vechicle_capa').style.display='none';  
 document.getElementById("Num_package").setAttribute("required","required");
 document.getElementById("Shipment_weight").setAttribute("required","required");
}
if (selectedValue == 'Full Part Consignment'){

document.getElementById('shipmentwg').style.display='inline';
document.getElementById('no_package').style.display='inline';
document.getElementById('vechicle_capa').style.display='inline';
 document.getElementById("Vehicle_Capacity").setAttribute("required","required");  
 document.getElementById("Num_package").setAttribute("required","required");
 document.getElementById("Shipment_weight").setAttribute("required","required");

}
if (selectedValue == 'Courier'){

document.getElementById('shipmentwg').style.display='none';
document.getElementById('no_package').style.display='none';
document.getElementById('vechicle_capa').style.display='none';

}
}

</script>

</head>
<body>
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
        <li class="headerlinks_drop"><a href="userLogout.php">Logout</a></li>                        
      </ul>
    </li>
  </ul>
    </div>
  </div>
</nav>
  
<div class="main" style="margin-top:100px;" >

<div class="container">
<form role="form"  id="calculate-route" method="post" name="calculate-route" action="userBookings.php">
<div class="col-md-6">
    <div class="panel panel-default">
  <center>  <div style="background-color: #EAE9E9;" class="panel-heading"><h3 class="panel-title"><strong>New Booking</strong></h3>
      
  </div> </center> 
  
  <div class="panel-body">
   
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
              
			 <label for="Pickup Address">Pickup Address*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                        <input type="hidden" name="username" value=<?php echo $personName; ?> />
                                        <input  type="text" id="from" name="from_Address" required="required" placeholder="Enter pickup address" class="form-control" />
                                        
                                    </div>
 <label for="Delivery Address">Delivery Address*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                        <input maxlength="100" type="text" id="to" name="to_Address" required="required" placeholder="Enter delivery address" class="form-control"/>
                                    </div>
                                    
                                     <center> <p style="color:red" id="datetimemsg"></p></center>
                                    <label for="Pickup Date & Time">Pickup Date & Time*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        <div class="input-append date form_datetime" >
							<input size="16" style="background-color: white;" required="required"  class="form-control" id="datetime" name="Travel_Date_Time" placeholder="Select pickup date and time" type="text" readonly>
								<span class="add-on"><i class="icon-remove"></i></span>
								<span class="add-on"><i class="icon-calendar"></i></span>
							</div>
                                    </div>
 <label for="Shipment Type">Shipment Type*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><img src="images/package.png"></img></span>
                                        <select id="Shipment_Type" required="required"  name="Shipment_Type"  onclick="checkDate()" onchange="selectrow1()"class="form-control">
								<option value="" disabled selected hidden>Select shipment type</option>
								<option value="Courier">Courier</option>
								<option value="Part Consignment">Part Consignment</option>
								<option value="Full Part Consignment"> Full Consignment</option>
							</select>
                                    </div>
                                    <div style="display:none" id="shipmentwg">
                                    <label for="Shipment Weight">Shipment Weight (in kg’s)*</label>
                                     <center> <p style="color:red" id="msgshipment"></p></center>
  <div style="margin-bottom: 12px" id="shipsment" class="input-group">
									 
                                        <span class="input-group-addon"><img src="images/shipmentwg.png"></img></span>
                                        <input  type="text"   id="Shipment_weight"  maxlength="5" onfocusout="shipmentweightzero()"  placeholder="Enter shipment weight" name="Shipment_weight" class="form-control" />
                                      </div>  
                                    </div>
                                    <div style="display:none" id="no_package">
 <label for="No. of Packages">No. of Packages*</label>
 <center> <p style="color:red" id="msgpackage"></p></center>
                            <div style="margin-bottom: 12px" id="packsage" class="input-group">
                                        <span class="input-group-addon"><img src="images/package.png"></img></span>
                                       <input type="text" maxlength="4" name="Num_package" onfocusout="packingsnumberszero()" id="Num_package" class="form-control"  placeholder="Enter packages" />
                                    </div>
                                   
                                    </div>
                                    <div style="display:none" id="vechicle_capa">
                                    <label for="Vehicle Capacity">Vehicle Capacity*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><img src="images/vcapacity.png"></img></span>
                                        <select id="Vehicle_Capacity"  name="Vehicle_Capacity" class="form-control" >
								<option value="" disabled selected hidden>Select Vehicle Capacity</option>
								<option value="1 Ton">1 Ton</option>
								<option value="1.5 Ton">1.5 Ton</option>
								<option value="3 Ton">3 Ton</option>
								<option value="5 Ton">5 Ton</option>
								<option value="8 Ton">8 Ton</option>
								<option value="10 Ton">10 Ton</option>
								<option value="12 Ton">12 Ton</option>
							</select>
							
                                    </div>
                                    </div>
                                    <div style="display:none">
 <label for="Delivery Type">Delivery Type*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                        <select id="Delivery_Type"  name="Delivery_Type" class="form-control">
								<option value="" disabled selected hidden></option>
								<option style="color:black;"value="Regular">Regular</option>
								<option style="color:black;" value="Express">Express</option>
							</select>
                                    </div>
                                    </div>
                                    <label for="Email Address">Email Address*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                       <input type="email" maxlength="50" min="1" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" oninvalid="InvalidMsgEmail(this);"  oninput="InvalidMsgEmail(this); " name="Email" id="Email"class="form-control"  placeholder="Enter email address" value="<?php echo $_SESSION['id']['email'];?>"/>
                                        
                                    </div>
 <label for="Mobile Number">Mobile Number*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                        <input type="text"  oninvalid="InvalidMsg(this);" maxlength="10" oninput="InvalidMsg(this);" pattern="[0-9]{10}"  required="required" name="usrtel" id="usrtel" class="form-control"  placeholder="Enter mobile number" value="<?php echo $_SESSION['id']['mobile'];?>"/>                                    </div>
                                        <label for="Distance">Distance*</label>
  <div style="margin-bottom: 12px" class="input-group">
									 
                                        <span class="input-group-addon"><img src="images/distance.png"></img></span>
                                      <input  type="text"  readonly id="distance" placeholder="Distance" name="distance" class="form-control" />
                                        
                                    </div>
 <label for="travel time">Travel Time*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><img src="images/traveltime.png"></img></span>
                                       <input  type="text"   readonly id="travel_data" placeholder="Travel Time" name="travel_data" class="form-control" />
                                  </div>
                                        <label for="Material Description">Material Description*</label>
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><img src="images/description.png"></img></span>
                                         <textarea class="form-control" style="height:203px;" required="required"  id="Marterial_Description" maxlength="200" name="Marterial_Description" placeholder="Enter material description"></textarea>                               </div>
                                         <div  style="color:black;margin-bottom: 12px;">
											By clicking on Book now button, you will accept the <a href="Terms_Privacy.html" target="_blank" style="text-decoration:underline;color:blue">Terms and Privacy</a> .
					</div>
                                    <center><button  type="submit" name="submit" id="submit" class="btn btn-default">Book Now</button></center>
                                  
                                    </div>
                                    
  
  

  </div>
</div>
	
			<div id="mapview" style="color:white;margin-right: 0px;display:none;">
				<div class="col-md-6">
					<div  id="map"></div>
						<p id="error"></p>
					</div>
				</div>
			</div>
					
					
</div>
</div>
</form>
<div style="margin-bottom:100px;">
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
    </div>
   <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="./js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
	<script>
function Advanced() {
 if( document.getElementById("hides").style.display=='none' ){
   document.getElementById("hides").style.display = '';
 }else{
   document.getElementById("hides").style.display ='none'; 
 }
}



</script>
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
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
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
<script>
$('#submit').click(function(){
    $('.checkcondition').each(function() {
        if($(this).find(':checkbox:checked').length === 0) {
            alert('please accept the terms and condition to proceed ');
        }
    });
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


</script>
 <script>
function packingsnumberszero() {
    var x = document.getElementById("Num_package");
    var y = document.getElementById("msgpackage");
   if(x.value <= 0){
    y.innerHTML= "No. of Packages should be greater than zero"
}
else{ y.innerHTML= "";}

}
function shipmentweightzero() {
    var x = document.getElementById("Shipment_weight");
    var y = document.getElementById("msgshipment");
   if(x.value <= 0){
    y.innerHTML= "Shipment weight should be greater than zero"
}else{ y.innerHTML= "";}


}
$(function() {
  $('#shipsment').on('keydown', '#Shipment_weight', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
$(function() {
  $('#packsage').on('keydown', '#Num_package', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
</script>
 
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
</body>
</html>