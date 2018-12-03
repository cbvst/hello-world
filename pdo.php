<?php
	
	class dbh{
		private $server="localhost";
		private $user="root";
		private $password="";
		private $dbname="task1_db";
		
		public function connectdb(){
			try{
				$pdo=new PDO("mysql:host=$this->server;dbname=$this->dbname;charset=utf8",$this->user,$this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				return $pdo;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
		}

		public function __construct($str='hello'){
			echo $str;
		}
	}

	$object =new dbh;
	$pdo=$object->connectdb();
	print_r($pdo);
?>