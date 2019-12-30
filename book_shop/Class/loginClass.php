<?php 
	class logedin
	{

		function loginCheck()
		{
			if(isset($_SESSION['id']) && isset($_SESSION['photo']) && isset($_SESSION['fname']) && isset($_SESSION['lname']) && isset($_SESSION['type']))
				return true;

			return false;
		}

		function logout()
		{
			session_destroy();
			return true;
		}
	}
 ?>