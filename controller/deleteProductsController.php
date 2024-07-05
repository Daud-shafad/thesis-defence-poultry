<?php

    include_once "../config/dbconnect.php";
    
    $productId=$_POST['record'];
    $query="DELETE FROM products where product_id='$productId'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo" product records Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>