<?php



include 'config.php'; //pag-access sa database connection 

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    

    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Database query failed: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        
        $filename = "data.csv";


        $file = fopen($filename, "w");

        // pagdagdag ng csv  header row
        $header = array("FirstName", "LastName", "Birthday", "Email", "Gender", "Age", "Weight", "Height", "Blood_Type" );
        fputcsv($file, $header);

        // pag aadd ng data row
        $data = array(
            $row['firstname'],
            $row['lastname'],
            $row['birthday'],
            $row['email'],
            $row['gender'],
            $row['age'],
            $row['weight'],
            $row['height'],
            $row['blood_type'],
            
           
            

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

        // paglilinis ng temporary file (optional )
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
