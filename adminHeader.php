<?php
   session_start();
   include_once "./config/dbconnect.php";

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color:rgb(238,74,14);">
    
    <a style="font-family: sans-serif; color: white; text-transform: capitalize;" class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/hen2.png" width="80" height="80" alt="maandeeq_db">
        maandeeq poultry
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>
          <?php
        } else {
            ?>
            <a style="font-size: 25px; text-decoration: none; text-transform: capitalize; color:white; font-family: sans-serif;" href="../hobbs/index.php" style="text-decoration:none;">
                 logout   <i class="fa fa-sign-in mr-5" style="font-size:25px; color:#fff;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>
