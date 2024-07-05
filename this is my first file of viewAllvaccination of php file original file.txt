
<div >
  <h2>Vaccination Records</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Doctor Image</th>
        <th class="text-center">Vaccination Name</th>
        <th class="text-center">Vaccination Description</th>
        <th class="text-center">Category Name</th>
        <th class="text-center">Number of birds</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from vaccination, category WHERE vaccination.category_id=category.category_id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='100px' src='<?=$row["doctor_image"]?>'></td>
      <td><?=$row["vaccination_name"]?></td>
      <td><?=$row["vaccination_desc"]?></td>      
      <td><?=$row["category_name"]?></td> 
      <td><?=$row["number_of_birds"]?></td>     
      <td><button class="btn btn-primary" style="height:40px" onclick="vaccinationEditForm('<?=$row['vaccination_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="vaccinationDelete('<?=$row['vaccination_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add New Vaccination Records
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Vaccination Records</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addVaccinations()" method="POST">
            <div class="form-group">
              <label for="name">Vaccination Name:</label>
              <input type="text" class="form-control" id="v_name" required>
            </div>
            <div class="form-group">
              <label for="price">Number of birds:</label>
              <input type="number" class="form-control" id="number_of_birds" required>
            </div>
            <div class="form-group">
              <label for="qty">Description:</label>
              <input type="text" class="form-control" id="v_desc" required>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="category" >
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
                <label for="file">doctor Image:</label>
                <input type="file" class="form-control-file" id="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Vaccination</button>
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
   