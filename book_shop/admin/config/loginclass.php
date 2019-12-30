<?php 
	class login_class
	{

			private $conn;
			private $data;
		
		function __construct($conn,$data)
		{
			$this->conn = $conn;
			$this->data = $data;

			$this->getLoginDetail();
		}

		function getLoginDetail()
		{
			$this->data['password'] = md5($this->data['password']);
			$stmt = $this->conn->prepare("SELECT * FROM tbl_admin WHERE email=:email AND password=:password");
			$stmt->bindParam(':email',$this->data['email']);
			$stmt->bindParam(':password',$this->data['password']);
			if($stmt->execute())
			{
				$stmt->setFetchMode(PDO::FETCH_ASSOC); 
				if($stmt->rowCount()>0)
				{
					$info = $stmt->fetch();
					$_SESSION['email'] = $info['email'];
					$_SESSION['role'] = $info['role'];

				return true;
			
				}
					}

			return false;
		}
	}
 ?>