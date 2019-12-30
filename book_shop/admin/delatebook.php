<?php 
	require ('../class/databaseClass.php');
	$bookid= $_GET['ref'];
	$data = new database;
	$data-> delete('book_tbl',$bookid);
	header('location: managebooks.php');
 ?>