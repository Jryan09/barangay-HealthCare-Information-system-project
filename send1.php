<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';

$servername = "localhost";
$username = "root";
$password = "jamryan09";
$dbname = "crud";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email FROM user";
$result = $conn->query($sql);

$recipientEmails = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recipientEmails[] = $row["email"];
    }
} else {
    echo "No email addresses found in the database.";
}

$conn->close();

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'jamryanmampusti123@gmail.com'; 
        $mail->Password = 'ribk hduc zmqe glpx'; 
        $mail->SMTPSecure = 'ssl'; // You may need to adjust this (tls or ssl)
        $mail->Port = 587;

        $mail->setFrom('jamryanmampusti123@gmail.com', 'BHRS');

        foreach ($recipientEmails as $recipientEmail) {
            $mail->addAddress($recipientEmail);
        }

        $emailSubject = $_POST['subject'];
        $emailMessage = $_POST['message'];

        $mail->isHTML(true);
        $mail->Subject = $emailSubject;
        $mail->Body = $emailMessage;

        $mail->send();
        echo "
            <script> 
            alert('Email sent successfully');
            window.location.href='home.php';
            </script>
        ";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
