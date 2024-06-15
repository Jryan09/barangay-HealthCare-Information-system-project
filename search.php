<?php
include 'config.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    header("Location: record.php?query=$query");
} else {
    echo "No search query provided.";
}

mysqli_close($conn);
?>
