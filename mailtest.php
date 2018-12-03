<?php

	require 'phpmailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 4;                               // Enable verbose debug output

		$msg="<div style='font-size:18px;color:orange;height:400px;width:100%;padding:15px;'>
		<h2 style='color:black;'>A verificatin link has been sent to email account </h2>

		Thank you for filling out your information!

		We’ve sent you an email with at the email address you provided. Please enjoy, and let us know if there’s anything else we can help you with.<br>
		The CodingBrains Team
		<br>
			Thanks for registration your activation link below
		 <br><a href=http://localhost/project1_vst/emailverify.php?email=&hash=hash style='font-size:16px;color:red;'>Activate Now</a></div>";

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'codingbrains123@gmail.com';                 // SMTP username
		$mail->Password = 'testqwerty@123';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('no-reply1@gmail.com');
		$mail->addAddress("catscalecompany@gmail.com");     // Add a recipient
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Registration | Signup CodingBrains ';
		$mail->Body    = $msg;
		

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;

		} else {
		   
		}


	
?>