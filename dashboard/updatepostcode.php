<?php
    
    session_start();
    if(!isset($_SESSION['user']))
        header("location:../login.php");

    include '../dbconnection.php';
    $postobj=new dbConnection();
    $updateid=$_REQUEST['upid'];
    extract($_POST);
    $querypost="update task1_posttbl set post_item='$postedititem' where post_id='$updateid'";
    $postobj->insertdata($querypost);
    echo $updateid;
    header("location:addpost.php"); 
  
    

?>