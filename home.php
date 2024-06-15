<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}

$userRole = $_SESSION['user_role'];




        //profilepic
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>try</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="swipe.css">
   <style>
 .head2{
    display: flex;
    justify-content: space-between;
width: 40%;
    flex-direction: row;
    background-color: whitesmoke;
    background-color: transparent;
    
   
    
}
.icons-container{
    
    overflow-x: scroll;
}
.popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
   </style>
</head>
<body>



    <header class="header">
    <div class="head2 head1">
   
    <div class="profile-wrap">
 
    <h4 class='profile'><?php echo $_SESSION['username']?></h4>
    <a href="create-profile-pic.php"><img src="profile_pic/<?php echo $profilePicture; ?>" alt="Profile Picture" loading="lazy" width="50px" height="50px"></a>
  
   </div>
   </div>
        <a href="#" class="logo"><i class="fas fa-heartbeat">BHCRIS.</i></a>

        <nav class="navbar">
       
            <a href="#home">Home</a>
           
           
            <button class='logout'><a class='l'href="logout.php">logout</a></button>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>

    </header>

  

    <section class="home" id="home">

        <div class="image">
            <img src="img/home2.avif" alt="">
        </div>

        <div class="content">
            <h3>Stay Safe, Stay Healthy</h3>
            <p>Empowering Communities with the Barangay Health Care Record Information System for Comprehensive Healthcare Management.</p>
        </div>

    </section>

  
  <div class="fcontainer">
    <div class="form-container">
    <div class="form-page active" id="personal-info-form  personal">
        <h2>Personal Info Form</h2>
        <form action="" method="post">
        <label>UserName:</label>
        <input type="text" name="user" required>
        <label>FirstName:</label>
        <input type="text" name="Firstname" required>
        <label>LastName:</label>
        <input type="text" name="Lastname" required>
        <label>Birthday:</label>
        <input type="date" name="bd" required>
        <label>Email:</label>
        <input type="email" name="email" required >
        <label>Age:</label>
        <input type="number" name="age" required >
        <label>Weight(kg):</label>
        <input type="number" name="weight" step="0.01" required>
        <label>Height(cm):</label>
        <input type="number" name="height"  step="0.01"  required>
        <label>Blood Type:</label>
        <input type="text"  name="blood_type" required >
        <label>Place of Birth:</label>
        <input type="text" name="medical" required >
      
        <label>Gender:</label>
       <label>female</label> <input type="radio" name="gender" value="female" required>
        <label>male </label><input type="radio" name="gender" value="male" required> 
            <button type="submit" name="sent"class="btn">Submit</button>
        </form>
  
    </div>

    <div class="form-page" id="medical-history-form medical">
        <h2>Medical History Form</h2>
        <form action='' method="post" >
        <label for="patient-name">User Name:</label>
        <input type="text" id="patient-name" name="username" required>
        <label for="patient-name">Name:</label>
        <input type="text" id="patient-name" name="name" required>
        <label for="date-of-birth">Date of Birth:</label>
        <input type="date" id="date-of-birth" name="bd" required>
<label for="gender">Gender:</label>
     <select  name="gender" value="Gender:"> 
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Others</option>

     </select>

        <label for="contact-number">Contact Number:</label>
        <input type="tel" id="contact-number" name="contact" required>
        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>
        <label for="medical-history">Medical History:</label>
        <textarea id="medical-history" name="medhistory" rows="4" required></textarea>
        <label for="allergies">Allergies:</label>
        <input type="text" id="allergies" name="allergies">
        <label for="medications">Current Medications:</label>
        <textarea id="medications" name="medication" rows="4"></textarea>
        <label for="family-history">Family Medical History:</label>
        <textarea id="family-history" name="famhistory" rows="4"></textarea>
        <label for="social-history">Social History (e.g., Smoking, Alcohol):</label>
        <textarea id="social-history" name="sochistory" rows="4"></textarea>
            <button type="submit" name="submit" class="btn">Submit</button>
        </form>
  
    </div>

    <div class="form-page" id="immunization-form immunization">
        <h2>Immunization Form</h2>
        <form  action="" method="post" >
        <div id="popup" class="popup">
    <p>Success!</p>
</div>
<label for="username">User Name:</label>
        <input type="text" id="patient_name" name="username" required>
        <label for="patient_name">User Name:</label>
        <input type="text" id="patient_name" name="patient_name" required>
        <label for="vaccine_name">Vaccine Name:</label>
        <input type="text" id="vaccine_name" name="vaccine_name" required>
        <label for="vaccination_date">Vaccination Date:</label>
        <input type="date" id="vaccination_date" name="vaccination_date" required>
        <label for="vaccination_provider">Vaccination provider:</label>
        <input type="text" id="vaccination_provider" name="health_provider" required>
          
            <button type="submit" name="save" class="btn">Submit</button>
        </form>
 




    </div>

    <div class="pagination">
        <button onclick="prevPage()">Previous</button>
        <button onclick="nextPage()">Next</button>
    </div>
</div>
</div>

    <section class="icons-container">
        <div class="icons">
        <i class="fas fa-users"></i>
            <h3>3, 136</h3>
            <p>residence</p>
        </div>

        <div class="icons">
            <i class="fas fa-users"></i>
            <h3>1, 585</h3>
            <p>Male</p>
        </div>

        <div class="icons">
        <i class="fas fa-users"></i>
            <h3>1,551</h3>
            <p>Female</p>
        </div>

        <div class="icons">
            <i class="fas fa-hospital"></i>
            <h3> Personal Records</h3>  
   <a href="record.php" class="btn"> Views Records <span class="fas fa-chevron-right"></span> </a>
        </div>
        <div class="icons">
            <i class="fas fa-hospital"></i>
            <h3> Medical  History Records</h3>  
   <a href="medical_history.php" class="btn"> Views Records <span class="fas fa-chevron-right"></span> </a>
        </div>
       
    </section>



    <section class="services" id="services">
     

        <div class="box-container">

            <div class="box">
                <i class="fas fa-notes-medical"></i>
                <h3>Immunization</h3>
               
                <a href="immunization.php" class="btn">view record <span class="fas fa-chevron-right"></span></a>
            </div>
            <div class="box">
            <?php 
    include 'config.php';
$userRole=$_SESSION['user_role'];
    $sql ="SELECT * FROM request";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    $sql1 ="SELECT * FROM released";
    $result1 = mysqli_query($conn, $sql1);
    $num1= mysqli_num_rows($result1);
    
    if($num > 0 && $userRole == 'admin'){

    echo '<div style="width: 25px;
                    height: 25px;
                    background-color: red;
                    border-radius: 50px;
                    z-index: 1000;
                    transform: translateY(15px);
                    margin-right: 60px;
                    display: ' . ($num > 0 ? 'block' : 'none') . '"></div>';
                }
                else if($num1 > 0 && $userRole == ''){

                    echo '<div style="width: 25px;
                    height: 25px;
                    background-color: red;
                    border-radius: 50px;
                    z-index: 1000;
                    transform: translateY(15px);
                    margin-right: 60px;
                    display: ' . ($num1 > 0 ? 'block' : 'none') . '"></div>';
                };
    
    mysqli_close($conn);
    ?>
                <i class="fas fa-notes-medical"></i>
                <h3>Medicine</h3>
                
                <a href="medicine.php" class="btn">view stock <span class="fas fa-chevron-right"></span></a>
               
            </div>


            

          
        

        </div>

    </section>

    <section class="services" id="services">
        <h1 class="heading">SURVEY'S<span></span></h1>
;
        <div style="display: flex; align-items:center; justify-content:center;">
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfri6b4v8j8yeU7E5XliTAvzJzznUyN-72ZMC_aEim988QjBQ/viewform?embedded=true" width="640" height="520" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
        </div>

    </section>


  



    

  



<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap');

:root{
    --green:#16a085;
    --black:#444;
    --light-color:#777;
    --box-shadow: .5rem .5rem 0 rgba(22, 160, 133, .2);
    --text-shadow: .4rem .4rem 0 rgba(0, 0, 0, .2);
    --border:.2rem solid var(--green);
}

*{
    font-family: 'Roboto', sans-serif;
    margin: 0; padding: 0;
    box-sizing: border-box;
    outline: none; border: none;
    text-transform: capitalize;
    transition: all .2s ease-out;
    text-decoration: none;
}
.newdot{
    position: absolute;
    width: 25px;
    height: 25px;
    background-color: red;
    border-radius: 50px;
    z-index: 1000;
    transform: translateY(-5px);
    margin-right: 60px;
 

}
.logout-bbtn{
    margin-left: 20px;
}

html{
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-padding-top: 7rem;
    scroll-behavior: smooth;
}

section:nth-child(even){
    background: #f5f5f5;
}

.heading{
    text-align: center;
    padding-bottom: 2rem;
    text-shadow: var(--text-shadow);
    text-transform: uppercase;
    color: var(--black);
    font-size: 5rem;
    letter-spacing: .4rem;
}

.heading span{
    text-transform: uppercase;
    color: var(--green);
}

section{
    padding: 2rem 9%;
}

.btn{
    display: inline-block;
    margin-top: 1rem;
    padding: .5rem;
    padding-left: 1rem;
    border: var(--border);
    border-radius: .5rem;
    box-shadow: var(--box-shadow);
    color: var(--green);
    cursor: pointer;
    font-size: 1.7rem;
}

.btn span{
    padding: .7rem 1rem;
    border-radius: .5rem;
    background: var(--green);
    color: #fff;
    margin-left: .5rem;
}

.btn:hover{
    background: var(--green);
    color: #fff;
}

.btn:hover span{
    color: var(--green);
    background: #fff;
    margin-left: 1rem;
}


.header{
    padding: 2rem 9%;
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 1000;
    box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1);
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
}

.header .logo{
    font-size: 2.5rem;
    color: var(--black);
}
nav{
    display: flex;
    justify-content: center;
}

.header .logo i{
    color: lightblue;
}

.header .navbar a{
    font-size: 1.7rem;
    color: var(--light-color);
    margin-left: 2rem;
}

.header .navbar a:hover{
    color: lightblue;
}

#menu-btn{
    font-size: 2.5rem;
    border-radius: 5rem;
    background: #eee;
    color: var(--green);
    padding: 1rem 1.5rem;
    cursor: pointer;
    display: none;
}



.home{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;
    padding-top: 10rem;
}

.home .image{
    flex: 1 1 45rem;
}

.home .image img{
    width: 100%;
}

.home .content{
    flex: 1 1 45rem;
}

.home .content h3{
    font-size: 4.5rem;
    color: var(--black);
    line-height: 1.8;
    text-shadow: var(--text-shadow);
}

.home .content p{
    font-size: 1.7rem;
    color: var(--light-color);
    line-height: 1.8;
    padding: 1rem 0;
}



.icons-container{
    display: grid;
    gap: 2rem;
    grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
    padding-top: 5rem;
    padding-bottom: 5rem;
}

.icons-container .icons{
    border: var(--border);
    box-shadow: var(--box-shadow);
    border-radius: .5rem;
    text-align: center;
    padding: 2.5rem;
}

.icons-container .icons i{
    font-size: 4.5rem;
    color: var(--green);
    padding-bottom: .7rem;
}

.icons-container .icons h3{
    font-size: 4.5rem;
    color: var(--black);
    padding: .5rem 0;
    text-shadow: var(--text-shadow);
}

.icons-container .icons p{
    font-size: 1.5rem;
    color: var(--light-color);
}



.services .heading{
    color: var(--black);
}

.services .heading span{
    color: var(--green);
}

.services .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
    gap: 2rem;
}

.services .box-container .box{
    background: #fff;
    border-radius: .5rem;
    box-shadow: var(--box-shadow);
    border: var(--border);
    padding: 2.5rem;
}

.services .box-container .box i{
    color: var(--green);
    font-size: 5rem;
    padding-bottom: .5rem;
}

.services .box-container .box h3{
    color: var(--black);
    font-size: 2.5rem;
    padding: 1rem 0;
}

.services .box-container .box p{
    color: var(--light-color);
    font-size: 1.4rem;
    line-height: 2;
}


.about .row{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 2rem;
}

.about .row .image{
    flex: 1 1 45rem;
}

.about .row .image img{
    width: 100%;
}

.about .row .content{
    flex: 1 1 45rem;
}

.about .row .content h3{
    color: var(--black);
    text-shadow: var(--text-shadow);
    font-size: 4rem;
    line-height: 1.8;
}

.about .row .content p{
    color: var(--light-color);
    padding: 1rem 0;
    font-size: 1.5rem;
    line-height: 1.8;
}




.reviews-container{
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(250px,auto));
    gap: 1rem;
    margin-top: 2rem;

}

.rev-img{
    width: 70px;
    height: 70px;
}

.rev-img img{
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    object-position: center;
    border: 2px solid var(--green);
}

.reviews-container .box{
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 20px;
    border: var(--border);
    border-radius: 0.5rem;
}

.reviews-container .box p{
    color: var(--light-color);
    font-size: small;
}

/*end ng reviews*/





















/*media queries*/
@media (max-width:991px){
    html{
        font-size: 55%;
    }

    .header{
        padding: 2rem;
    }

    section{
        padding: 2rem;
    }
}

@media (max-width:768px){

    #menu-btn{
        display: initial;
    }

    .header .navbar {
    position: absolute;
    top: 115%;
    right: 2rem;
    border-radius: .5rem;
    box-shadow: var(--box-shadow);
    width: 30rem;
    border: var(--border);
    background: #fff;
    transform: scale(0);
    opacity: 0;
    transform-origin: top right;
    transition: none;
}

.header .navbar.active {
    transform: scale(1);
    opacity: 1;
    transition: .2s ease-out;
}

    .header .navbar a{
        font-size: 2rem;
        display: block;
        margin: 2.5rem;
    }

}

@media (max-width:450px){
    html{
        font-size: 50%;
    }

}
</style>







    <script src="js/script.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const menuButton = document.getElementById("menu-btn");
    const navbar = document.querySelector(".navbar");

    menuButton.addEventListener("click", function () {
        navbar.classList.toggle("active");
    });
});




 </script>
<script>
    let currentPage = 0;
    const formPages = document.querySelectorAll('.form-page');

    function showPage(pageNumber) {
        formPages.forEach((page, index) => {
            if (index === pageNumber) {
                page.classList.add('active');
            } else {
                page.classList.remove('active');
            }
        });
    }

    function nextPage() {
        if (currentPage < formPages.length - 1) {
            currentPage++;
            showPage(currentPage);
        }
    }

    function prevPage() {
        if (currentPage > 0) {
            currentPage--;
            showPage(currentPage);
        }
    }




   
</script>
<?php include 'script.php';?>

</body>
</html>