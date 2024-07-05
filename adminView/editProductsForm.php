<div class="container p-5">

<h4>Edit products Detail</h4>
<?php
    include_once "../config/dbconnect.php";
	$productId=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$productId'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $productId=$row1["product_id"];
?>
<form id="update-Items" onsubmit="updateProducts()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="product_id" value="<?=$row1['product_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">Product name:</label>
      <input type="text" class="form-control" id="product_name" value="<?=$row1['product_name']?>">
    </div>
   
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update details</button>
    </div>
    <?php
    		}
    	}
    ?>
  
  </form>

    </div>