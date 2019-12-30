<?php 
	require('databaseClass.php');

	class setting extends database
	{
		
		public function __construct()
		{
			$this-> connectdb();
		}

		public function updatepassword($data,$tablename,$id)
		{
			if(isset($data))
				$data=md5($data);

			$stmt= $this->conn->prepare("UPDATE $tablename SET password=:password WHERE id= :id");

			$stmt-> bindValue(":id", $id);
			$stmt-> bindValue(":password", "$data");
			$stmt->execute();
			//print_r($stmt);
		}
	}
 ?>