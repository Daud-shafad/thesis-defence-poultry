<div >
  <h2>Egg production Records</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Category name</th>
        <th class="text-center">Staff name</th>
        <th class="text-center">Total</th>
        <th class="text-center">Production Date</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from eggproduction e, category c, staffs s WHERE c.category_id = e.category AND e.staff=s.staff_id ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["category_name"]?></td>
      <td><?=$row["staff_name"]?></td>      
      <td><?=$row["total"]?></td>  
      <td><?=$row["production_date"]?></td>      
      <td><button class="btn btn-primary" style="height:40px" onclick="eggProductionEditForm('<?=$row['egg_production_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px"  onclick="eggProductionDelete('<?=$row['egg_production_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Egg production Records
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Egg production Records</h4>
          <button type="button" class="close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addEggProductionController.php" method="POST">
            
            <div class="form-group">
              <label>category:</label>
              <select name="category" >
                <option disabled selected>Select category</option>
                <?php

                  $sql="SELECT * from category";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['category_id']."'>".$row['category_name'] ."</option>";
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
              <label for="qty">Total:</label>
              <input type="number" class="form-control" name="total" required>
              <label for="productionDate">production_Date:</label>
              <input type="datetime-local" class="form-control" name="productionDate" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Egg production Record</button>
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