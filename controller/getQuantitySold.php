<?php
include_once "../config/dbconnect.php";

$product_name = $_POST['product_name'];
$sql = "SELECT SUM(quantity_sold) as quantity_sold FROM sales WHERE product_name = '$product_name'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo json_encode($row);

$conn->close();
?>
