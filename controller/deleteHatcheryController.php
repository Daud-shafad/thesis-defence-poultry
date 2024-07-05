<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM hatchery where hatchery_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Hatchery Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>