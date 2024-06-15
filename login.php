<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>LOGIN</title>
    
</head>
<body>


    <div class="gg">
        
<div class="title" id="ttl">
    <img src="svg/healthcare (1).png" alt="" style="max-width: 500px; height: auto; border-radius:50px; margin-top:0;">
    <h1 >  BHCRIS</h1>
    <div class="discrip">
        <p class="pdiscrip">Barangay Zone1, Pinamalayan, Or, Min Healthcare Record System</p>
        <button  class="show" id="sh">LOGIN</button>
</div>

</div>
    <div class="form-box" id="form">
        <div class="button-box">
            <div id ="btn"></div>
      <button id = "tgbtn" type = "button" class = "toggle-btn" onclick ="login()">Log In</button>
      <button id = "tgbtn2" type = "button" class = "toggle-btn" onclick = "register()">Register</button>
        </div>
        <form id="login" class = "input-group" action="validation.php" method="post">
            <input id="usr" type="text" name="username" placeholder="user name" class="input-field" required>
            <input type="password" name="password" placeholder="password" class="input-field" required>
            <input  type="submit" value="login" name = "" class="submit-btn"> 
        </form>
        <form id="register" class = "input-group" action="registration.php" method="post">
            <input type="text" name="username" placeholder="user name" class="input-field" required>
            <input type="email" name="email" placeholder="email" class="input-field" required>
            <input type="password" name="password" placeholder="password" class="input-field" required>
            <input  type="submit" value="register" name = "save" class="submit-btn"> 
        </form>
        
        <div class="social-link">
     
    <p> visit and like us on  <a href="https://web.facebook.com/?_rdc=1&_rdr">FACEBOOK</a></p>
  </div>
    </div>
    </div>
  



<script src="login.js"></script>

</body>
</html>