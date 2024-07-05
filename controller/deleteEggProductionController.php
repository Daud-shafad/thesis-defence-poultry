<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM eggproduction where egg_production_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"egg production records Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>