<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $vaccinationName = $_POST['v_name'];
        $desc= $_POST['v_desc'];
        $numOfBirds = $_POST['number_of_birds'];
        $category = $_POST['category'];
       
            
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;

        move_uploaded_file($temp,$finalImage);

         $insert = mysqli_query($conn,"INSERT INTO vaccination
         (vaccination_name,doctor_image,number_of_birds,vaccination_desc,category_id) 
         VALUES ('$vaccinationName','$image','$numOfBirds','$desc','$category')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Records added successfully.";
         }
     
    }
        
?>