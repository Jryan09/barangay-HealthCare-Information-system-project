
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
       

    form {
        text-align: center;
        background-color: #E7F3EF;
        padding: 20px;
        border-radius: 5px;
    }

  
    label {
        display: block;
        font-weight: bold;
        margin: 10px 0;
    }

    /* Style the input and textarea fields */
    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Style the submit button */
    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .gmail{
        max-width: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px auto;
    }
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
    <h4 ><a href="home.php">HOME</a></h4>
    <h4 class='profile'><?php echo $_SESSION['username']?></h4>
    <a href="create-profile-pic.php"><img src="profile_pic/<?php echo $profilePicture; ?>" alt="Profile Picture" loading="lazy" width="50px" height="50px">
    </a>
    <a href=""><img src="svg/email.png" alt="" style='width: 30px; height: 30px;'></a>
   <button class='logout-btn'><a class='l-btn'href="logout.php"><img class="log-png" src="profile_pic/exit.png" alt=""></a></button>
   </div>
   </div>
   <div class="gmail">
   <img src="svg/gmail.png" alt="" style="width: 250px; height:auto;">
   </div>
<form method="post" action="send1.php">
        <label for="subject">Email Subject:</label>
        <input type="text" id="subject" name="subject" value="BHRS" ><br>

        <label for="message">Email Message:</label>
        <textarea id="message" name="message" required></textarea><br>

        <input type="submit" name="send" value="Send Email">
    </form>
</body>
</html>