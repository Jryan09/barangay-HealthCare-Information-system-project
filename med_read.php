<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // I-redirect ang hindi naka-login sa login page
    exit();
}

$userRole = $_SESSION['user_role'];




        //profilepic
        include 'config.php';
        $username = $_SESSION['username'];
        $profilePicture = '';// Initialize profile picture filename
$sql = "SELECT profile_picture FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $profilePicture = $row['profile_picture'];
}

mysqli_close($conn);
    

 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>read</title>
    <style>
        body {
            background-color: rgb(22, 160, 133);
            font-family: Arial, sans-serif;
        }


     

      

        



        body{
            background-color: #E7F3EF;
        }

        .read-wrap1 {
            background-color: #fff;
            margin: 20px auto; 
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            height: auto;
            max-width: 768px;
         
        }

        .read-wrap1 span {
           
            font-weight: bold;
            margin-right: 10px;
           
        
        }

        .read-wrap1 h5 {
          
            margin: 0;
            margin-bottom: 10px;
           
           
        }

        .r-link1 {
            text-decoration: none;
            color: white;
            width: 120px;
            background-color: rgb(26, 25, 25);
            padding: 5px;
            border-radius: 5px;

        }

        .r-download1 {
          
           
            display: block;
            margin-top: 10px;
            margin: auto auto;
        }
        .logo{
        width: 120px;
        animation: flipLogo 5s linear infinite; 

    }
     @keyframes flipLogo {
        0%, 100% {
            transform: scaleX(1);
        }
        50% {
            transform: scaleX(-1); 
        }
    }
    </style>
</head>
<body>
<div class="head">
<h1 class="logo" style="margin-left: 20px; margin-top: 20px; color:rgb(26, 142, 146);"><img src="svg/healthcare (1).png" alt="" style=" width:100%; height: auto;"></h1>
    <div class="profile-wrap">
    <h4 ><a class="h"href="home.php">HOME</a></h4>
    <h4 class='profile'><?php echo $_SESSION['username']?></h4>
    <a href="create-profile-pic.php"></a><img src="profile_pic/<?php echo $profilePicture; ?>" alt="Profile Picture" loading="lazy" width="50px" height="50px">
   <button class='logout-btn'><a class='l-btn'href="logout.php"><img class="log-png" src="profile_pic/exit.png" alt=""></a></button>
   </div>
   </div>
<div class="read-wrap1">

    <?php
    include 'config.php'; // Database connection

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM medical_history WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row1 = mysqli_fetch_assoc($result);
       
            echo "<span>Name:</span> <h5>{$row1['name']}</h5><br>";
            echo "<span>Birthday: </span><h5>{$row1['birthday']}</h5><br>";
            echo "<span>Gender: </span><h5>{$row1['gender']}</h5><br>";
            echo "<span>Contact: </span><h5>{$row1['contact_no']}</h5><br>";
            echo "<span>Address:</span><h5> {$row1['address']}</h5><br>";
            echo "<span>medical History:</span><h5>{$row1['medical_history']}<h5><br>";
            echo "<span>Allergies:</span><h5>{$row1['allergies']}<h5><br>";
            echo "<span>Current Medication:</span><h5>{$row1['current_medication']}<h5><br>";
            echo "<span>Family Medical History:</span><h5>{$row1['family_medical_history']}<h5><br>";
            echo "<span>Social History:</span><h5>{$row1['social_history']}<h5><br>";
            
            echo "<h5 class='h5-l'><a class='r-link1' href='medical_history.php'>Back to List</a ></h5>";
            echo "<h5><a class='r-download1'  href='med_download.php?id= $id; '><img src='svg/download.gif' alt='' style='width: 50px; height:50px; margin: auto auto;'></a></h5>";
      

        } else {
            echo "Record not found.";
        }

        mysqli_close($conn);
    } else {
        echo "Invalid request.";
    }
    ?>
 


 
   </div>

   
        
    </body>
    </html>