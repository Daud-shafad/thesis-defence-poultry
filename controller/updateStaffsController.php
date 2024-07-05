<?php
include_once "../config/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['staff_id'];
    $name = $_POST['staff_name'];
    $address = $_POST['staff_address'];
    $phone = $_POST['staff_phone'];
    $job = $_POST['staff_job'];
    $salary = $_POST['staff_salary'];

    // Debugging: Log the received data
    error_log("staff_id: $id, staff_name: $name, staff_address: $address, staff_Phone: $phone, staff_job: $job, staff_salary: $salary");

    $query = "UPDATE staffs SET staff_name='$name', staff_address='$address', staff_phone='$phone', staff_job='$job', staff_salary=$salary WHERE staff_id='$id'";
    
    if (mysqli_query($conn, $query)) {
        echo "Update success";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
