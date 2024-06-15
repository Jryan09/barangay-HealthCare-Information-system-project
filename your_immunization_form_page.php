<?php

if (isset($_POST['save'])) {
    include 'config.php';

    $patientName = $_POST['patient_name'];
    $vaccineName = $_POST['vaccine_name'];
    $vaccinationDate = $_POST['vaccination_date'];
    $healthProvider = $_POST['health_provider']; // Add this line

    $sql = "INSERT INTO immunization (patient_name, vaccine_name, vaccination_date, health_provider) 
            VALUES ('$patientName', '$vaccineName', '$vaccinationDate', '$healthProvider')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['immunization_form_submitted'] = true;
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} 
?>