<script src="sweetalert.min.js"></script>
<?php
if (isset($_POST['save'])) {
    include 'config.php';
$user = $_POST['username'];
    $patientName = $_POST['patient_name'];
    $vaccineName = $_POST['vaccine_name'];
    $vaccinationDate = $_POST['vaccination_date'];
    $healthProvider = $_POST['health_provider'];

    $sql = "INSERT INTO immunization (username,patient_name, vaccine_name, vaccination_date, health_provider) 
            VALUES ('$user', '$patientName', '$vaccineName', '$vaccinationDate', '$healthProvider')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        ?>
        <script>
            swal({
                title: "Success",
                text: "You clicked the button!",
                icon: "success",
                button: "confirm",
            }).then(function () {
                // Scroll to #immunization
                var targetElement = document.getElementById('immunization');
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            });
        </script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
    }
}
?>
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
        if (mysqli_query($conn, $sql)) {?>
        
        <script>
    swal({
  title: "Success!",
  text: "You clicked the button!",
  icon: "success",
  button: "confirm!",
});
window.location.href = 'home.php#medical';
</script>
          
       <?php     
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
          <?php
    include 'config.php'; // Database connection

    if (isset($_POST['sent'])) {
       $user = $_POST['user'];
        $fname = $_POST['Firstname'];
        $lname= $_POST['Lastname'];
        $bd= $_POST['bd'];
        $email = $_POST['email'];
        $gender =$_POST['gender'];
        $age =$_POST['age'];
        $weight=$_POST['weight'];
        $height =$_POST['height'];
        $bloodtype =$_POST['blood_type'];
        $medical=$_POST['medical'];
       
        


        $sql = "INSERT INTO user ( username, firstname, lastname, birthday, email, gender, age, weight, height, blood_type, birth_of_place ) VALUES ( '$user','$fname', ' $lname', '$bd','$email', '$gender', '$age', '$weight', '$height', '$bloodtype', '$medical')";
        if (mysqli_query($conn, $sql)) {?>
         <script>
    swal({
  title: "Success!",
  text: "You clicked the button!",
  icon: "success",
  button: "confirm!",
});
window.location.href = 'home.php#personal';
</script>
         
        <?php 
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
    
<!--<script>
    swal({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success",
  button: "Aww yiss!",
});
</script>