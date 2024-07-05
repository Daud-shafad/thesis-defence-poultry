<?php
include_once "../config/dbconnect.php";

// Search functionality
$search_phone = isset($_GET['search_phone']) ? $_GET['search_phone'] : '';

// Default query to fetch all customers
$sql = "SELECT * FROM customers";

// Modify query if searching by phone
if (!empty($search_phone)) {
    $sql .= " WHERE phone LIKE ?";
}

$stmt = $conn->prepare($sql);

if (!empty($search_phone)) {
    $search_phone = "%$search_phone%";
    $stmt->bind_param("s", $search_phone);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<table class="table">
    <thead>
    <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Customer name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone</th>
        <th class="text-center">Joining-Date</th>
        <th class="text-center" colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td class="text-center"><?= $count ?></td>
                <td class="text-center"><?= $row["name"] ?></td>
                <td class="text-center"><?= $row["email"] ?></td>
                <td class="text-center"><?= $row["phone"] ?></td>
                <td class="text-center"><?= $row["joiningDate"] ?></td>
                <td class="text-center"><button class="btn btn-primary" style="height:40px" onclick="customersEditForm('<?= $row['id'] ?>')">Edit</button></td>
                <td class="text-center"><button class="btn btn-danger" onclick="customersDelete('<?= $row['id'] ?>')">Delete</button></td>
            </tr>
            <?php
            $count++;
        }
    } else {
        echo "<tr><td colspan='7' class='text-center'>No customers found</td></tr>";
    }
    $stmt->close();
    $conn->close();
    ?>
    </tbody>
</table>
