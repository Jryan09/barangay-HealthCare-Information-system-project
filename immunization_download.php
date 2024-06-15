<?php



include 'config.php'; //pag-access sa database connection 

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    

    $sql = "SELECT * FROM medical_history WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Database query failed: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Define the filename for the downloaded Excel file (e.g., "data.csv")
        $filename = "data.csv";

        //paggawa o pagbukas ng file 
        $file = fopen($filename, "w");

        // pagdagdag ng csv  header row
        $header = array("Patient Name", "Vaccine Name", "Date", "Health Provider");
        fputcsv($file, $header);

        // Add data row
        $data = array(
            $row['patient_name'],
            $row['vaccine_name'],
            $row['vaccine_date'],
            $row['health_provider'],
         
            

        );
        fputcsv($file, $data);

        // Close the file
        fclose($file);

        //paglalagay ng approriate header name
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));

        // ito ung output ng file sa browser
        readfile($filename);

        // paglilinis ng temporary file (ito ay optional )
        unlink($filename);

        mysqli_close($conn);
        exit();
    } else {
        echo "Record not found.";
    }
} else {
    echo "Invalid request.";
}
?>
