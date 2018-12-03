<?php

	$email=$_GET['email'];
	$hash=$_GET['hash'];

	include 'dbconnection.php';
	$verfiyobj=new dbConnection();

	$selectquery="select * from task1_registerTbl where register_email='$email' and register_hash='$hash' and register_isactivate=0";
	$count=$verfiyobj->rowcount($selectquery);
	if($count>0)
	{
		$updqueryforreg="update task1_registerTbl set register_isactivate=1 where register_email='$email' and register_hash='$hash' and register_isactivate=0";
		$verfiyobj->insertdata($updqueryforreg);
		$updqueryforlogin="update task1_loginTbl set login_isactivate=1 where login_email='$email' and login_isactivate=0";
		$verfiyobj->insertdata($updqueryforlogin);
		echo "<script>location='login.php?mssg=1';</script>";
	}
	else
	{
		echo "<script>location='login.php?mssg=3';</script>";
	}

?>