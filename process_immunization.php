<!-- process_immunization.php -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';
$username = $_POST['username'];
    $patientName = $_POST['patient_name'];
    $vaccineName = $_POST['vaccine_name'];
    $vaccinationDate = $_POST['vaccination_date'];
    $healthProvider = $_POST['health_provider']; // Add this line

    $sql = "INSERT INTO immunization (username, patient_name, vaccine_name, vaccination_date, health_provider) 
            VALUES ('$username', '$patientName', '$vaccineName', '$vaccinationDate', '$healthProvider')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('success!');
        window.location.href='immunization.php'
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    header("Location: index.php");
    exit();
}
?>
