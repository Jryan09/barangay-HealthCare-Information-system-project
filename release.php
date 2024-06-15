<?php
include 'config.php';

if (isset($_POST['submit'])) {
  
    $name = $_POST['name'];
    $reason = $_POST['reason'];
    $medname = $_POST['medname'];
    $quantity = $_POST['release_quantity'];

    // Insert into the 'released' table
    $insertReleasedSql = "INSERT INTO released (name, reasons, medicine_name, quatity) VALUES ('$name', '$reason', '$medname', '$quantity')";
    $insertReleasedResult = mysqli_query($conn, $insertReleasedSql);

    // Check if the insert into 'released' was successful
    if ($insertReleasedResult) {
        // Update the quantity in the 'medicine' table
        $updateMedicineSql = "UPDATE medicine SET stock = stock - $quantity WHERE medicine_name = '$medname'";
        $updateMedicineResult = mysqli_query($conn, $updateMedicineSql);

        // Check if the update in 'medicine' was successful
        if ($updateMedicineResult) {
            echo "<script>
                alert('Success! Medicine released and quantity updated.');
                window.location.href='medicine.php'
                </script>";
        } else {
            echo "Error updating quantity in medicine table: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting data into released table: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
