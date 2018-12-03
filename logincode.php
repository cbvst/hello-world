<?php
	include 'dbconnection.php';
	$loginobj=new dbConnection();

	extract($_POST);
	$password=md5($password);
	$query="select * from task1_logintbl where login_email='$email' and login_password='$password' and login_isactivate=1 ";
	$result=$loginobj->selectdata($query);
	$row=$result->fetch_assoc();
	$date=date("d/m/y h:i:sA");
	if($email==$row['login_email'] and $password==$row['login_password'])
	{
		session_start();
		$_SESSION['user']=$email;
		$query2="update task1_logintbl set login_datetime='$date' where login_email='$email'";
		$loginobj->insertdata($query2);
		header("location:dashboard/index.php");
	}
	else
		echo "<script>location='login.php?mssg=2';</script>";

?>