<?php 
session_start();
require('connectionClass.php');
class database extends connection
{

	public function __construct()
	{
		$this-> connectdb();
	}


	public function insert($data,$tablename)
	{
		if(isset($data['savebtn']))
			unset($data['savebtn']);

		$fieldName = implode(", ", array_keys($data));

		if(isset($data['password']))
			$data['password']=md5($data['password']);

		$fieldvalue=":" . implode(",:", array_keys($data));
		//print_r($fieldvalue);
		$stmt= $this->conn->prepare("INSERT INTO $tablename ($fieldName) Values($fieldvalue)");

		foreach($data as $key => $value)
		{
			$stmt-> bindValue(":$key", $value);
		}

		//print_r($stmt);
		
		if($stmt->execute())
		{
			return true;
		}

		return false;
	}	


	public function update($data,$tablename,$id)
	{
		if(isset($data['updatebtn']))
			unset($data['updatebtn']);
		$updatequery ="";
		$i=0;

		if(isset($data['password']))
			$data['password']=md5($data['password']);

		foreach ($data as $key => $value) 
		{
			if($i==0)
			{
				$updatequery .=$key."= :".$key;
			}

			else
			{
				$updatequery .=" , ".$key."= :".$key;
			}
			$i++;
		}

		$stmt= $this->conn->prepare("UPDATE $tablename SET $updatequery WHERE id= :id");

		foreach($data as $key => $value)
		{
			$stmt-> bindValue(":$key", $value);
		}
			
		$stmt-> bindValue(":id", $id);
		$stmt->execute();
		//print_r($stmt);
	}

	public function delete($tableName,$id)
	{
		$stmt= $this->conn->prepare("DELETE FROM $tableName WHERE id=:id");
		$stmt-> bindValue(":id", $id);
		$stmt->execute();
	}

	public function select($tableName,$id=NULL)
	{
		if($id==NULL)
		{
			$selquery="SELECT * FROM $tableName";
		}
		
		else
		{
			$selquery="SELECT * FROM $tableName WHERE id=:id";
		}

		$stmt =$this->conn->prepare($selquery);
		$stmt-> bindValue(":id", $id);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		return $stmt;
	}

	public function SelectCartBooks($id=NULL)
	{

		if($id==NULL)
		{
			$selquery="SELECT c.`id`,b.`photo`,`user`,`adminid`,`description`,`title`,`publication`,`author`,`edition`,`price`,`category`, b.`type`AS booktype,a.`fname` AS afname,a.`lname` AS alname,a.`address` AS aaddress,a.`contact` AS acontact,u.`fname` AS ufname,u.`lname` AS ulname,u.`address` AS uaddress,u.`contact` AS ucontact,`buyerid`,c.`date` FROM cart AS c INNER JOIN book_tbl AS b ON c.bookid = b.id LEFT OUTER JOIN users AS u ON b.user = u.id LEFT OUTER JOIN admin AS a ON b.adminid=a.id";
		}
		
		else
		{
			$selquery="SELECT c.`id`,b.`photo`,`user`,`adminid`,`description`,`title`,`publication`,`author`,`edition`,`price`,`category`, b.`type`AS booktype,a.`fname` AS afname,a.`lname` AS alname,a.`address` AS aaddress,a.`contact` AS acontact,u.`fname` AS ufname,u.`lname` AS ulname,u.`address` AS uaddress,u.`contact` AS ucontact,`buyerid`,c.`date` FROM cart AS c INNER JOIN book_tbl AS b ON c.bookid = b.id LEFT OUTER JOIN users AS u ON b.user = u.id LEFT OUTER JOIN admin AS a ON b.adminid=a.id WHERE c.buyerid=:id";
		}

		$stmt =$this->conn->prepare($selquery);
		$stmt-> bindValue(":id", $id);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		return $stmt;
	}
}

class admin extends connection
{
	public function __construct()
	{
		$this-> connectdb();
	}

	public function selectbooks($id=NULL)
	{
		if($id==NULL)
		{
			$selquery="SELECT b.`id`,b.`photo`,`user`,`description`,`adminid`,`title`,`publication`,`author`,`edition`,`price`,`category`, b.`type`AS booktype,`fname`,`lname`,`address`,`contact`,`buyerid`,c.`date` FROM book_tbl AS b INNER JOIN admin AS a ON b.adminid = a.id LEFT OUTER JOIN cart AS c on b.id=c.bookid WHERE buyerid is NULL";
		}
		
		else
		{
			$selquery="SELECT  b.id,b.`photo`,`title`,`description`,`publication`,`author`,`edition`,`price`,`category`,b.type as booktype,`fname`,`lname`,`address`,`contact`,adminid FROM book_tbl as b INNER JOIN  admin as a on b.adminid=a.id WHERE b.adminid=:id";
		}

		$stmt =$this->conn->prepare($selquery);
		$stmt-> bindValue(":id", $id);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		return $stmt;
	}
	
} 

class logedin extends connection
	{
		public function __construct()
		{
			$this-> connectdb();
		}

		function getLoginDetail($tableName,$data)
		{
			unset($data['loginbtn']);

			if(isset($data['password']))
				$data['password']=md5($data['password']);

			$stmt = $this->conn->prepare("SELECT * FROM $tableName WHERE email=:email AND password=:password");
			$stmt->bindParam(':email',$data['email']);
			$stmt->bindParam(':password',$data['password']);
			if($stmt->execute())
			{
				$stmt->setFetchMode(PDO::FETCH_ASSOC); 
				if($stmt->rowCount()>0)
				{
					$info = $stmt->fetch();
					$_SESSION['id']= $info['id'];
					$_SESSION['photo'] = $info['photo'];
					$_SESSION['name'] = $info['fname'] . " " . $info['lname'];

				return true;
			
				}
					}

			return false;
		}

		function loginCheck()
		{
			if(isset($_SESSION['id']) && isset($_SESSION['photo']) && isset($_SESSION['name']))
				return true;

			return false;
		}

		function logout()
		{
			session_destroy();
			return true;
		}
	}

class user extends connection
{
	public function __construct()
		{
			$this-> connectdb();
		}


	public function selectallbook($where=NULL,$wherevalue=NULL)
	{
		if($where==NULL && $wherevalue==NULL)
		{
			$selquery="SELECT b.`id`,b.`photo`,`user`,`adminid`,`description`,`title`,`publication`,`author`,`edition`,`price`,`category`, b.`type`AS booktype,a.`fname` AS afname,a.`lname` AS alname,a.`address` AS aaddress,a.`contact` AS acontact,u.`fname` AS ufname,u.`lname` AS ulname,u.`address` AS uaddress,u.`contact` AS ucontact,`buyerid`,c.`date` FROM book_tbl AS b LEFT OUTER JOIN users AS u ON b.user = u.id LEFT OUTER JOIN admin AS a ON a.id=b.adminid LEFT OUTER JOIN cart AS c on b.id=c.bookid WHERE c.buyerid IS NULL";
		}

		else if($wherevalue==NULL)
		{
			$selquery="SELECT b.`id`,b.`photo`,`user`,`adminid`,`description`,`title`,`publication`,`author`,`edition`,`price`,`category`, b.`type`AS booktype,a.`fname` AS afname,a.`lname` AS alname,a.`address` AS aaddress,a.`contact` AS acontact,u.`fname` AS ufname,u.`lname` AS ulname,u.`address` AS uaddress,u.`contact` AS ucontact,`buyerid`,c.`date` FROM book_tbl AS b LEFT OUTER JOIN users AS u ON b.user = u.id LEFT OUTER JOIN admin AS a ON a.id=b.adminid LEFT OUTER JOIN cart AS c on b.id=c.bookid WHERE c.buyerid IS NULL AND $where";
		}
		
		else
		{
			$selquery="SELECT b.`id`,b.`photo`,`user`,`adminid`,`description`,`title`,`publication`,`author`,`edition`,`price`,`category`, b.`type`AS booktype,a.`fname` AS afname,a.`lname` AS alname,a.`address` AS aaddress,a.`contact` AS acontact,u.`fname` AS ufname,u.`lname` AS ulname,u.`address` AS uaddress,u.`contact` AS ucontact,`buyerid`,c.`date` FROM book_tbl AS b LEFT OUTER JOIN users AS u ON b.user = u.id LEFT OUTER JOIN admin AS a ON a.id=b.adminid LEFT OUTER JOIN cart AS c on b.id=c.bookid WHERE c.buyerid IS NULL AND b.$where=:$where";
		}

		$stmt =$this->conn->prepare($selquery);
		$stmt-> bindValue(":$where", $wherevalue);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		return $stmt;
	}

	public function selectbookbydate()
	{
		//if($where==NULL && $wherevalue==NULL)
		{
			$selquery="SELECT b.`id`,b.`photo`,`user`,`description`,`title`,`publication`,`author`,`edition`,`price`,`category`, b.`type`AS booktype,a.`fname` AS afname,a.`lname` AS alname,a.`address` AS aaddress,a.`contact` AS acontact,u.`fname` AS ufname,u.`lname` AS ulname,u.`address` AS uaddress,u.`contact` AS ucontact,`buyerid`,c.`date` FROM book_tbl AS b LEFT OUTER JOIN users AS u ON b.user = u.id LEFT OUTER JOIN admin AS a ON a.id=b.adminid LEFT OUTER JOIN cart AS c on b.id=c.bookid WHERE c.buyerid IS NULL";
		}
		
		/*else
		{
			$selquery="SELECT b.`id`,b.`photo`,`user`,`description`,`title`,`publication`,`author`,`edition`,`price`,`category`, b.`type`AS booktype,a.`fname` AS afname,a.`lname` AS alname,a.`address` AS aaddress,a.`contact` AS acontact,u.`fname` AS ufname,u.`lname` AS ulname,u.`address` AS uaddress,u.`contact` AS ucontact,`buyerid`,c.`date` FROM book_tbl AS b LEFT OUTER JOIN users AS u ON b.user = u.id LEFT OUTER JOIN admin AS a ON a.id=b.adminid LEFT OUTER JOIN cart AS c on b.id=c.bookid WHERE b.$where=:$where";
		}*/

		$stmt =$this->conn->prepare($selquery);
		$stmt-> bindValue(":$where", $wherevalue);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		return $stmt;
	}

	public function selectmybook($id=NULL)
	{
		if($id==NULL)
		{
			$selquery="SELECT b.`id`,b.`photo`,`user`,`description`,`adminid`,`title`,`publication`,`author`,`edition`,`price`,`category`, b.`type`AS booktype,`fname`,`lname`,`address`,`contact`,`buyerid`,c.`date` FROM book_tbl AS b INNER JOIN users AS u ON b.user = u.id LEFT OUTER JOIN cart AS c on b.id=c.bookid WHERE buyerid is NULL";
		}
		
		else
		{
			$selquery="SELECT  b.id,b.`photo`,`title`,`description`,`publication`,`author`,`edition`,`price`,`category`,b.type as booktype,`fname`,`lname`,`address`,`contact`,adminid FROM book_tbl as b INNER JOIN  users as u on b.user=u.id WHERE b.user=:id";
		}

		$stmt =$this->conn->prepare($selquery);
		$stmt-> bindValue(":id", $id);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		return $stmt;
	}

}
	
	class dashboard extends connection
	{
		
		public function __construct()
		{
			$this-> connectdb();
		}

		public function countnumber($col_name,$tableName)
		{
			$selquery="SELECT COUNT($col_name) AS numb FROM $tableName";

			$stmt =$this->conn->prepare($selquery);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			return $stmt;
		}

		public function totalrevenue($value=NULL)
		{	
			if($value == NULL)
			{
				$selquery="SELECT SUM(b.price) AS revenue FROM cart c INNER JOIN book_tbl b ON c.bookid=b.id";
			}

			else
			{
				$selquery="SELECT SUM(b.price) AS revenue FROM cart c INNER JOIN book_tbl b ON c.bookid=b.id WHERE type=:type";
			}
			
			$stmt =$this->conn->prepare($selquery);
			$stmt-> bindValue(":type", $value);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			return $stmt;
		}
	}


?>