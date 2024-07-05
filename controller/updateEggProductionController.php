<?php
include_once "../config/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eggProduction = $_POST['egg_production_id'];
    $category = $_POST['category'];
    $staff = $_POST['staffs'];
    $total = $_POST['total'];
    $productionDate = $_POST['productionDate'];

    // Debugging: Log received data
    error_log("Received data: egg_production_id=$eggProduction, category=$category, staff=$staff, total=$total, productionDate=$productionDate");

    // Update query
    $updateItem = mysqli_query($conn, "UPDATE eggproduction SET 
        category='$category', 
        staff='$staff', 
        total='$total',
        production_date='$productionDate'
        WHERE egg_production_id='$eggProduction'");

    if ($updateItem) {
        echo "true";
    } else {
        // Log any SQL errors
        error_log("Error executing query: " . mysqli_error($conn));
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method";
}
?>
