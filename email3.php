<?php
	
	require 'PHPMailer-master/PHPMailerAutoload.php';
	require 'connect.php';
	
	// fields
	$name = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email1']);
	$pass1 = htmlspecialchars(md5($_POST['password1']));
	$pass2 = htmlspecialchars(md5($_POST['password2']));
	$number = htmlspecialchars($_POST['number']);
	
	if($pass1 === $pass2){
		if(checkEmail($email) && checkEmpty($email,$name,$number)){
			sendMail($name,$pass1,$email,$number);
		}else{
			header("Location:Registration.php?msg1=Entered Email address is already registered.");
		}
	}else {
		header("Location:Registration.php?msg1=Password and Confirm Passwords do not match");
	}
	

	
	// checks the email
	function checkEmail($check){
		$result = true;
		$database = new connect();
		$query = "SELECT * FROM users WHERE email='$check'";
		$resultQuery = mysql_query($query);
		if(mysql_num_rows($resultQuery) != 0){
			$result = false;
		}
		
		return  $result;
	}
	
	// chekcks the fields empty
	function  checkEmpty($mail,$username,$number){
		$result = false;
		if(!empty($mail) && !empty($username) && !empty($number)){
			$result = true;
		}
		return  $result;
	}
	
	
	// all ok sends the mail
	function sendMail($name,$pass1,$email,$number){
		
		$database = new connect();
		// inserts into database
		$query = "INSERT INTO users(username,password,email,mobile,active)VALUES('$name','$pass1','$email','$number','0')";
		$resultQuery = mysql_query($query);
			
		// getting mysql id
		$id = mysql_insert_id();
			
		// domain name
		$httphost = $_SERVER['HTTP_HOST'];
		// current page
		$requestUri = $_SERVER['REQUEST_URI'];
		//link
		$link = "http://$httphost/"."activation.php?id=$id";
		
			
		$body =  nl2br("Dear $name,\nThank you for registering with Goods CAB.\nTo activate your account, click the following link or copy and paste it into your browser.\n$link \nRegards,\nGoods CAB Support Team.");
		
		
		/*
		 *	mail function
		 */
		$mail = new PHPMailer;
		
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'mail.goodscab.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'support@goodscab.com';                 // SMTP username
		$mail->Password = 'Gbhnqw@#$964';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 25;                                    // TCP port to connect to
		
		$mail->setFrom('support@goodscab.com', 'goodscab');
		$mail->addAddress($email, $name);     // Add a recipient
		$mail->addAddress('');               // Name is optional
		$mail->addReplyTo('', '');
		$mail->addCC('');
		$mail->addBCC('');
		
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		
		$mail->Subject = 'GoodsCAB Account Activation';
		$mail->Body    = $body;
		$mail->AltBody = '$link';
		
		
		if(!$mail->send()) {
			$error = $mail->ErrorInfo;
			header("Location:Registration.php?msg=".$error);
			
		} else {
			header("Location:Registration.php?msg=Thank you for Registering with Goods CAB.<br>Email to activate your account has been successfully sent.<br>Note: Please check Spam folder.");
		}
		
	}
?>