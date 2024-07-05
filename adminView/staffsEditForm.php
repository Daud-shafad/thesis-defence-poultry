<div class="container p-5">

<h4>Edit Staffs Detail</h4>
<?php
    include_once "../config/dbconnect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM staffs WHERE staff_id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $ID=$row1["staff_id"];
?>
<form id="update-Items" onsubmit="updateStaffs()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="staff_id" value="<?=$row1['staff_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">staff name:</label>
      <input type="text" class="form-control" id="staff_name" value="<?=$row1['staff_name']?>">
    </div>
    <div class="form-group">
      <label for="email">staff address:</label>
      <input type="text" class="form-control" id="staff_address" value="<?=$row1['staff_address']?>">
    </div>
    <div class="form-group">
      <label for="phone">staff phone:</label>
      <input type="tel" class="form-control" id="staff_phone" value="<?=$row1['staff_phone']?>">
    </div>
    <div class="form-group">
      <label for="date">staff job:</label>
      <input type="text" class="form-control" id="staff_job" value="<?=$row1['staff_job']?>">
    </div>
    <div class="form-group">
      <label for="date">staff salary:</label>
      <input type="number" class="form-control" id="staff_salary" value="<?=$row1['staff_salary']?>">
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