<?php
	require 'connect.php';
	require 'packagingConnection.php';
	
	/*
	 * this class for count of servicers,bookings,counts
	 */
	class counts {
		
		//constructor
		function __construct(){
			
		}
		
		//today bookings count
		function todayBookingCount(){
			$database = new connect();
			$query = "SELECT *  FROM goodscab_Booking WHERE DATE(booking_time)= DATE(NOW())";
			$resultQuery = mysql_query($query);
			return mysql_num_rows($resultQuery);
		}
		
		function monthBookingCount(){
			$database = new connect();
			$query = "SELECT * FROM goodscab_Booking WHERE MONTH(booking_time)=MONTH(CURDATE())";
			$resultsQuery = mysql_query($query);
			return mysql_num_rows($resultsQuery);
		}
		
		//totalBooking count
		function totalBookingCount(){
			$database = new connect();
			$query = "SELECT * FROM goodscab_Booking";
			$resultsQuery = mysql_query($query);
			return mysql_num_rows($resultsQuery);
		}
		
		
		//service providers count
		function serviceProvidersCount(){
			$database  = new connect();
			$query = "SELECT * FROM service_providers";
			$resultQuery = mysql_query($query);
			return mysql_num_rows($resultQuery);
		}
		
		//users Count 
		function usersCount(){
			$database = new connect();
			$query = "SELECT * FROM users";
			$resultQuery = mysql_query($query);
			return mysql_num_rows($resultQuery);
		}
		
		//employees count except admin
		function employeesCount(){
			$database = new connect();
			$query = "SELECT * FROM employee_record";
			$resultQuery = $database->getResultsDatabase($query);
			
				$result = mysql_num_rows($resultQuery);
				return $result;
		}
		
		
		
		//gives the projection results
		function projectionsCount(){
			$database = new connect();
			$query = "SELECT * FROM goodscab_Booking WHERE type ='projection'";
			$resultQuery = mysql_query($query);
			
			$result = mysql_num_rows($resultQuery);
			return $result;
		}
		
		
		//total shipment weight
		function totalShipmentWeightCount(){
			$database = new connect();
			$query = "SELECT * FROM goodscab_Booking";
			$resultQuery = mysql_query($query);
			
			$result = 0;
			while($row = mysql_fetch_array($resultQuery)){
				$result += floatval($row['Shipment_weight']);
			}
			
			return $result;
		}
		
		
		//couriers count
		function  courierCount(){
			$database = new connect();
			$query = "SELECT * FROM goodscab_Booking WHERE Shipment_Type = 'Courier'";
			$resultQuery = mysql_query($query);
			return mysql_num_rows($resultQuery);
		}
		
		
		//couriers count
		function  partConsignmentCount(){
			$database = new connect();
			$query = "SELECT * FROM goodscab_Booking WHERE Shipment_Type = 'Part Consignment'";
			$resultQuery = mysql_query($query);
			return mysql_num_rows($resultQuery);
		}
		
		//couriers count
		function  fullConsignmentCount(){
			$database = new connect();
			$query = "SELECT * FROM goodscab_Booking WHERE Shipment_Type = 'Full Part Consignment'";
			$resultQuery = mysql_query($query);
			return mysql_num_rows($resultQuery);
		}
		
		
		/*
		 * packageing side
		 */
		
		
		/*
		 * mto count
		 */
		
		function todayMtoCount(){
			$database = new packagingConnection();
			$query = "SELECT * FROM customDesignOrders WHERE DATE(bookingtime)= DATE(NOW())";
			$resultQuery = mysql_query($query);
			return mysql_num_rows($resultQuery);
		}
		
		/*
		 * mts count
		 */
		function todayMtsCount(){
			$database = new packagingConnection();
			$query = "SELECT * FROM productOrders WHERE DATE(bookingtime)= DATE(NOW())";
			$resultQuery = mysql_query($query);
			return mysql_num_rows($resultQuery);
		}
		
	}
?>