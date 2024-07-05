<?php
include_once "../config/dbconnect.php";

$report_id = $_POST['report_id'];
$report_name = $_POST['report_name'];
$report_type = $_POST['report_type'];
$report_date = $_POST['report_date'];
$product_name = $_POST['product_name'];
$quantity_sold = $_POST['quantity_sold'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$report_content = $_POST['report_content'];

$sql = "UPDATE reports SET report_name='$report_name', report_type='$report_type', report_date='$report_date', product_name='$product_name', quantity_sold='$quantity_sold', start_date='$start_date', end_date='$end_date', report_content='$report_content' WHERE report_id=$report_id";

if ($conn->query($sql) === TRUE) {
    echo "Report updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
