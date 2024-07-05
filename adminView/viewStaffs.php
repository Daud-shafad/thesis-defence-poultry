
<div >
  <h3>Available Staffs</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Staff name</th>
        <th class="text-center">Staff address</th>
        <th class="text-center">Staff phone</th>
        <th class="text-center">Staff job</th>
        <th class="text-center">Staff salary</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from staffs";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["staff_name"]?></td> 
      <td><?=$row["staff_address"]?></td>
      <td><?=$row["staff_phone"]?></td>  
      <td><?=$row["staff_job"]?></td>  
      <td><?=$row["staff_salary"]?></td>  
      <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
      <td><button class="btn btn-primary" style="height:40px" onclick="staffsEditForm('<?=$row['staff_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="staffsDelete('<?=$row['staff_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add New Staff
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Staff Record</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addStaffsController.php" method="POST">
            <div class="form-group">
              <label for="staffs">Staff name:</label>
              <input type="text" class="form-control" name="staffs" required>
              <label for="address">Staff address:</label>
              <input type="text" class="form-control" name="address" required>
              <label for="phone">Staff phone:</label>
              <input type="tel" class="form-control" name="phone" required>
              <label for="job">Staff job:</label>
              <input type="text" class="form-control" name="job" required>
              <label for="salary">Staff salary:</label>
              <input type="number" class="form-control" name="salary" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Staff</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   