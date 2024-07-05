<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $staffs = $_POST['staffs'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $job = $_POST['job'];
        $salary = $_POST['salary'];
       
         $insert = mysqli_query($conn,"INSERT INTO staffs
         (staff_name,staff_address,staff_phone,staff_job,staff_salary)   VALUES ('$staffs', '$address', '$phone', '$job', '$salary')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../index.php?staffs=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../index.php?staffs=success");
         }
     
    }
        
?>