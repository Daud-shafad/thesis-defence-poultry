<?php
    include_once "../config/dbconnect.php";

    $vaccination_id=$_POST['vaccination_id'];
    $v_name= $_POST['v_name'];
    $v_desc= $_POST['v_desc'];
    $numOfBirds= $_POST['number_of_birds'];
    $category= $_POST['category'];

    if( isset($_FILES['newImage']) ){
        
        $location="./uploads/";
        $img = $_FILES['newImage']['name'];
        $tmp = $_FILES['newImage']['tmp_name'];
        $dir = '../uploads/';
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','webp');
        $image =rand(1000,1000000).".".$ext;
        $final_image=$location. $image;
        if (in_array($ext, $valid_extensions)) {
            $path = UPLOAD_PATH . $image;
            move_uploaded_file($tmp, $dir.$image);
        }
    }else{  
        $final_image=$_POST['existingImage'];
    }
    $updateItem = mysqli_query($conn,"UPDATE vaccination SET 
        vaccination_name='$v_name', 
        vaccination_desc='$v_desc', 
        number_of_birds=$numOfBirds,
        category_id=$category,
        doctor_image='$final_image' 
        WHERE vaccination_id=$vaccination_id");


    if($updateItem)
    {
        echo "true";
    }
    // else
    // {
    //     echo mysqli_error($conn);
    // }
?>