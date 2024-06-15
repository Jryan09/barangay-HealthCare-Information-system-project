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
            $Firstname = $_POST['firstname'];
            $Lastname = $_POST['lastname'];
            $Birthday = $_POST['bd'];
            $email = $_POST['email'];
            $medical = $_POST['medical'];
            $gender= $_POST['gender'];
            $age= $_POST['age'];
            $weight= $_POST['weight'];
            $height= $_POST['height'];
            $bloodtype= $_POST['blood_type'];
          

            $sql = "UPDATE user SET firstname='$Firstname', lastname='$Lastname', birthday='$Birthday', email='$email', gender='$gender', age='$age', weight='$weight', height='$height', blood_type='$bloodtype' WHERE id=$id";
            if (mysqli_query($conn, $sql)) {
             header("location: record.php");
                
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }

        $sql = "SELECT * FROM user WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <form class='custom-form' method="post" action="">
                <div class="form-row">
                <label>FirtsName: </label><input type="text" name="firstname" value="<?php echo $row['firstname']; ?>">
                </div>
                <div class="form-row">
                <label>LastName: </label><input type="text" name="lastname" value="<?php echo $row['lastname']; ?>">
               </div>
               <div class="form-row">
                <label>Birthday: </label><input type="date" name="bd" value="<?php echo $row['birthday']; ?>">
               </div>
               <div class="form-row">
                <label>Email: </label><input type="text" name="email" value="<?php echo $row['email']; ?>">
               </div>
              
               <div class="form-row">
                <label>Age: </label><input type="number" name="age" value="<?php echo $row['age']; ?>">
               </div>
               <div class="form-row">
                <label>Weight: </label><input type="number" name="weight" step="0.01" value="<?php echo $row['weight']; ?>">
               </div>
               <div class="form-row">
                <label>Height: </label><input type="number" name="height" value="<?php echo $row['height']; ?>">
               </div>
               <div class="form-row">
                <label>Blood Type: </label><input type="text" name="blood_type" value="<?php echo $row['blood_type']; ?>">
               </div>
               
               <div class="form-row">
    <label>Gender:</label>
    <input type="radio" name="gender" value="Male" <?php if ($row['gender'] == 'Male') echo 'checked'; ?>>Male
    <input type="radio" name="gender" value="Female" <?php if ($row['gender'] == 'Female') echo 'checked'; ?>>Female
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