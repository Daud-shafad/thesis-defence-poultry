<?php
    include_once "../config/dbconnect.php";

    $hatchery=$_POST['hatchery_id'];
    $vaccination= $_POST['vaccination'];
    $staff= $_POST['staffs'];
    $qty= $_POST['qty'];
   
    $updateItem = mysqli_query($conn,"UPDATE hatchery SET 
        vaccination_id=$vaccination, 
        staff_id=$staff,
        quantity_in_stock=$qty 
        WHERE hatchery_id=$hatchery");


    if($updateItem)
    {
        echo "true";
    }
?>