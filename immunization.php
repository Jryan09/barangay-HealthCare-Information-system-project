<!-- index.php -->
<?php 
        //profilepic


     
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // I-redirect ang hindi naka-login sa login page
    exit();
}
        include 'config.php';
        $username = $_SESSION['username'];
        $profilePicture = '';
$sql = "SELECT profile_picture FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $profilePicture = $row['profile_picture'];
}

mysqli_close($conn);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immunization Record Form</title>
    <link rel="stylesheet" href="index.css">
    <style>
       
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

         h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }
        .e-link {
        display: inline-block;
        padding: 8px 12px;
        margin: 4px;
        text-decoration: none;
        color: #fff;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .e-link:hover {
        background-color: #007bff;
    }

    .e-link.update {
        background-color: #28a745; /* Green for Update */
    }

    .e-link.delete {
        background-color: #dc3545; /* Red for Delete */
    }

    .e-link.read {
        background-color: #ffc107; /* Yellow for Read */
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
    <form method="post" action="process_immunization.php">
    <label for="patient_name">User Name:</label>
        <input type="text" id="patient_name" name="username" required>
        <label for="patient_name">Patient Name:</label>
        <input type="text" id="patient_name" name="patient_name" required>

        <label for="vaccine_name">Vaccine Name:</label>
        <input type="text" id="vaccine_name" name="vaccine_name" required>

        <label for="vaccination_date">Vaccination Date:</label>
        <input type="date" id="vaccination_date" name="vaccination_date" required>
        <label for="vaccination_provider">Vaccination provider:</label>
        <input type="text" id="vaccination_provider" name="health_provider" required>

        <button type="submit" name="submit">Submit</button>
    </form>
    <div style="padding: 25px;">
        <h2>Immunization Records</h2>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Patient Name</th>
                <th>Vaccine Name</th>
                <th>Vaccination Date</th>
                <th>Health Provider</th>
                <th>Action</th>
            </tr>
            <?php
include 'config.php';
$userrole =$_SESSION['user_role'];


if($userrole == 'admin'){
$sql = "SELECT * FROM immunization";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($record = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        <td><?= $record['id']; ?></td>
            <td><?= $record['patient_name']; ?></td>
            <td><?= $record['vaccine_name']; ?></td>
            <td><?= $record['vaccination_date']; ?></td>
            <td><?= $record['health_provider']; ?></td>
           <?php  echo "<td class='action'><a class='e-link update' href='immunization_update.php?id={$record['id']}'>UPDATE</a>  <a class='e-link delete' href='immunization_delete.php?id={$record['id']}'>DELETE</a>  <a class='e-link read' href='immunization_read.php?id={$record['id']}'>READ</a></td>";?>
        </tr>
        <?php
    }
} else {
    echo "Error: " . mysqli_error($conn); // Output the error for debugging purposes
}
}else{ 
    $user =$_SESSION['username'];
    $sql= "SELECT * FROM immunization WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        while ($record = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <td><?= $record['id']; ?></td>
                <td><?= $record['patient_name']; ?></td>
                <td><?= $record['vaccine_name']; ?></td>
                <td><?= $record['vaccination_date']; ?></td>
                <td><?= $record['health_provider']; ?></td>
               <?php  echo "<td class='action'><a class='e-link update' href='immunization_update.php?id={$record['id']}'>UPDATE</a>  <a class='e-link delete' href='immunization_delete.php?id={$record['id']}'>DELETE</a>  <a class='e-link read' href='immunization_read.php?id={$record['id']}'>READ</a></td>";?>
            </tr>
            <?php
        }
    }
}
?>

        </table>
    </div>
</body>
</html>
