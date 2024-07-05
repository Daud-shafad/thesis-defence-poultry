<?php
include_once "../config/dbconnect.php";

$report_name = $_POST['report_name'];
$report_type = $_POST['report_type'];
$report_date = $_POST['report_date'];
$product_name = $_POST['product_name'];
$quantity_sold = $_POST['quantity_sold'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$report_content = $_POST['report_content'];

$sql = "INSERT INTO reports (report_name, report_type, report_date, product_name, quantity_sold, start_date, end_date, report_content)
        VALUES ('$report_name', '$report_type', '$report_date', '$product_name', '$quantity_sold', '$start_date', '$end_date', '$report_content')";

if ($conn->query($sql) === TRUE) {
    echo "New report created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
