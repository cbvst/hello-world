<?php
class dbConnection{
	private $conn;
	private $server="localhost";
	private $user="root";
	private $password="";
	private $dbname="task1_db";
	private $imgpath="userimage/";
	function __construct(){
		$this->conn=new mysqli($this->server,$this->user,$this->password,$this->dbname);
		if($this->conn->connect_error)
			echo "Connection Error : ".$this->conn->connect_error;
	}

	function insertdata($query)
	{
		$this->conn->query($query);
		if($this->conn->error)
			echo "query error".$this->conn->error;
	}

	function insertimage($tmpname,$imgname)
	{
		move_uploaded_file($tmpname,$this->imgpath.$imgname);
	}

	function rowcount($query){
		
		$result=$this->conn->query($query);
		return $result->num_rows;
	}

	function selectdata($query)
	{
		$result=$this->conn->query($query);
		return $result;
	}

}

?>