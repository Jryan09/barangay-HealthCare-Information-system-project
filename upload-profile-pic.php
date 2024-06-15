<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// Check if a file was uploaded
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === 0) {
    $username = $_SESSION['username'];
    $profilePictureFilename = $_FILES['profile_picture']['name'];
    $profilePictureTempName = $_FILES['profile_picture']['tmp_name'];

    // Define the directory where you want to store profile pictures
    $uploadDirectory = 'profile_pic/';

    // Move the uploaded file to the directory
    if (move_uploaded_file($profilePictureTempName, $uploadDirectory . $profilePictureFilename)) {
        // Update the database with the profile picture filename
        $sql = "UPDATE users SET profile_picture = '$profilePictureFilename' WHERE username = '$username'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);

        // Redirect back to the profile page or wherever you want
     
        header("Location: home.php" );
       
        exit();
    } else {
        echo "Error uploading the file.";
    }
} else {
    echo "No file was uploaded.";
}
?>