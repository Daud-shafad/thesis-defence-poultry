<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
       
        $vaccination= $_POST['vaccination'];
        $staff= $_POST['staffs'];
        $qty = $_POST['qty'];

         $insert = mysqli_query($conn,"INSERT INTO hatchery
         (vaccination_id,staff_id,quantity_in_stock) VALUES ($vaccination, $staff, $qty)");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../index.php?hatchery=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../index.php?hatchery=success");
         }
     
    }
        
?>