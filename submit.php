<?php
	include 'db_connect.php';

	if($_POST) {

		$id_number = $_POST['id_number'];
		$full_name = $_POST['full_name'];
		$nickname = $_POST['nickname'];
		$year = $_POST['year'];
		$course = $_POST['course'];
		$cellphone_number = $_POST['cellphone_number'];
		$email = $_POST['email'];
		$school = $_POST['school'];
		$memstat = $_POST['memStat'];
		$paid = $_POST['paid'];


		$db->query("INSERT INTO signups (stu_id, stu_full_name, stu_nickname, stu_year, stu_course, stu_cell_number, stu_email, stu_school, stu_memstat, stu_paid)
		  VALUES ('$id_number', '$full_name', '$nickname', '$year', '$course', '$cellphone_number', '$email', '$school', '$memstat', '$paid')");

		$db->close();

		header("Location: login.php");
	}
?>
