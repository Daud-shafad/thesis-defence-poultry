<div class="container p-5">
    <h4>Edit Egg Production Records</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM eggproduction WHERE egg_production_id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
            $cID = $row1["category"];
            $sID = $row1["staff"];
    ?>
    <form id="update-Items" onsubmit="updateEggProduction(event)" enctype='multipart/form-data'>
        <div class="form-group">
            <input type="text" class="form-control" id="egg_production_id" name="egg_production_id" value="<?= $row1['egg_production_id'] ?>" hidden>
        </div>
        <div class="form-group">
            <label>Category:</label>
            <select id="category" name="category" class="form-control">
                <?php
                $sql = "SELECT * FROM category WHERE category_id=$cID";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option selected value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                    }
                }

                $sql = "SELECT * FROM category WHERE category_id != $cID";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Staff:</label>
            <select id="staffs" name="staffs" class="form-control">
                <?php
                $sql = "SELECT * FROM staffs WHERE staff_id=$sID";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option selected value='" . $row['staff_id'] . "'>" . $row['staff_name'] . "</option>";
                    }
                }

                $sql = "SELECT * FROM staffs WHERE staff_id != $sID";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="total">Total:</label>
            <input type="number" class="form-control" id="total" name="total" value="<?= $row1['total'] ?>" required>
        </div>
        <div class="form-group">
            <label for="productionDate">Production Date:</label>
            <input type="datetime-local" class="form-control" id="productionDate" name="productionDate" value="<?= $row1['production_date'] ?>" required>
        </div>
        <div class="form-group">
            <button type="submit" style="height:40px" class="btn btn-primary">Update Egg Production Records</button>
        </div>
    </form>
    <?php
        }
    } else {
        echo "<p>No records found.</p>";
    }
    ?>
</div>
