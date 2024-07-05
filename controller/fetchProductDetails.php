<?php
include_once "../config/dbconnect.php";

$product_id = $_POST['product_id'];

$sql = "SELECT p.product_name, s.quantity_sold, MIN(s.sale_date) as start_date, MAX(s.sale_date) as end_date 
        FROM products p 
        LEFT JOIN sales s ON p.product_id = s.product_id 
        WHERE p.product_id = $product_id";

$result = $conn->query($sql);
$productDetails = $result->fetch_assoc();

echo json_encode($productDetails);

$conn->close();
?>
