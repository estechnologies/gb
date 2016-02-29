<?php


	require 'packagingConnection.php';
	
	$database = new packagingConnection();
	
	
	
	/*
	 * lengths,widths,height
	 */
	$length = htmlspecialchars($_POST['length']);
	$width = htmlspecialchars($_POST['width']);
	$height = htmlspecialchars($_POST['height']);
	
	
	/*
	 * thickness and material
	 */
	$thickness = htmlspecialchars($_POST['thickness']);
	$material = htmlspecialchars($_POST['material']);
	
	/*
	 * converting to integer value
	 */
	$length = floatval($length);
	$width = floatval($width);
	$height = floatval($height);
	
	/*
	 * unit price
	 */
	$unitPrice = $length * $width*$height;
	
	
	
	
	
	/*
	 * querying
	 */
	$totalPriceQuery = "SELECT * FROM customDesignPricing WHERE material='$material' AND thickness='$thickness'";
	$resultPriceQuery = mysql_query($totalPriceQuery);
	
	
	if(mysql_num_rows($resultPriceQuery) == 1){
		while($rows = mysql_fetch_array($resultPriceQuery)){
			$result =$rows['price']; 
		}
	}
	
	
	/*
	 * calculation
	 */
	$result = floatval($result);
	$unitPrice = floatval($unitPrice);
	$totalPrice = $unitPrice * $result;
	
	
	
	/*
	 * array
	 */
	
	//$data = array('unitPrice'=>$unitPrice,'totalPrice'=>$totalPrice);
	
	
	/*
	 * json encodes
	 */
	header("Location:PackingSolutions.php?length=$length&width=$width&height=$height&thickness=$thickness&material=$material&unitPrice=$unitPrice&total=$totalPrice");

?>