<?php
include 'config.php';
session_start();

mysqli_select_db($conn, 'crud');

$user = $_POST['username'];
$pass = $_POST['password'];

$sel = "SELECT * FROM users WHERE username = '$user' && password = '$pass'";
$result = mysqli_query($conn, $sel);
$num = mysqli_num_rows($result);

if ($num == 1) {
    $row = mysqli_fetch_assoc($result);
    
    $_SESSION['username'] = $user;
    $_SESSION['user_role'] = $row['user_role']; // Store the user's role in the session
   
   

    if ($_SESSION['username']) {
        header("Location: home.php");
        exit();
    }else{ header("location:login.php"); }
} else {
    echo '<div style="width:100vw; height:100vh; position:relative; margin: 0; background-color: black;  overflow:hidden; display:flex; justify-content:center; align-items:center;">
           <h2 style="font-family:arial; color:rgb(248, 170, 170); font-size:5em;">OPPS! USER NAME NOT FOUND!</h2>
    </div>';
}
?>