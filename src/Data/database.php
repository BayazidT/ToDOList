<?php
namespace MyApp\Data;

		

	class database{
		public $host = 'localhost';
		public $user = 'root';
		public $password ='';
		public $dbName = 'todolist';

		public $link;
		public $error;

		public function __construct(){
			$this->dbConnect();
		}

		private function dbConnect(){
			$this->link = new \MySQLi($this->host, $this->user, $this->password, $this->dbName);
			if(!$this->link){
				$this->error = "Connection failed".$this->link->connect_error;
				return false;
			}
		}
		public function insert($query){
			$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if($insert_row){
				return $insert_row;
				exit();
			}else{
				 die("Error!!(".$this->link->errno.")".$this->link->error);
			}
		
		}
		//Retriving values from databse..
		public function select($query){
			$result= $this->link->query($query) or die($this->link->error.__LINE__);
			if($result->num_rows > 0){
				return $result;
			}else{
				return false;
			}
		}
	
        
    }