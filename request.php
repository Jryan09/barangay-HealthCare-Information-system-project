<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    // Retrieve form data
    $name = $_POST['name'];
    $reason = $_POST['reason'];
    $medname = $_POST['medname'];
    $release_quantity = $_POST['release_quantity'];

    // Establish a connection to your XAMPP database
    $host = "localhost";
    $username = "root";
    $password = "jamryan09"; // You might need to replace this with your database password
    $database = "crud"; // Replace with your actual database name

    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO request (name, reasons, medicine_name, quantity) VALUES ('$name', '$reason', '$medname', $release_quantity)";
    $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "<script>
    alert('Data successfully inserted into the database.');
    window.location.href='medicine_user.php'; // Redirect to another page after successful submission
    </script>";
  }

    //
    $conn->close();
}
?>
