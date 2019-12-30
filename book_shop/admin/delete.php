<?php 
	require ('../class/databaseClass.php');
	$cartid= $_GET['ref'];
	$data = new database;
	$data-> delete('cart',$cartid);
	header('location: cart.php');
 ?>