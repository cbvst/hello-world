<?php
session_start();
if(isset($_SESSION['user']))
    header("location:dashboard/index.php");
if(isset($_GET['mssg']) and $_GET['mssg']==1)
{
    $success="We'll send an email to your email address in 2 minutes. Open it up to activate your account.";
    //echo '<script>swal("hello","this is message","success")</script>';
}

if(isset($_GET['mssg']) and $_GET['mssg']==2)
    $success="You are already registered. Please <a href=login.php>login</a> with your email.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register Forms</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <!-- sweetalert linking -->
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <!-- Main CSS-->
    <link href="css/main1.css" rel="stylesheet" media="all">
    <style type="text/css">
        input[type=date]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            display: none;
        }
        input[type=date]::-webkit-calendar-picker-indicator {
            padding:5px;
            z-index: 1;

        }
        
    </style>
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <h5 class="title" style="color:orange;"><?php if(isset($success))  echo $success;   ?></h5>

                    <form method="POST" action="registrationcode.php" enctype="multipart/form-data">
                        
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" pattern="[a-zA-Z\s]{1,}" title="only letter and white space allowed" placeholder="FIRST NAME" name="fname" required >
                                 </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" pattern="[a-zA-Z ]{0,}" title="only letter and white space allowed" type="text" placeholder="LAST NAME" name="lname" required>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Contact Number" id="mobno1" onchange="numval();" name="mobile" required>
                        </div>                           
                
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" onfocus="(this.type='date')" name="birthdate" id="birthdate" placeholder="Date Of Birth" min="1950-01-01" max="2018-12-01" required>                                    
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender" id="gender" required>
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="EMAIL" id="email1" onchange="checkemail();" name="email" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" id="pass1" onchange="checkpass();" placeholder="Password" name="password" required>
                        </div> 
                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="Select Photo" name="userpic" id="userpicid" onchange="checkphotoext();" required>
                        </div>        
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green " type="submit">Register</button>
                        </div>
                        <br>
                        <p>Already Registered <a href="login.php">click here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <!-- sweetalert js file linking -->
    <script src="js/sweetalert.min.js"></script>
    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script>

        function numval(){
            var phone=/^\d{10}$/;
            var mobval=mobno1.value;
            if(!mobno1.value.match(phone) || mobval.charAt(0)<6)
            {
                swal("Oops!", "Enter valid contact number!", "error");
                
                mobno1.value="";
                mobno1.focus();
            }
            
            
        }

        function checkpass(){
                
                var len=pass1.value.length;
                
                if(pass1.value.match(/[a-z]+/) && pass1.value.match(/[A-Z]/) && pass1.value.match(/[0-9]/) && pass1.value.match(/[a-z]/) && pass1.value.match(/[~!@#$%^&*()_.,]/) && len>6)
                {
                   
                }
                else                    
                {
                    swal("Oops!", "password must contain \n at least one lowercase \n at leat one uppercase \n at least one digits \n at least one special character\n Minimum length is 6 character", "error");

                    pass1.value="";
                    pass1.focus();
                }

                
            }


        function checkemail(){
                if(!(gender.value=='Male' || gender.value=='Female' || gender.value=='Other'))
                {
                    swal("Oops!","Please Select Gender","error");
                    
                    email1.value="";
                    return;
                }
            var emailvar=email1.value;
            var lastdot=emailvar.lastIndexOf('.');
            var str=emailvar.substring(lastdot+1,emailvar.length);

            if(emailvar.match(/[@.]/) && (str=='com' || str=='in' || str=='org' || str=='net'))
            {
                
            }
            else
            {
                swal("Oops!","Enter Correct Email","error");
                
                email1.value="";
                eamil1.focus();
            }
        }

        function checkphotoext(){
            photonam=userpicid.value;
            var lastdotphoto=photonam.lastIndexOf('.');
            var ext=photonam.substring(lastdotphoto+1,photonam.length);
            if(ext=='jpg' || ext=='png' || ext=='jpeg' || ext=='JPG' || ext=='PNG' || ext=='JPEG')
            {
                  
            }
            else
            {
                swal("Oops!","Allowe files are(jpeg, jpg, png)","error");
                
                userpicid.value="";
                userpicid.focus();
            }
        }

       

      
    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
