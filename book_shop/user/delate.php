<?php 
	require ('../class/databaseClass.php');
	$bookid= $_GET['ref'];
	$data = new database;
	$data-> delete('cart',$bookid);
	header('location: cart.php');
 ?>