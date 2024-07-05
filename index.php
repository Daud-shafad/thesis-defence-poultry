<!DOCTYPE html>
<html>
<head>
  <title>Offline poultry software</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style1.css"></link>
       <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-462d1fe84b879d730fe2180b0e0354e0.css?vsn=d">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css">

  </head>
</head>
<body >
    
        <?php
          
            include "./adminHeader.php";
            include "./sidebar.php";
          
           
    
           
            include_once "./config/dbconnect.php";
          
        ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            


            <div class="col-sm-3" style="margin-top: -10px;">
                <div class="card" style="width:180px; height: 180px;">
                <i class="fa-solid fa-person" style="font-size: 40px; color: white;"></i>
                    <h5 style="color:white; margin-top: 20px;">Total Customers</h5>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from customers";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>


            <div class="col-sm-3" style="margin-top: -10px;">
            <div class="card" style="width:180px; height: 180px;">
            <i class="fa-solid fa-user-helmet-safety" style="font-size: 40px; color: white;"></i>
                    <h5 style="color:white; margin-top: 20px;" >Total Staffs</h5>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from staffs";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>


         

            <div class="col-sm-3" style="margin-top: -10px;">
                <div class="card" style="width:180px; height: 180px;">
                <i class="fa-solid fa-layer-group" style="font-size: 40px; color: white;"></i>
                    <h5 style="color:white; margin-top: 20px;">Total Categories</h5>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from category";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>


            <div class="col-sm-3" style="margin-top: -10px;">
                <div class="card" style="width:180px; height: 180px;">
                <i class="fa-solid fa-syringe" style="font-size: 40px; color: white;"></i>
                    <h5 style="color:white; margin-top: 20px;">Total Vaccinations</h5>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from vaccination";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>


            <div class="col-sm-3" style="margin-top: 30px;">
                <div class="card" style="width:180px; height: 180px;">
                <i class="fa-solid fa-boxes-stacked" style="font-size: 40px; color: white;"></i>
                    <h5 style="color:white; margin-top: 20px;">Total Hatchery</h5>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from hatchery";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>


            <div class="col-sm-3" style="margin-top: 30px;">
                <div class="card" style="width:180px; height: 180px;">
                <i class="fa-solid fa-egg" style="font-size: 40px; color: white;"></i>
                    <h5 style="color:white; margin-top: 20px;">Total Egg production</h5>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from eggproduction";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>


            <div class="col-sm-3" style="margin-top: 30px;">
                <div class="card" style="width:180px; height: 180px;">
                <i class="fa-solid fa-user" style="font-size: 40px; color: white;"></i>
                    <h5 style="color:white; margin-top: 20px;">Total Users</h5>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from users";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>



            <div class="col-sm-3" style="margin-top: 30px;">
                <div class="card" style="width:180px; height: 180px;">
                <i class="fa-solid fa-cart-shopping" style="font-size: 40px; color: white;"></i>
                    <h5 style="color:white; margin-top: 20px;">Total Products</h5>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from products";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>



            <div class="col-sm-3" style="margin-top: 30px;">
                <div class="card" style="width:180px; height: 180px;">
                <i class="fa-solid fa-sack-dollar"  style="font-size: 40px; color: white;"></i>
                    <h5 style="color:white; margin-top: 20px;">Total Sales</h5>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from sales";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>



            <div class="col-sm-3" style="margin-top: 30px;">
                <div class="card" style="width:180px; height: 180px;">
                <i class="fa-sharp fa-solid fa-file-chart-column" style="font-size: 40px; color: white;"></i>
                    <h5 style="color:white; margin-top: 20px;">generated Reports</h5>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from reports";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>



            
           



        </div>
        
    </div>
       
            
        <?php
            if (isset($_GET['category']) && $_GET['category'] == "success") {
                echo '<script> alert("Category Successfully Added")</script>';
            }else if (isset($_GET['category']) && $_GET['category'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['staffs']) && $_GET['staffs'] == "success") {
                echo '<script> alert("Staff Successfully Added")</script>';
            }else if (isset($_GET['staffs']) && $_GET['staffs'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['hatchery']) && $_GET['hatchery'] == "success") {
                echo '<script> alert("hatchery Successfully Added")</script>';
            }else if (isset($_GET['hatchery']) && $_GET['hatchery'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
        ?>


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>