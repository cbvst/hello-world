<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>forgot password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="dashboard/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="dashboard/../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard/assets/libs/css/style.css">
    <link rel="stylesheet" href="dashboard/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- forgot password  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center"><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <p>Don't worry, we'll send you an email to reset your password.</p>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="Your Email" autocomplete="off">
                    </div>
                    <div class="form-group pt-1">
                        <button name="btnreset" class="btn btn-block btn-primary btn-xl">Reset Password</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <span>Don't have an account? <a href="index.php">Sign Up</a></span>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end forgot password  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="dashboard/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

 
</html>
<?php
    if(isset($_POST['btnreset']))
    {
        require 'phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 4;                               // Enable verbose debug output
        
        $emailid=$_POST['email'];
        require 'dbconnection.php';
        $forgotobj=new dbConnection();
        #$query="select * from task1_logintbl where login_email='$emailid'";
        #$result=$forgotobj->selectdata($query);
        #$row=$result->fetch_assoc();

        $hash=md5(rand(100,9999));
        #$userid=$row['login_id'];
        #$link="<a href='http://localhost/project1_vst/resetpassword.php?email=$userid'>Reset your password</a>";
        $link="<div>This is a password reset link  <br><a href=http://localhost/project1_vst/resetpassword.php?email=".$emailid."&hash=".$hash.">click here</a></div>";

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'codingbrains123@gmail.com';                 // SMTP username
        $mail->Password = 'testqwerty@123';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('codingbrains123@gmail.com', 'Reset link');
        $mail->addAddress($emailid);     // Add a recipient
        $mail->addReplyTo('codingbrains123@gmail.com');
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Password Reset Link';
        $mail->Body    = $link;
        

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            
        } else {
            echo "<script>alert('Check your email id to reset your password')</script>";
            $queryhash="update task1_logintbl set login_hash='$hash' , login_ischangepass='$hash' where login_email='$emailid'";
            $forgotobj->insertdata($queryhash);
        }

    }


?>