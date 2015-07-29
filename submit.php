<?php
	include 'db_connect.php';

	if($_POST) {

		$id_number = $_POST['id_number'];
		$full_name = $_POST['full_name'];
		$cellphone_number = (string)$_POST['cellphone_number'];

		$db->query("INSERT INTO attendance (id, full_name, cellphone_number)
		  VALUES ('$id_number', '$full_name', '$cellphone_number')");

		$db->close();

		header("Location: login.php");	
		
	}
?>