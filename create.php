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
        $profilePicture = 'default.jpg';// Initialize profile picture filename
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
    <title>Create New Record</title>
    <style>
       body{
            background-color: #E7F3EF;
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
<h1 class="logo" style="margin-left: 20px; margin-top: 20px;  color:rgb(26, 142, 146); "><img src="svg/healthcare (1).png" alt="" style=" width:100%; height: auto;"></h1>
    <div class="profile-wrap">
    <h4 ><a class="h"href="home.php">HOME</a></h4>
    <h4 class='profile'><?php echo $_SESSION['username']?></h4>
    <a href="create-profile-pic.php"><img src="profile_pic/<?php echo $profilePicture; ?>" alt="Profile Picture" loading="lazy" width="50px" height="50px">
    </a>
    <a href=""><img src="svg/email.png" alt="" style='width: 30px; height: 30px;'></a>
   <button class='logout-btn'><a class='l-btn'href="logout.php"><img class="log-png" src="profile_pic/exit.png" alt=""></a></button>
   </div>
   </div>
   <h1 style="font-family: monospace; margin-top:20px; color:darkgrey">CREATE RECORD</h1>
    <form method="post" action="" class="custom-form">
    <div class="form-row">
        <label>UserName:</label>
        <input type="text" name="user" required>
    </div>
    <div class="form-row">
        <label>FirstName:</label>
        <input type="text" name="Firstname" required>
    </div>
    <div class="form-row">
        <label>LastName:</label>
        <input type="text" name="Lastname" required>
    </div>
    <div class="form-row">
        <label>Birthday:</label>
        <input type="date" name="bd" required>
    </div>
    <div class="form-row">
        <label>Email:</label>
        <input type="email" name="email" required >
    </div>
   
    <div class="form-row">
        <label>Age:</label>
        <input type="number" name="age" required >
    </div>
    <div class="form-row">
        <label>Weight(kg):</label>
        <input type="number" name="weight" step="0.01" required>
    </div>
    <div class="form-row">
        <label>Height(cm):</label>
        <input type="number" name="height"  step="0.01"  required>
    </div>
    <div class="form-row">
        <label>Blood Type:</label>
        <input type="text"  name="blood_type" required >
    </div>
    <div class="form-row">
        <label>Place of Birth:</label>
        <input type="text" name="medical" required >
    </div>

    <div class="radio">
        <label>Gender:</label>
       <span>female <input type="radio" name="gender" value="female" required></span> 
        <span>male<input type="radio" name="gender" value="male" required></span> 
    </div>
    <input class="sub"type="submit" name="submit" value="Save" onsubmit="formatValues()">
</form>
    <?php
    include 'config.php'; // Database connection

    if (isset($_POST['submit'])) {
       $user = $_POST['user'];
        $fname = $_POST['Firstname'];
        $lname= $_POST['Lastname'];
        $bd= $_POST['bd'];
        $email = $_POST['email'];
        $gender =$_POST['gender'];
        $age =$_POST['age'];
        $weight=$_POST['weight'];
        $height =$_POST['height'];
        $bloodtype =$_POST['blood_type'];
        $medical=$_POST['medical'];
        $immun=$_POST['immunization'];
        


        $sql = "INSERT INTO user ( username, firstname, lastname, birthday, email, gender, age, weight, height, blood_type, birth_of_place, immunization) VALUES ( '$user','$fname', ' $lname', '$bd','$email', '$gender', '$age', '$weight', '$height', '$bloodtype', '$medical', '$immun')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
            alert('success!');
            window.location.href='record.php'
            </script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
  
   <script>

    function formatValues() {
        // Get the values of height and weight from the form
        const weight = document.getElementById("weight").value;
        const height = document.getElementById("height").value;

        // Format the weight as "kg"
        document.getElementById("weight").value = weight + " kg";

        // Split and format the height as "ft'inches"
        const feet = Math.floor(height);
        const inches = Math.round((height - feet) * 12);
        document.getElementById("height").value = feet + "'" + inches + " inches";
    }


   </script>
        
    </body>
    </html>