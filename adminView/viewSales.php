<?php
include_once "../config/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Sales Records</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Customer ID</th>
                <th class="text-center">Quantity Sold</th>
                <th class="text-center">Sale Date</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql="SELECT s.sale_id, p.product_name, s.customer_id, s.quantity_sold, s.sale_date 
                  FROM sales s
                  INNER JOIN products p ON s.product_id = p.product_id";
            $result=$conn->query($sql);
            $count=1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td class="text-center"><?=$count?></td>
                        <td class="text-center"><?=$row["product_name"]?></td>
                        <td class="text-center"><?=$row["customer_id"]?></td>
                        <td class="text-center"><?=$row["quantity_sold"]?></td>
                        <td class="text-center"><?=$row["sale_date"]?></td>
                        <td class="text-center">
                            <button class="btn btn-primary" style="height:40px" onclick="salesEditForm('<?=$row['sale_id']?>')">Edit</button>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-danger" style="height:40px" onclick="salesDelete('<?=$row['sale_id']?>')">Delete</button>
                        </td>
                    </tr>
                    <?php
                    $count++;
                }
            }
            ?>
        </tbody>
    </table>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#addSaleModal">
        Add Sales Record
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addSaleModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Sales Record</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="./controller/addSaleController.php" method="POST">
                        <div class="form-group">
                            <label>Product:</label>
                            <select name="product" class="form-control">
                                <option disabled selected>Select Product</option>
                                <?php
                                $sql="SELECT * from products";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='".$row['product_id']."'>".$row['product_name']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Customer:</label>
                            <select name="customer_id" class="form-control">
                                <option disabled selected>Select Customer</option>
                                <?php
                                $sql="SELECT * from customers";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='".$row['id']."'>".$row['id']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity Sold:</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Sale Date:</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Sales Record</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../ajaxWork.js"></script>
</body>
</html>
