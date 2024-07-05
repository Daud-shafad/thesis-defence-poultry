<?php
include_once "../config/dbconnect.php";

if(isset($_POST['record'])) {
    $sale_id = $_POST['record'];

    $sql = "DELETE FROM sales WHERE sale_id='$sale_id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "Sale deleted successfully.";
    } else {
        echo "Failed to delete sale.";
    }
}
?>
