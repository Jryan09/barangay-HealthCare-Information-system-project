<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$userRole = $_SESSION['user_role'];


if ($userRole !=='admin') {

    header("Location:medicine_user.php"); 
      exit() ;
}


      
        include 'config.php';
        $username = $_SESSION['username'];
        $profilePicture = 'default.jpg';
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
    <title>Medicine</title>
    <link rel="stylesheet" href="index.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        h1 {
            text-align: center;
        }

        .medicine_container {
            margin-top: 20px;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .add_medicine {
            display: none;
            margin-top: 20px;
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        a {
            text-decoration: none;
            color: #fff;
        }
        .release_form{
            transform: translateY(5px);
            margin-left: 250px;
            background-color: #45a049;
            width: 400px;
            height: auto;
        }
        .msg{
            position: absolute;
            transform: translateX(1270px);
            margin-top: 20px;
           z-index: 1;
        }
        .req{
            position: absolute;
           max-width: 600px;
           height: 200px;
           background-color: whitesmoke;
           z-index: 2;
           overflow-y: scroll;
        }
        .req_1{
            padding: 20px;
            background-color: #45a049;
        }
        .dot{
            width: 25px;
            height: 25px;
            background-color:  red;
            border-radius: 50px;
            transform: translateY(-50px);
            margin-left: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="head">
    <h1 class="logo" style="margin-left: 20px; margin-top: 20px; color:rgb(26, 142, 146); "><img src="svg/healthcare (1).png" alt="" style=" width:100%; height: auto;"></h1>
     
    <div class="profile-wrap">
   
        <h4 ><a class="h" href="home.php">HOME</a></h4>
        <h4 ><a class="h"  href="gmail.php"><img src="svg/gmail.png" alt="" style="width: 50px; height: auto; color:rgb(26, 142, 146); "></a></h4>
    <h4 class='profile'><?php echo $_SESSION['username']?></h4>
  
    <a href="create-profile-pic.php">
    <img src="profile_pic/<?php echo $profilePicture; ?>" alt="Profile Picture" loading="lazy" width="50px" height="50px">
    </a>
     

   <button class='logout-btn' ><a class='l-btn'href="logout.php"><img class="log-png" src="profile_pic/exit.png" alt="" ></a></button>
   </div>
   </div>

<div class="msg">
  <a href="msg.php">  <img src="svg/notification.png" alt="" style="width: 50px; height:auto;" ><div class="dot">
    <?php
    include 'config.php';

    $sql ="SELECT * FROM request";
    $result= mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo  $num;
    ?>
  </div></a>
   
</div>
    <div class="container">
        <h1>Medicine</h1>
        <div class="medicine_container">
            <button onclick="addStock()" id="add">Add</button>
            
            <div class="add_medicine" style="display: none;" id="medcon">
                <form action="" method="post">
                    <label for="id">Medicine ID</label>
                    <input type="number" name="id" id="">
                    <label for="name">Medicine Name</label>
                    <input type="text" name="name" id="" >
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="">
                    <input type="submit" name="submit" value="Save">
                </form>
                <button onclick="cancel()">cancel</button>
                <?php 
                    include "config.php";

                    if(isset($_POST['submit'])){
                        $id = $_POST['id'];
                        $medicine = $_POST['name'];
                        $stock = $_POST['stock'];

                        $sql = "INSERT INTO medicine (id, medicine_name, stock) VALUES (?, ?, ?)";
                        $stmt = mysqli_prepare($conn, $sql);

                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, "iss", $id, $medicine, $stock);
                            $result = mysqli_stmt_execute($stmt);

                            if ($result) {
                                echo "<script>
                                alert('success!');
                                window.location.href='medicine.php'
                                </script>";
                            } else {
                                echo "Error adding medicine: " . mysqli_error($conn);
                            }

                            mysqli_stmt_close($stmt);
                        } else {
                            echo "Error in prepared statement: " . mysqli_error($conn);
                        }
                    }
                ?>
            </div>
            <div class="release_form" style="display: none; position:absolute;" id="releaseForm" >
    <form action="release.php" method="post" style="padding: 10px;">
        <label for="release_quantity">Release Medicine</label>
        <input type="text" name="name" id="release_quantity" placeholder="Name of patient" required>
       <input type="text" name="reason" placeholder="STATUS">
       <input type="text" name="medname" placeholder="medicine name">
        <input type="number" name="release_quantity" id="release_quantity" placeholder="medicine quantity" required>
        <input type="submit" name="submit" value="Release">
    </form>
    <button onclick="cancelRelease()">Cancel</button>
</div>
            <table border="1">
                <tr>
                    <th>Medicine ID</th>
                    <th>Medicine</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
                <?php
                    include 'config.php';

                    if (isset($_GET['query'])) {
                        $query = $_GET['query'];
                        $search_sql = "SELECT * FROM medicine WHERE medicine_name LIKE '%$query%'";
                        $search_result = mysqli_query($conn, $search_sql);
                        $res = mysqli_num_rows($search_result);

                        while ($row = mysqli_fetch_assoc($search_result)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['medicine_name']}</td>";
                            echo "<td>{$row['stock']}</td>";
                            echo "<td><button onclick='showReleaseForm() '>Release</button><button onclick='addMedStock({$row['id']})'>Add Stock</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        $sql = "SELECT * FROM medicine";
                        $result = mysqli_query($conn, $sql);
                        mysqli_num_rows($result);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['medicine_name']}</td>";
                            echo "<td>{$row['stock']}</td>";
                            echo "<td><button onclick='showReleaseForm()'>Release</button><button onclick='addMedStock({$row['id']})'>Add Stock</button></td>";
                            echo "</tr>";
                        }
                    }
                    mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>

    <script>
        var medicineContainer = document.getElementById('medcon');
        var release= document.getElementById('releaseForm');
        var msg = document.getElementById('msg_div');
     


        function addStock() {
            medicineContainer.style.display = "block";
        }

        function addMedStock() {
            // Add functionality to handle adding stock for a specific medicine
            alert('Functionality to add stock needs to be implemented.');
        }
        function cancel(){
medicineContainer.style.display='none';

        }
        function showReleaseForm() {
        release.style.display = "block";
    }

    function cancelRelease() {
        release.style.display = "none";
    }
    function msg() {
        msg.style.display = "block";
    }



    function addMedStock(id) {
    // Prompt the user for the quantity to add
    var quantityToAdd = prompt("Enter the quantity to add:", "0");

    // Check if the user clicked "Cancel" or entered a non-numeric value
    if (quantityToAdd === null || isNaN(quantityToAdd)) {
        alert("Invalid quantity. Please enter a valid number.");
        return;
    }

    // Send the data to the server for processing using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "process_add_stock.php?medicine_id=" + id + "&quantity=" + quantityToAdd, true);
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the server
            alert(xhr.responseText);
        }
    };

    xhr.send();
}

    </script>
</body>
</html>
