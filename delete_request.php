<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_sql = "DELETE FROM request WHERE id = $id";
    $delete_result = mysqli_query($conn, $delete_sql);

    if ($delete_result) {
        header("Location: msg.php"); // Redirect to the page where you display requests
        exit();
    } else {
        echo "Error deleting request: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
