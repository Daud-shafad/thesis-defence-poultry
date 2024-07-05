<?php
include_once "../config/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
  
 
    // Debugging: Log the received data
    error_log("product_name: $productName");

    $query = "UPDATE products SET product_name='$productName' WHERE product_id='$productId'";
    
    if (mysqli_query($conn, $query)) {
        echo "Update success";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
