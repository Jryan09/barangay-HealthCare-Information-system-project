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
    <title>update</title>
    <style>
        body{
            background-color: #E7F3EF;
        }
        label{
            font-family: arial;
            text-transform: uppercase;
            font-weight: bold;
            color: black;
        }
        input{
            color: #545454;
            max-width: 600px;
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
    <h4 ><a class="h" href="home.php">HOME</a></h4>
    <h4 class='profile'><?php echo $_SESSION['username']?></h4>
    <a href="create-profile-pic.php"><img src="profile_pic/<?php echo $profilePicture; ?>" alt="Profile Picture" loading="lazy" width="50px" height="50px">
    </a>
   <button class='logout-btn'><a class='l-btn'href="logout.php"><img class="log-png" src="profile_pic/exit.png" alt=""></a></button>
   </div>
   </div>
    <h1 style="font-family: monospace; margin-top:20px; color:darkgrey">update</h1>
    
   

    <?php
    include 'config.php'; // Database connection

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $name= $_POST['name'];
            $bd= $_POST['bd'];
            $gender = $_POST['gender'];
            $contact =$_POST['contact'];
            $address =$_POST['address'];
            $MH=$_POST['medhistory'];
            $all =$_POST['allergies'];
            $medication =$_POST['medication'];
            $famhistory=$_POST['famhistory'];
            $sochistory=$_POST['sochistory'];

            $sql = "UPDATE medical_history SET name='$name', birthday='$bd', gender='$gender', contact_no='$contact', address='$address',medical_history='$MH', allergies='$all', current_medication='$medication', family_medical_history='$famhistory', social_history='$sochistory' WHERE id=$id";
            if (mysqli_query($conn, $sql)) {
             header("location: medical_history.php");
                
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }

        $sql = "SELECT * FROM medical_history WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <form class='custom-form' method="post" action="">
                <div class="form-row">
                <label>Name: </label><input type="text" name="name" value="<?php echo $row['username']; ?>">
                </div>
                <div class="form-row">
                <label>Birthday: </label><input type="date" name="bd" value="<?php echo $row['birthday']; ?>">
               </div>
               <div class="form-row">
                <label>Gender: </label><input type="text" name="gender" value="<?php echo $row['gender']; ?>">
               </div>
               <div class="form-row">
                <label>Contact: </label><input type="number" name="contact" value="<?php echo $row['contact_no']; ?>">
               </div>
               <div class="form-row">
                <label>Address: </label><input type="text" name="address" value="<?php echo $row['address']; ?>">
               </div>
               
               <div class="form-row">
                <label>Medical History: </label><input type="text" name="medhistory" value="<?php echo $row['medical_history']; ?>">
               </div>
               <div class="form-row">
                <label>Allergies: </label><input type="text" name="allergies" step="0.01" value="<?php echo $row['allergies']; ?>">
               </div>
               <div class="form-row">
                <label>Current Medication: </label><input type="text" name="medicataion" value="<?php echo $row['current_medication']; ?>">
               </div>
               <div class="form-row">
                <label>Family Medical History: </label><input type="text" name="famhistory" value="<?php echo $row['family_medical_history']; ?>">
               </div>
               <div class="form-row">
                <label>Social History (e.g smoking, drinking): </label><input type="text" name="sochistory" value="<?php echo $row['social_history']; ?>">
               </div>
                <input class='sub'type="submit" name="submit" value="Save">
            </form>
            <?php
        } else {
            echo "Record not found.";
        }

        mysqli_close($conn);
    } else {
        echo "Invalid request.";
    }
    ?>
    
    </body>
    </html>