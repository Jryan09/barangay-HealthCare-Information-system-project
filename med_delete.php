<?php
include 'config.php'; // Database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM medical_history WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo '<script> 
        window.location.href="medical_history.php";
        </script>';

    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
<br><a href="record.php">Back to List</a>