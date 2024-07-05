<?php
include_once "../config/dbconnect.php";

if(isset($_POST['upload'])) {
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $customer_id = $_POST['customer_id']; // Add this line

    $sql = "INSERT INTO sales (product_id, quantity_sold, sale_date, customer_id) VALUES ('$product', '$quantity', '$date', '$customer_id')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "Sale added successfully.";
    } else {
        echo "Failed to add sale.";
    }
}
?>
