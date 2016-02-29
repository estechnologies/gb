<?php 

	require 'PHPMailer-master/PHPMailerAutoload.php';
	require 'connect.php';
	

	$database = new connect();
	$email = htmlspecialchars($_POST['email']);
	
	
	$checkEmail = "SELECT * FROM users WHERE email='$email'";
	$resultCheckEmail = mysql_query($checkEmail);
	
	

	//echo $email." ".$resultCheckEmail;
	if(mysql_num_rows($resultCheckEmail) == 1){
	
		
		while($row = mysql_fetch_array($resultCheckEmail)){
			$name = $row['username'];
		}
	
			/*
			 * working
			 */
			// inserts inth forgot mysql
			$query = "INSERT INTO forgot(name,email,forgotTime,validTime)VALUES('$name','$email',NOW(), NOW() + INTERVAL 15 MINUTE)";
			
			$resultQuery = mysql_query($query);
			$insertedId = mysql_insert_id();
			
			
			//sends mail resetts ?
			
			// domain name
			$httphost = $_SERVER['HTTP_HOST'];
			// current page
			$requestUri = $_SERVER['REQUEST_URI'];
			//link
			$link  = "http://www.goodscab.com/"."resetEmailPassword.php?link=$insertedId";
			
			$body = nl2br("Dear $name,\n
					To reset your account password, click the following link or copy and paste it into your browser.\n

					$link\n
					Regards,\n
					Goods CAB Support Team.");
				
			
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
			$mail->addAddress($email,$name);     // Add a recipient
			$mail->addAddress('');               // Name is optional
			$mail->addReplyTo('', '');
			$mail->addCC('');
			$mail->addBCC('');
			
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML
			
			//header & body
			$mail->Subject = 'Goods CAB Account Password Reset';
			$mail->Body    = $body;
			$mail->AltBody = '$link';
			
			// mail checking
			if(!$mail->send()) {
				$error = $mail->ErrorInfo;
				header("Location:ForgotPassword.php?msg=".$error);
					
			} else {
				header("Location:ForgotPassword.php?msg1=Email to reset your account has been successfully sent.<br>Note: Please check Spam folder.");
			}
			
			
			
	}else{
		header("Location:ForgotPassword.php?msg=Entered Email address is not found in our records");
	}

?>