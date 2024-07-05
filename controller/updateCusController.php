<?php
include_once "../config/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $joiningDate = $_POST['joiningDate'];

    // Debugging: Log the received data
    error_log("ID: $id, Name: $name, Email: $email, Phone: $phone, Joining Date: $joiningDate");

    $query = "UPDATE customers SET name='$name', email='$email', phone='$phone', joiningDate='$joiningDate' WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        echo "Update success";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
