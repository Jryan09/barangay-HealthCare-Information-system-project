<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #success-message{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: larger;
            background-color:darkolivegreen;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            position: fixed;
            left: 50%;
            transform: translateX(-50%);
            z-index: 999;
        }
    </style>
    <title>Document</title>
</head>
<body>
<?php
include 'config.php';
session_start();

  mysqli_select_db($conn,'crud');

 $user = $_POST['username'];
 $eml = $_POST['email'];
 $pass = $_POST['password'];

 $sel = "SELECT * FROM users WHERE username = '$user' ";
 $result = mysqli_query($conn, $sel);
 $num =mysqli_num_rows($result);
 if ($num == 1) {

  $message = 'Username already taken';

  echo '<script> 
  alert("username already taken!");
  window.location.href="login.php";
   </script>';
 }
  else{
  $reg = "INSERT INTO  users (username,email, password) VALUES ('$user', '$eml', '$pass')";
  mysqli_query($conn, $reg);
  echo '<script> 
  alert("you are now registered!");
  window.location.href="login.php";
   </script>';
 }

?>
</body>
</html>



