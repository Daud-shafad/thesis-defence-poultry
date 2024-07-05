<?php
include_once "../config/dbconnect.php";

$id = $_POST['report_id'];

$sql = "DELETE FROM reports WHERE report_id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Report deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
