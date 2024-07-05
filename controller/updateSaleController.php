<?php
include_once "../config/dbconnect.php";

if(isset($_POST['sale_id'])) {
    $sale_id = $_POST['sale_id'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $customer_id = $_POST['customer_id']; // Add this line

    $sql = "UPDATE sales SET product_id='$product', quantity_sold='$quantity', sale_date='$date', customer_id='$customer_id' WHERE sale_id='$sale_id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "Sale updated successfully.";
    } else {
        echo "Failed to update sale.";
    }
}
?>
