<?php 
	include '../admin/config/helper.php';
	require ('../class/databaseClass.php');

	$check = new logedin;
	$result = $check->logout();
	if($result)
	{
		redirect('home.php');
	}
 ?>