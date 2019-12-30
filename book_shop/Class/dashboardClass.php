<?php 
	require('databaseClass.php');

	class dashboard extends database
	{
		
		public function __construct()
		{
			$this-> connectdb();
		}

		public function countnumber($colname,$tableName)
		{
			$selquery="SELECT COUNT($col_name) FROM $tableName";

			$stmt =$this->conn->prepare($selquery);
			$stmt-> bindValue(":id", $id);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			return $stmt;
		}
	}
 ?>