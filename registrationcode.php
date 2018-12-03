<?php

	include 'dbConnection.php';

	$registerobj=new dbConnection();
	extract($_POST);
	$datetime=date("d/m/Y h:i:sA l");
	$imgname=$_FILES['userpic']['name'];
	$imgtmpname=$_FILES['userpic']['tmp_name'];
	$countrow=$registerobj->rowcount("select * from task1_registerTbl where register_email='$email'");
	if($countrow==0)
	{
		$hash=md5(rand(10,99999));
		$query="insert into task1_registerTbl values('','$fname','$lname','$mobile','$birthdate','$gender','$email','$imgname','$datetime','$hash',0)";
		

		$password=md5($password);
		$query2="insert into task1_loginTbl(login_email,login_password,login_isactivate) values('$email','$password',0)";
		


		require 'phpmailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 4;                               // Enable verbose debug output

		$msg="<div style='font-size:18px;color:orange;height:400px;width:100%;padding:15px;'>
		<h2 style='color:black;'>A verificatin link has been sent to email account </h2>

		Thank you for filling out your information!

		We’ve sent you an email with at the email address you provided.<br> Please enjoy, and let us know if there’s anything else we can help you with.<br>
		The CodingBrains Team
		
		<br>Thanks for registration your activation link below <br><a href=http://localhost/project1_vst/emailverify.php?email=".$email."&hash=".$hash." style='font-size:16px;color:red;'>Activate Now</a></div>";

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'codingbrains123@gmail.com';                 // SMTP username
		$mail->Password = 'testqwerty@123';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('codingbrains123@gmail.com', 'Sign Up');
		$mail->addAddress($email);     // Add a recipient
		$mail->addReplyTo('codingbrains123@gmail.com');
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Registration | Signup CodingBrains';
		$mail->Body    = $msg;
		

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;

		} else {
		    #echo 'Message has been sent';
		    echo "<script>window.location='index.php?mssg=1';</script>";

		    $registerobj->insertdata($query);
			$registerobj->insertimage($imgtmpname,$imgname);
			$registerobj->insertdata($query2);
		}

		#echo "<script>location='login.php';</script>";
	}
	else
		echo "<script>window.location='index.php?mssg=2'</script>";

	
?>