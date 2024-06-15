<?php 
session_start();

if(!isset($_SESSION['username'])){
 header('location:login.php');
 exit();
}

 $role=$_SESSION['user_role'];


include 'config.php';

$username=$_SESSION['username'];
$profilepictue='default.jpg';

$sel="SELECT profile_picture FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sel);
 if(mysqli_num_rows($result)==1){

    $row=mysqli_fetch_assoc($result);
    $profilepictue= $row['profile_picture'];
   

    
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
</head>
<body>
    <div class="dash-wraf" >
    <h1 class="dash-user"><?php echo $_SESSION['username'];?></h1>
     <img class="dash-profile" src="profile_pic/<?php echo $profilepictue; ?>" alt="" width="100" height="100">
    </div>
   
</body>
</html>