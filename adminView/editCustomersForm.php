<div class="container p-5">

<h4>Edit Customers Detail</h4>
<?php
    include_once "../config/dbconnect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM customers WHERE id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $ID=$row1["id"];
?>
<form id="update-Items" onsubmit="updateCustomers()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="id" value="<?=$row1['id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">Customer Name:</label>
      <input type="text" class="form-control" id="name" value="<?=$row1['name']?>">
    </div>
    <div class="form-group">
      <label for="email">email:</label>
      <input type="email" class="form-control" id="email" value="<?=$row1['email']?>">
    </div>
    <div class="form-group">
      <label for="phone">phone:</label>
      <input type="tel" class="form-control" id="phone" value="<?=$row1['phone']?>">
    </div>
    <div class="form-group">
      <label for="date">joining-date:</label>
      <input type="date" class="form-control" id="joiningDate" value="<?=$row1['joiningDate']?>">
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