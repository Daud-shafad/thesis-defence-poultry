<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM staffs where staff_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Staff Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>