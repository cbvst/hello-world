<?php

   
        include 'dbconnection.php';
        $dashboardobj=new dbConnection();             
        $email=$_POST['email']; 
        $hash=$_POST['hash']; 
        $newpass=$_POST['newpass'];        
        $confirmpass=$_POST['confpass'];

        $selectquery="select * from task1_logintbl where login_email='$email' and login_hash='$hash'";
        $count=$dashboardobj->rowcount($selectquery);
        $result=$dashboardobj->selectdata($selectquery);
        if($count>0)
        {
            if($newpass==$confirmpass)
            {
                $newpass=md5($newpass);
                $querypass="update task1_logintbl set login_password='$newpass' where login_email='$email' and login_hash='$hash'";
                $dashboardobj->insertdata($querypass);
                $hash_reset=md5(rand(100,9999));
                $queryresethash="update task1_logintbl set login_hash='$hash_reset' where login_email='$email'";
                $dashboardobj->insertdata($queryresethash);
                header("location:login.php");                
            }
            else
            {
                echo "<script>alert('new password and confirm password did not matched.')</script>";
            }
        }
        else
        {
            echo "<script>alert('The url is either invalid or you already have reset password by this link')</script>";
        }

      
?>