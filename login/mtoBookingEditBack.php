<?php 

		require 'packagingConnection.php';
		
		$database = new packagingConnection();
		
		
		
		
		$cd = htmlspecialchars($_POST['cd']);
		$length = htmlspecialchars($_POST['length']);
		$width = htmlspecialchars($_POST['width']);
		$height = htmlspecialchars($_POST['height']);
		$material = htmlspecialchars($_POST['material']);
		$thickness = htmlspecialchars($_POST['thickness']);
		$quantity = htmlspecialchars($_POST['quantity']);
		$email = htmlspecialchars($_POST['Email']);
		$usrtel = htmlspecialchars($_POST['usrtel']);
		$unitprice = htmlspecialchars($_POST['unitPrice']);
		$total = htmlspecialchars($_POST['total']);
		$status = htmlspecialchars($_POST['status']);	
		$reference = htmlspecialchars($_POST['reference']);
		
		
		$query = "UPDATE customDesignOrders SET length='$length',width='$width',height='$height',thickness='$thickness',material='$material',quantity='$quantity',unitPrice='$unitprice',total='$total',status='$status',reference='$reference',email='$email',mobile='$usrtel' WHERE cdid='$cd'";
		
		$resultQuery = mysql_query($query);
		
		if($resultQuery == 1){
			header("Location:MTOBookingsEdit.php?id=$cd&msg1=MTO Order has been updated successfully.");
		}else{
			header("Location:MTOBookingsEdit.php?id=$cd&msg=MTO Order has been updated UNsuccessfully.");
		}
		
		
?>