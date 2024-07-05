<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
       
        $category= $_POST['category'];
        $staff= $_POST['staffs'];
        $total = $_POST['total'];
        $date = $_POST['productionDate'];

         $insert = mysqli_query($conn,"INSERT INTO eggproduction
         (category,staff,total,production_date) VALUES ('$category', '$staff', '$total', '$date')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../index.php?eggproduction=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../index.php?eggproduction=success");
         }
     
    }
        
?>