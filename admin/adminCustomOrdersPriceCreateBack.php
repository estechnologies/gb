<?php 

		require 'packagingConnection.php';
		
		$database = new packagingConnection();
		
		$materialType = htmlspecialchars($_POST['material']);
		$thickness = htmlspecialchars($_POST['thickness']);
		$price = htmlspecialchars($_POST['Price']);
		
		$query = "SELECT * FROM customDesignPricing WHERE material='$materialType' AND thickness='$thickness'";
		$resultQuery = mysql_query($query);
		
		if(mysql_num_rows($resultQuery) <= 0){
			
			$updateQuery = "INSERT INTO customDesignPricing(material,thickness,price)VALUES('$materialType','$thickness','$price')";
			
			$resultUpdate = mysql_query($updateQuery);
			$id = mysql_insert_id();
			if($resultUpdate == 1){
			
				header("Location:admin_packagingSolution_customPricing_create.php?msg1=MTO Pricing has been saved successfully. Pricing Id is $id");
			}else{
				header("Location:admin_packagingSolution_customPricing_create.php?msg= failed try again..");
			}
			
		}else{
			header("Location:admin_packagingSolution_customPricing_create.php?msg=Price is already available for selected Material Type and Thickness.<br>To Edit Pricing,<a href=admin_packagingSolution_customPricing_view.php>Click Here</a>");
		}


		
		
		
?>