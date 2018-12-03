<?php
    
    session_start();
    if(!isset($_SESSION['user']))
        header("location:../login.php");

    include '../dbconnection.php';
    $postobj=new dbConnection();
    
    $postdelid=$_REQUEST['postid'];
    $querypost="delete from task1_posttbl where post_id='$postdelid'";
    $postobj->insertdata($querypost);
    header("location:addpost.php"); 
  
    

?>