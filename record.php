<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$userRole = $_SESSION['user_role'];


if ($userRole !=='admin') {

    header("Location: user_record.php"); 
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
<link rel="stylesheet" href="index.css">
    <title>Document</title>
    <style>
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
    }</style>
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
     

   <button class='logout-btn'><a class='l-btn'href="logout.php"><img class="log-png" src="profile_pic/exit.png" alt=""></a></button>
   </div>
   </div>
  
 <div class="v">
    <div class="search">
    <a class="add-new-record" href="create.php">Add New Record</a>
    <form class='s-form'action="search.php" method="GET">

        <input class='s'type="text" name="query" placeholder="Enter your search query">
        <input class='ss' type="submit" value="Search">
    </form>
    </div>
 
    <div class="wraffer">
    
    <br><br>
    <div class="table-container">
    <table border="1">
        <tr>
           
            <th>FirtsName</th>
            <th>LastName</th>
            <th>Bithday</th>
            <th>Email</th>
            <th>ender</th>
            <th>Age</th>
            <th>Weight(kg)</th>
            <th>Height(cm)</th>
            <th>Blood Type</th>
            <th>Birth of Place</th>
            
            <th class="action">action</th>
        </tr>
        <?php
        include 'config.php';
   
        if (isset($_GET['query'])) {
            $query = $_GET['query'];
            $search_sql = "SELECT * FROM user WHERE firstname LIKE '%$query%' OR lastname LIKE '%$query%'";
            $search_result = mysqli_query($conn, $search_sql);
          $res=mysqli_num_rows($search_result);
          
            while ($row = mysqli_fetch_assoc($search_result)) {
              
                echo "<tr>";
                echo "<td>{$row['firstname']}</td>";
                echo "<td>{$row['lastname']}</td>";
                echo "<td>{$row['birthday']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['gender']}</td>";
                echo "<td>{$row['age']}</td>";
                echo "<td>{$row['weight']}.kg</td>";
                echo "<td>{$row['height']}.cm</td>";
                echo "<td>{$row['blood_type']}</td>";
                echo "<td>{$row['birth_of_place']}</td>";
             
                echo "<td class='action'><a class='e-link' href='update.php?id={$row['id']}'><img class='png' src='profile_pic/update.gif' alt=''></a> <a class='e-link'href='delete.php?id={$row['id']}'><img class='png' src='profile_pic/bin.gif' alt=''></a>  <a class='e-link' href='read.php?id={$row['id']}'><img class='png' src='profile_pic/edit.gif' alt=''></a></td>";
                echo "</tr>";
            }
        } else {
            $sql = "SELECT * FROM user";
            $result = mysqli_query($conn, $sql);
                mysqli_num_rows($result);
   
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['firstname']}</td>";
                echo "<td>{$row['lastname']}</td>";
                echo "<td>{$row['birthday']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['gender']}</td>";
                echo "<td>{$row['age']}</td>";
                echo "<td>{$row['weight']}</td>";
                echo "<td>{$row['height']}</td>";
                echo "<td>{$row['blood_type']}</td>";
                echo "<td>{$row['birth_of_place']}</td>";
              
                echo "<td class='action' ><a class='e-link' href='update.php?id={$row['id']}'><img class='png' src='profile_pic/update.gif' alt=''></a>  <a class='e-link' href='delete.php?id={$row['id']}'><img class='png' src='profile_pic/bin.gif' alt=''></a>  <a class='e-link' href='read.php?id={$row['id']}'><img class='png' src='profile_pic/edit.gif' alt=''></a></td>";
                echo "</tr>";
            }
        }
        
    
        mysqli_close($conn);
        ?>
    </table>
    </div>
    </div>


    </div>
    <style>
    .table-container {
        
    max-width: 100%;
    width: 100%;
    overflow-x: auto;
}
table{
    width: 100%;
}

@media screen and (max-width: 768px) {
    /* Adjust the search form */
    .search {
        flex-direction: column;
        align-items: center;
    }

    .add-new-record {
        width: 100%;
        text-align: center;
        transform: translateY(0);
    }

    .s-form {
        transform: translateY(0);
    }

    .s {
        width: 100%;
        margin: 10px 0; /* Add spacing for mobile */
    }

    .ss {
        width: 100%;
        margin: 10px 0; /* Add spacing for mobile */
    }

    /* Make the table responsive */
    table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ccc;
    overflow-x: auto; /* Allow horizontal scrolling when necessary */
    font-size: 13px;
}

th {
    background-color: #ffffff;
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
    font-family: Arial;
    font-size: small;
    color: rgba(90, 90, 90, 0.945);
}

th, td {
    border: 1px solid #ccc;
    padding: 8px;
    font-family: sans-serif;
    font-size: smaller; /* Adjust font size for mobile */
    color: rgb(51, 51, 51);
}
}
@media screen and (max-width: 480px) {
    table {
        font-size: 11px; /* Further decrease font size for even smaller screens */
    }
}











    </style>
</body>
</html>
