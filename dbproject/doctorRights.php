<?php
// session_start();
// $email_id = $_SESSION['email_as_id'];
// $_SESSION['email'] = $email_id;
// echo ($email_id);
// echo ("Hello000000");
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="img/fav1.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <!-- Navbar Code -->
    <nav id="navbar">
        <div id="logo">
            <!-- <img src="img/profile.png" alt="HMC"> -->
            <!-- <img src="img/profile2.png" alt="HMC"> -->
            <img src="img/profile1.jpeg" alt="HMC">
        </div>
        <ul>
            <li class="item"><a href="login.php">Home</a></li>
            <li class="item"><a href="doctorlogin.php">Back</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
    </nav>
    <div id="doctor-container-compnents" class = "container-compnents">
        <div id="doctor-doctor_box" class="box-decor doctor-box">
            <div id="doctor">
                <div id="doctor-link" class="boxes-text-decor"><a href="doctorRightsPI.php"
                        class="boxes-link-decor">Personal Info</a></div>
            </div>
        </div>
        <div id="doctor-nurse_box" class="box-decor nurse-box">
            <div id="nurse">
                <div id="nurse-link" class="boxes-text-decor"><a href="doctorRightsNurse.php"
                        class="boxes-link-decor">Assign Nurses</a></div>
            </div>
        </div>
        <div id="doctor-wardboy_box" class="box-decor wardboy-box">
            <div id="wardboy">
                <div id="wardboy-link" class="boxes-text-decor"><a href="doctorRightsWardboy.php"
                        class="boxes-link-decor">Assign WardBoys</a></div>
            </div>
        </div>
        <div id="doctor-patient_box" class="box-decor patient-box">
            <div id="patient">
                <div id="patient-link" class="boxes-text-decor"><a href="doctorRightsPatient.php"
                        class="boxes-link-decor">Diagnosis Patients</a></div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        Copyright &copy; www.HMS.com
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>