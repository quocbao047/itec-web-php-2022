<?php
	session_start();
	include_once('connection.php');
	if(isset($_SESSION['tk'])){
		$id_sp = $_GET['id_sp'];
		$sql = "DELETE FROM product WHERE id_sp = $id_sp";
		$query = mysql_query($sql);
		header('location:adminitration.php?page_layout=list');
	}else{
		header('location:index.php');
	}
?>