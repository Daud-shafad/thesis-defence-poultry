<div class="container p-5">

<h4>Edit Hatchery Records</h4>
<?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * from hatchery Where hatchery_id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
            $vID = $row1["vaccination_id"];
            $sID = $row1["staff_id"];
?>
<form id="update-Items" onsubmit="updateHatchery()" enctype='multipart/form-data'>
    <div class="form-group">
        <input type="text" class="form-control" id="hatchery_id" value="<?= $row1['hatchery_id'] ?>" hidden>
    </div>
    <div class="form-group">
        <label>Vaccination:</label>
        <select id="vaccination" class="form-control">
        <?php
            $sql = "SELECT * from vaccination where vaccination_id=$vID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option selected value='" . $row['vaccination_id'] . "'>" . $row['vaccination_name'] . "</option>";
                }
            }
            $sql = "SELECT * from vaccination where vaccination_id != $vID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['vaccination_id'] . "'>" . $row['vaccination_name'] . "</option>";
                }
            }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label>Staff:</label>
        <select id="staffs" class="form-control">
        <?php
            $sql = "SELECT * from staffs where staff_id=$sID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option selected value='" . $row['staff_id'] . "'>" . $row['staff_name'] . "</option>";
                }
            }
            $sql = "SELECT * from staffs where staff_id != $sID";
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
        <label for="qty">Stock Quantity:</label>
        <input type="number" class="form-control" id="qty" value="<?= $row1['quantity_in_stock'] ?>" required>
    </div>
    <div class="form-group">
        <button type="submit" style="height:40px" class="btn btn-primary">Update Hatchery</button>
    </div>
</form>
<?php
        }
    } else {
        echo "<p>No records found.</p>";
    }
?>
</div>
