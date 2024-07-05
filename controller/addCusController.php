<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $name = $_POST['name'];
        $email= $_POST['email'];
        $phone = $_POST['phone'];
        $joiningDate = $_POST['joiningDate'];

         $insert = mysqli_query($conn,"INSERT INTO customers
         (name,email,phone,joiningDate) VALUES ('$name','$email','$phone','$joiningDate')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../index.php?customer=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../index.php?customer=success");
         }
     
    }
        
?>