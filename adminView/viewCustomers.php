<?php
include_once "../config/dbconnect.php";

// Default query to fetch all customers
$sql = "SELECT * FROM customers";

// Check if search query is present
if (isset($_GET['search_phone'])) {
    // Search query provided, modify the SQL query
    $search_phone = '%' . $_GET['search_phone'] . '%';
    $sql .= " WHERE phone LIKE ?";
}

$stmt = $conn->prepare($sql);

// Bind parameters if search query is present
if (isset($search_phone)) {
    $stmt->bind_param("s", $search_phone);
}

$stmt->execute();
$result = $stmt->get_result();

// Function to generate table rows
function generateTableRows($result) {
    $count = 1;
    $output = '';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output .= '
            <tr>
                <td class="text-center">' . $count . '</td>
                <td class="text-center">' . $row["name"] . '</td>
                <td class="text-center">' . $row["email"] . '</td>
                <td class="text-center">' . $row["phone"] . '</td>
                <td class="text-center">' . $row["joiningDate"] . '</td>
                <td class="text-center"><button class="btn btn-primary" style="height:40px" onclick="customersEditForm(\'' . $row['id'] . '\')">Edit</button></td>
                <td class="text-center"><button class="btn btn-danger" onclick="customersDelete(\'' . $row['id'] . '\')">Delete</button></td>
            </tr>';
            $count++;
        }
    } else {
        $output .= '<tr><td colspan="7" class="text-center">No customers found</td></tr>';
    }
    return $output;
}

// Check if it's an AJAX request
if (isset($_GET['search_phone'])) {
    echo generateTableRows($result);
    $stmt->close();
    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<div class="container">
    <h3>Available Customers</h3>

    <!-- Search Form -->
    <form id="searchForm" method="GET">
        <input type="text" id="searchPhone" name="search_phone" placeholder="Search by Phone" class="form-control" style="width: 200px; display: inline-block;">
        <button type="submit" class="btn btn-danger">Search</button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th class="text-center">S.N.</th>
            <th class="text-center">Customer name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Joining-Date</th>
            <th class="text-center" colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        echo generateTableRows($result);
        $stmt->close();
        $conn->close();
        ?>
        </tbody>
    </table>

    <!-- Add New Customer Button -->
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
        Add New Customer
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Customer Record</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="./controller/addCusController.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" required>
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" required>
                            <label for="phone">Phone:</label>
                            <input type="tel" class="form-control" name="phone" required>
                            <label for="joiningDate">Joining-Date:</label>
                            <input type="date" class="form-control" name="joiningDate" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Customer</button>
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
<script>
    // Submit search form via AJAX
    $(document).ready(function(){
        $('#searchForm').submit(function(event){
            event.preventDefault(); // Prevent default form submission

            // Get form data
            var formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                url: './adminView/viewCustomers.php',
                type: 'GET',
                data: formData,
                success: function(response){
                    // Replace table content with search results
                    $('table tbody').html(response);
                }
            });
        });
    });
</script>
</body>
</html>
