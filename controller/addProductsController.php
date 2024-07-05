<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
       
        $productName= $_POST['product_name'];
       

         $insert = mysqli_query($conn,"INSERT INTO products
         (product_name) VALUES ('$productName')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../index.php?product=error");
         }
         else
         {
             echo "product added successfully.";
             header("Location: ../index.php?product=success");
         }
     
    }
        
?>