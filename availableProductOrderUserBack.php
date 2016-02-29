<?php 

	require 'packagingConnection.php';
	
	
	$database = new packagingConnection();
	
	$productCode = htmlspecialchars($_POST['productId']);
	$productName = htmlspecialchars($_POST['productname']);
	$unitprice = htmlspecialchars($_POST['unitPrice']);
	$moq = htmlspecialchars($_POST['moq']);
	$leadTime = htmlspecialchars($_POST['leadTime']);
	$productDescription = htmlspecialchars($_POST['productDescription']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$email = htmlspecialchars($_POST['email']);
	$number = htmlspecialchars($_POST['number']);
	$url = htmlspecialchars($_POST['url']);
	
	$quan = $quantity;
	$unit = $unitprice;
	$total = intval($quan) * intval($unit);
	
	
	
	if(empty($email) && empty($number)){
		header("Location:$url&msg=please enter email and mobile");
	}else if(empty($email)){
		header("Location:$url&msg=please enter email");
	}else if(empty($number)){
		header("Location:$url&msg=please enter mobile");
	}else{
			//$query = "INSERT INTO productOrders(productname,productcode,unitprice,moq,leadtime,productDescription,quantity,email,password,total,bookingtime)VALUES('$productName','$productCode','$unitprice','$moq','$leadTime','$productDescription','$quantity','$email','$number','$total',NOW())";
		
		$query = "INSERT INTO productOrders(productname,productCode,unitprice,reference,leadtime,productDescription,quantity,email,mobile,bookingtime,status,total)VALUES('$productName','$productCode','$unitprice','','$leadTime','$productDescription','$quantity','$email','$number',NOW(),'Pending','$total')";
		
		$totalResult = mysql_query($query);
		
		
if($totalResult == 1){
	$pdid = mysql_insert_id();
	header("Location:$url&msg1=Your order has been confirmed. Order Id is $pdid. <br>Our Executive will get in touch with you for order processing.");
}else{
	header("Location:$url&msg=failed try again.");
}

	}
	
?>