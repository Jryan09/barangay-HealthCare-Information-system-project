<?php
include 'config.php';

if (isset($_GET['medicine_id']) && isset($_GET['quantity'])) {
    $medicineId = $_GET['medicine_id'];
    $quantityToAdd = $_GET['quantity'];

    // Update the stock in the database
    $updateSql = "UPDATE medicine SET stock = stock + $quantityToAdd WHERE id = $medicineId";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        echo "add stock successful!";
    } else {
        echo "Error updating stock: " . mysqli_error($conn);
    }
} else {
    echo "Invalid parameters.";
}

mysqli_close($conn);
?>
