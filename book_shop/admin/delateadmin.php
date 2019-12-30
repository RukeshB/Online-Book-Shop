<?php 
	require ('../class/databaseClass.php');
	$adminid= $_GET['ref'];
	$data = new database;
	$data-> delete('admin',$adminid);
	header('location: manageadmin.php');
 ?>