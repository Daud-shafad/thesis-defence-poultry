<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM customers where id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"customer Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>