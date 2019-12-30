<?php 
	class connection
	{
		protected $host='localhost';
		protected $user ='root';
		protected $password='';
		protected $dbName='onlinebookpasal';
		public $conn;

		function connectdb()
		{

			try{
				$this->conn= new PDO("mysql:host=$this->host;dbname=$this->dbName",$this->user,$this->password);

				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				return $this->conn;
			}

			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
	}
 ?>