<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // I-redirect ang hindi naka-login sa login page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        width: 80%;
        max-width: 800px;
        background: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 20px;
        margin: 20px;
    }

    h1 {
        text-align: center;
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        margin-bottom: 20px;
    }

    form {
        width: 100%;
    }

    label {
        display: block;
        font-weight: bold;
        margin-top: 10px;
    }

    input,
    textarea,
    select {
        width: 100%;
        padding: 8px;
        margin-top: 4px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 4px;
    }

    button:hover {
        background-color: #0056b3;
    }

    .mtable-container {
        overflow-x: auto;
        border: 2px solid darkslategray;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: whitesmoke;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        white-space: nowrap; /* Prevent content from wrapping */
    }

    th {
        background-color: #007bff;
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
</style>

</head>
<body>
    <div class="container">
<h1>Medical History Form</h1>

    <form method="post" action="" id="medical-history-form">
    <label for="patient-name">User Name:</label>
        <input type="text" id="patient-name" name="username" required><br>
        <label for="patient-name">Name:</label>
        <input type="text" id="patient-name" name="name" required><br>

        <label for="date-of-birth">Date of Birth:</label>
        <input type="date" id="date-of-birth" name="bd" required><br>

        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="Other">
        <label for="other">Other</label><br>

        <label for="contact-number">Contact Number:</label>
        <input type="tel" id="contact-number" name="contact" required><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea><br>
       

        <h2>Medical Information</h2>
       
        <label for="medical-history">Medical History:</label>
        <textarea id="medical-history" name="medhistory" rows="4" required></textarea><br>

        <label for="allergies">Allergies:</label>
        <input type="text" id="allergies" name="allergies"><br>

        <label for="medications">Current Medications:</label>
        <textarea id="medications" name="medication" rows="4"></textarea><br>

        <label for="family-history">Family Medical History:</label>
        <textarea id="family-history" name="famhistory" rows="4"></textarea><br>

        <label for="social-history">Social History (e.g., Smoking, Alcohol):</label>
        <textarea id="social-history" name="sochistory" rows="4"></textarea><br>

        <button type="submit" name="submit" value="save">Submit</button>
    </form>
   <!--create-->
   <?php
    include 'config.php'; // Database connection
     
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
        


        $sql = "INSERT INTO medical_history (username, name, birthday, gender, contact_no, 	address, medical_history, allergies, 	current_medication, family_medical_history, social_history) VALUES ( '$username', ' $name', '$bd','$gender',  '$contact', '$address', '$MH', '$all', '$medication', '$famhistory','$sochistory')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
            alert('success!');
            window.location.href='medical_history.php'
            </script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
    <div class="mtable-container">
    <table border="1">
        <tr>
           
            <th>Name</th>
            <th>Bithday</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Medical_history</th>
            <th>Allergies</th>
            <th>Current_medication</th>
            <th>Family_medical_histoty</th>
            <th>Social_history</th>
            <th class="action">action</th>
        </tr>
        <?php
        include 'config.php';
   $user=$_SESSION['username'];
   $role=$_SESSION['user_role'];
        if ($role == 'admin') {
            
            $search_sql = "SELECT * FROM medical_history";
            $search_result = mysqli_query($conn, $search_sql);
          $res=mysqli_num_rows($search_result);
          
            while ($row = mysqli_fetch_assoc($search_result)) {
              
                echo "<tr>";
                echo "<td>{$row['username']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['birthday']}</td>";
                echo "<td>{$row['gender']}</td>";
                echo "<td>{$row['contact_no']}</td>";
                echo "<td>{$row['address']}</td>";
                echo "<td>{$row['medical_history']}</td>";
                echo "<td>{$row['allergies']}</td>";
                echo "<td>{$row['current_medication']}</td>";
                echo "<td>{$row['family_medical_history']}</td>";
                echo "<td>{$row['social_history']}</td>";
                echo "<td class='action'><a class='e-link update' href='med_update.php?id={$row['id']}'>UPDATE</a>  <a class='e-link delete' href='med_delete.php?id={$row['id']}'>DELETE</a>  <a class='e-link read' href='med_read.php?id={$row['id']}'>READ</a></td>";

                echo "</tr>";
            }
        } else {
            $sql = "SELECT * FROM medical_history WHERE username = '$user' ";
            $result = mysqli_query($conn, $sql);
                mysqli_num_rows($result);
   
            while ($row = mysqli_fetch_assoc($result)) {
                
                echo "<tr>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['birthday']}</td>";
                echo "<td>{$row['gender']}</td>";
                echo "<td>{$row['contact_no']}</td>";
                echo "<td>{$row['address']}</td>";
                echo "<td>{$row['medical_history']}</td>";
                echo "<td>{$row['allergies']}</td>";
                echo "<td>{$row['current_medication']}</td>";
                echo "<td>{$row['family_medical_history']}</td>";
                echo "<td>{$row['social_history']}</td>";
                echo "<td class='action'><a class='e-link update' href='med_update.php?id={$row['id']}'>UPDATE</a>  <a class='e-link delete' href='med_delete.php?id={$row['id']}'>DELETE</a>  <a class='e-link read' href='med_read.php?id={$row['id']}'>READ</a></td>";

                echo "</tr>";
            }
        }
        
    
        mysqli_close($conn);
        ?>
    </table>
    </div>
    
    </div>
    <a href="home.php " ><button style="padding: 10px; color: white; border-radius: 20px; background-color:darkgreen; margin-right: 0; transform:translateY(-790px); position:fixed">BACK</button></a>
<script src="medical_history.js"></script>
</body>
</html>