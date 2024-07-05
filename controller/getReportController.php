<?php
include_once "../config/dbconnect.php";

$id = $_POST['report_id'];

$sql = "SELECT * FROM reports WHERE report_id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo json_encode($row);

$conn->close();
?>
