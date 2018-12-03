<?php
session_start();
if(!isset($_SESSION['user']))
    header("location:../login.php");

?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>User Profile </title>
    <style>
        th{
            width: 25%;
        }
        #abc{
            position: absolute;           
            width:500px;
            background: red;
            color:white;
            top:400px;
            left:300px;
            padding: 5px;
        }

    </style>
</head>
<?php
    
    if(isset($_POST['btnsubmitpass']))
    {
        include '../dbconnection.php';
        $dashboardobj=new dbConnection();
        $sesemail=$_SESSION['user'];
        $query="select * from task1_logintbl where login_email='$sesemail'";
        $result=$dashboardobj->selectdata($query);
        $row=$result->fetch_assoc();

        $newpass=$_POST['newpass'];
        $oldpass=$_POST['oldpass'];
        $confirmpass=$_POST['confirmpass'];
        if($newpass==$confirmpass)
        {
            if(md5($oldpass)==$row['login_password'])
            {
                $newpass=md5($newpass);
                $querypass="update task1_logintbl set login_password='$newpass' where login_email='$sesemail'";
                $dashboardobj->insertdata($querypass);
                header("location:../login.php");
            }
            else
            {
                echo "<div id='abc'>Please Enter correct password.</div>";
            }
        }
        else
        {
             echo "<div id='abc'>new password and confirm password did not matched.</div>";
        }



    }

?>
<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" ><span style="color:orange;">Change Password</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                       
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../userimage/useravatar.png" height="100%" width="100%" alt="" class="user-avatar-md rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php" ><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="editprofile.php"><i class="fa fa-fw fa-rocket"></i>Edit Profile</a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="updateimage.php" ><i class="fa fa-fw fa-rocket"></i>Update Photo</a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="changepassword.php" ><i class="fas fa-fw fa-chart-pie"></i>Change Passowrd</a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addpost.php" ><i class="fas fa-fw fa-rocket"></i>Add Post</a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                                
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Change Password</h2>
                                
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                        <label for="validationCustom01">Old Password</label>
                        <input type="text" class="form-control" name="oldpass" placeholder="Old Password" required>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                        <label for="validationCustom01">New Password</label>
                        <input type="text" class="form-control" name="newpass" placeholder="New Password" required>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                        <label for="validationCustom01">Confirm Password</label>
                        <input type="text" class="form-control" name="confirmpass" placeholder="Confirm Password" required>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                        
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                        <button class="btn btn-primary" type="submit" name="btnsubmitpass">Change Pasword</button>
                    </div>

                </form>

            
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>