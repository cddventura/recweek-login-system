<?php
include 'db_connect.php';

$id = $_GET['id'];

$result = $db->query("SELECT stu_full_name, stu_course, stu_year FROM students WHERE stu_id = $id");
$row = $result->fetch_assoc();

$db->close();

echo json_encode($row);

?>
