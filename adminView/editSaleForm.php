<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sales Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container p-5">
<h4>Edit Sales Record</h4>
<?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * from sales Where sale_id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
            $pID = $row1["product_id"];
?>
<form id="update-Items" onsubmit="updateSale()" enctype='multipart/form-data'>
    <div class="form-group">
        <input type="text" class="form-control" id="sale_id" value="<?= $row1['sale_id'] ?>" hidden>
    </div>
    <div class="form-group">
        <label>Product:</label>
        <select id="product" class="form-control">
        <?php
            $sql = "SELECT * from products where product_id=$pID";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option selected value='" . $row['product_id'] . "'>" . $row['product_name'] . "</option>";
                }
            }
            $sql = "SELECT * from products where product_id != $pID";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['product_id'] . "'>" . $row['product_name'] . "</option>";
                }
            }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label>Customer:</label>
        <select id="customer_id" class="form-control">
        <?php
            $sql = "SELECT * from customers";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $selected = ($row['customer_id'] == $row1['customer_id']) ? 'selected' : '';
                    echo "<option $selected value='" . $row['id'] . "'>" . $row['id'] . "</option>";
                }
            }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity Sold:</label>
        <input type="number" class="form-control" id="quantity" value="<?= $row1['quantity_sold'] ?>" required>
    </div>
    <div class="form-group">
        <label for="date">Sale Date:</label>
        <input type="date" class="form-control" id="date" value="<?= $row1['sale_date'] ?>" required>
    </div>
    <div class="form-group">
        <button type="submit" style="height:40px" class="btn btn-primary">Update Sale</button>
    </div>
</form>
<?php
        }
    } else {
        echo "<p>No records found.</p>";
    }
?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
