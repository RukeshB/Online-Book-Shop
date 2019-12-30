<?php 
	require ('../class/databaseClass.php');
	$userid= $_GET['ref'];
	$data = new database;
	$data-> delete('users',$userid);
	header('location: manageuser.php');
 ?>