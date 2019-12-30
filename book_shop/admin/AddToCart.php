<?php 
	require ('../class/databaseClass.php');
	$bookid = $_GET['ref'];
	$detail = array("bookid"=>$bookid, "buyerid"=>$_SESSION['id'], "date"=>date("Y/m/d"));
	$data = new database;
	 $data -> insert($detail, 'cart');

	 header('location: store.php');
 ?>