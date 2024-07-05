<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Module Generation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Reports Module Generation</h2>
    
    <!-- Button to open the modal to add a report -->
    <button type="button" class="btn btn-secondary mb-3" style="height:40px" data-toggle="modal" data-target="#addReportModal">
        Add Report
    </button>

    <!-- Table to display reports -->
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Report Name</th>
                <th class="text-center">Report Type</th>
                <th class="text-center">Report Date</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Quantity Sold</th>
                <th class="text-center">Start Date</th>
                <th class="text-center">End Date</th>
                <th class="text-center">Report Content</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT * FROM reports";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td class='text-center'>{$count}</td>
                            <td class='text-center'>{$row['report_name']}</td>
                            <td class='text-center'>{$row['report_type']}</td>
                            <td class='text-center'>{$row['report_date']}</td>
                            <td class='text-center'>{$row['product_name']}</td>
                            <td class='text-center'>{$row['quantity_sold']}</td>
                            <td class='text-center'>{$row['start_date']}</td>
                            <td class='text-center'>{$row['end_date']}</td>
                            <td class='text-center'>{$row['report_content']}</td>
                            <td class='text-center'>
                                <button class='btn btn-danger' style='height:40px' onclick='deleteReport({$row['report_id']})'>Delete</button>
                                <button class='btn btn-primary' style='height:40px' onclick='editReport({$row['report_id']})'>Edit</button>
                                <button class='btn btn-success' style='height:40px' onclick='printReport(this)'>Print</button>
                            </td>
                          </tr>";
                    $count++;
                }
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal for adding a report -->
<div class="modal fade" id="addReportModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Report</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="reportForm">
                    <div class="form-group">
                        <label for="report_name">Report Name:</label>
                        <input type="text" class="form-control" id="report_name" name="report_name" required>
                    </div>
                    <div class="form-group">
                        <label for="report_type">Report Type:</label>
                        <select class="form-control" id="report_type" name="report_type" required>
                            <option value="daily">Daily</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="report_date">Report Date:</label>
                        <input type="date" class="form-control" id="report_date" name="report_date" required>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Product:</label>
                        <select class="form-control" id="product_name" name="product_name" required>
                            <?php
                            $productSql = "SELECT product_name FROM products";
                            $productResult = $conn->query($productSql);
                            if ($productResult->num_rows > 0) {
                                while ($productRow = $productResult->fetch_assoc()) {
                                    echo "<option value='{$productRow['product_name']}'>{$productRow['product_name']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity_sold">Quantity Sold:</label>
                        <input type="number" class="form-control" id="quantity_sold" name="quantity_sold" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <label for="report_content">Report Content:</label>
                        <textarea class="form-control" id="report_content" name="report_content" required></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addReport()">Add Report</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for editing a report -->
<div class="modal fade" id="editReportModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Report</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editReportForm">
                    <input type="hidden" id="edit_report_id" name="report_id">
                    <div class="form-group">
                        <label for="edit_report_name">Report Name:</label>
                        <input type="text" class="form-control" id="edit_report_name" name="report_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_report_type">Report Type:</label>
                        <select class="form-control" id="edit_report_type" name="report_type" required>
                            <option value="daily">Daily</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_report_date">Report Date:</label>
                        <input type="date" class="form-control" id="edit_report_date" name="report_date" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_product_name">Product:</label>
                        <select class="form-control" id="edit_product_name" name="product_name" required>
                            <?php
                            $productSql = "SELECT product_name FROM products";
                            $productResult = $conn->query($productSql);
                            if ($productResult->num_rows > 0) {
                                while ($productRow = $productResult->fetch_assoc()) {
                                    echo "<option value='{$productRow['product_name']}'>{$productRow['product_name']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_quantity_sold">Quantity Sold:</label>
                        <input type="number" class="form-control" id="edit_quantity_sold" name="quantity_sold" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_start_date">Start Date:</label>
                        <input type="date" class="form-control" id="edit_start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_end_date">End Date:</label>
                        <input type="date" class="form-control" id="edit_end_date" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_report_content">Report Content:</label>
                        <textarea class="form-control" id="edit_report_content" name="report_content" required></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="updateReport()">Update Report</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function addReport() {
        var reportData = {
            report_name: $("#report_name").val(),
            report_type: $("#report_type").val(),
            report_date: $("#report_date").val(),
            product_name: $("#product_name").val(),
            quantity_sold: $("#quantity_sold").val(),
            start_date: $("#start_date").val(),
            end_date: $("#end_date").val(),
            report_content: $("#report_content").val()
        };
        
        $.post("./controller/generateReportController.php", reportData, function(response) {
            alert(response);
            location.reload();
        });
    }

    function deleteReport(id) {
        if (confirm("Are you sure you want to delete this report?")) {
            $.post("./controller/deleteReportController.php", { report_id: id }, function(response) {
                alert(response);
                location.reload();
            });
        }
    }

    function editReport(id) {
        $.post("./controller/getReportController.php", { report_id: id }, function(response) {
            var report = JSON.parse(response);
            $("#edit_report_id").val(report.report_id);
            $("#edit_report_name").val(report.report_name);
            $("#edit_report_type").val(report.report_type);
            $("#edit_report_date").val(report.report_date);
            $("#edit_product_name").val(report.product_name);
            $("#edit_quantity_sold").val(report.quantity_sold);
            $("#edit_start_date").val(report.start_date);
            $("#edit_end_date").val(report.end_date);
            $("#edit_report_content").val(report.report_content);
            $("#editReportModal").modal('show');
        });
    }

    function updateReport() {
        var reportData = {
            report_id: $("#edit_report_id").val(),
            report_name: $("#edit_report_name").val(),
            report_type: $("#edit_report_type").val(),
            report_date: $("#edit_report_date").val(),
            product_name: $("#edit_product_name").val(),
            quantity_sold: $("#edit_quantity_sold").val(),
            start_date: $("#edit_start_date").val(),
            end_date: $("#edit_end_date").val(),
            report_content: $("#edit_report_content").val()
        };

        $.post("./controller/updateReportController.php", reportData, function(response) {
            alert(response);
            location.reload();
        });
    }

    $("#product_name").change(function() {
        var productName = $(this).val();
        $.post("./controller/getQuantitySold.php", { product_name: productName }, function(response) {
            var data = JSON.parse(response);
            $("#quantity_sold").val(data.quantity_sold);
        });
    });

    function printReport(button) {
        var row = button.closest('tr');
        var cells = row.querySelectorAll('td:not(:last-child)');
        var content = '';
        cells.forEach(cell => {
            content += cell.innerText + '\n';
        });
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Print Report</title></head><body>');
        printWindow.document.write('<pre>' + content + '</pre>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
</body>
</html>
