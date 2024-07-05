
<div >
  <h2>Hatchery Records</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Vaccination name</th>
        <th class="text-center">Staff name</th>
        <th class="text-center">Stock Quantity</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from hatchery h, vaccination v, staffs s WHERE v.vaccination_id=h.vaccination_id AND h.staff_id=s.staff_id ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["vaccination_name"]?></td>
      <td><?=$row["staff_name"]?></td>      
      <td><?=$row["quantity_in_stock"]?></td>     
      <td><button class="btn btn-primary" style="height:40px" onclick="hatcheryEditForm('<?=$row['hatchery_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px"  onclick="hatcheryDelete('<?=$row['hatchery_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Hatchery Records
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Hatchery Records</h4>
          <button type="button" class="close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addHatcheryController.php" method="POST">
            
            <div class="form-group">
              <label>Vaccination:</label>
              <select name="vaccination" >
                <option disabled selected>Select Vaccination</option>
                <?php

                  $sql="SELECT * from vaccination";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['vaccination_id']."'>".$row['vaccination_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Staff:</label>
              <select name="staffs" >
                <option disabled selected>Select staff</option>
                <?php

                  $sql="SELECT * from staffs";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['staff_id']."'>".$row['staff_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="qty">Stock Quantity:</label>
              <input type="number" class="form-control" name="qty" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Hatchery Record</button>
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
   