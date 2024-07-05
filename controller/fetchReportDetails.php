<?php
include_once "../config/dbconnect.php";

$report_id = $_POST['report_id'];

$sql = "SELECT * FROM reports WHERE report_id = $report_id";
$result = $conn->query($sql);
$reportDetails = $result->fetch_assoc();

echo json_encode($reportDetails);

$conn->close();
?>
