<?php

    include_once "../config/dbconnect.php";
    
    $v_id=$_POST['record'];
    $query="DELETE FROM vaccination where vaccination_id='$v_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Vaccination records Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>