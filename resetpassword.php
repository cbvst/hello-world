<?php 
        include 'dbconnection.php';
        $dashboardobj=new dbConnection();             
        $email=$_GET['email']; 
        $hash=$_GET['hash']; 
        $selectquery="select * from task1_logintbl where login_email='$email' and login_ischangepass='$hash'";
        $count=$dashboardobj->rowcount($selectquery);
        $result=$dashboardobj->selectdata($selectquery);
        $row=$result->fetch_assoc();
        if($count>0)
        {
            if($row['login_ischangepass']!=$row['login_hash'])
            {
                header("location:expirepage.php");               
            }
        }
        ?>

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
                <form action="resetpasscode.php" method="post">
                    
                   <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
                   <input type="hidden" name="hash" value="<?php echo $_GET['hash']; ?>">
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="newpass" required="" placeholder="New password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="confpass" required="" placeholder="Confirm password" autocomplete="off">
                    </div>
                    <div class="form-group pt-1">
                        <button name="btnreset" class="btn btn-block btn-primary btn-xl">Reset Password</button>
                    </div>
                </form>
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
