<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container p-5">
<h4>Edit Report</h4>
<?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM reports WHERE report_id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
?>
<form id="update-Report" onsubmit="updateReport()" enctype='multipart/form-data'>
    <div class="form-group">
        <input type="text" class="form-control" id="report_id" value="<?= $row1['report_id'] ?>" hidden>
    </div>
    <div class="form-group">
        <label for="report_name">Report Name:</label>
        <input type="text" class="form-control" id="report_name" value="<?= $row1['report_name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="report_type">Report Type:</label>
        <select id="report_type" class="form-control" required>
            <option value="daily" <?= ($row1['report_type'] == 'daily') ? 'selected' : '' ?>>Daily</option>
            <option value="monthly" <?= ($row1['report_type'] == 'monthly') ? 'selected' : '' ?>>Monthly</option>
            <option value="yearly" <?= ($row1['report_type'] == 'yearly') ? 'selected' : '' ?>>Yearly</option>
        </select>
    </div>
    <div class="form-group">
        <label for="report_date">Report Date:</label>
        <input type="date" class="form-control" id="report_date" value="<?= $row1['report_date'] ?>" required>
    </div>
    <div class="form-group">
        <label for="report_content">Report Content:</label>
        <textarea class="form-control" id="report_content" required><?= $row1['report_content'] ?></textarea>
    </div>
    <div class="form-group">
        <button type="submit" style="height:40px" class="btn btn-primary">Update Report</button>
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
<script>
    function updateReport(event) {
        event.preventDefault();
        
        var reportData = {
            report_id: $('#report_id').val(),
            report_name: $('#report_name').val(),
            report_type: $('#report_type').val(),
            report_date: $('#report_date').val(),
            report_content: $('#report_content').val()
        };

        $.post("../controller/updateReportController.php", reportData, function(data) {
            alert(data);
            location.reload();
        });
    }
</script>
</body>
</html>
