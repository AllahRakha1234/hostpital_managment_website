<?php
// session_start();
// $_SESSION['flag'] = false;
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
            <li class="item"><a href="adminlogin.php">Back</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
        <!-- <input type="submit" name="profile" value="Profile" class="bttn" style="margin-left:55vw;"> -->
        <div id = "login-signup-btn-cont">
        <a href="adminProfile.php"><button type="button" class="btn btn-danger btn-sm ">Profile</button></a>
        </div>
    </nav>
    <div id="admin-container-compnents" class="container-compnents">
        <div id="admin-doctor_box" class="box-decor doctor-box">
            <div id="doctor">
                <div id="doctor-link" class="boxes-text-decor"><a href="adminRightsDoctor.php"
                        class="boxes-link-decor">Doctor</a></div>
            </div>
        </div>
        <div id="admin-nurse_box" class="box-decor nurse-box">
            <div id="nurse">
                <div id="nurse-link" class="boxes-text-decor"><a href="adminRightsNurse.php"
                        class="boxes-link-decor">Nurse</a></div>
            </div>
        </div>
        <div id="admin-wardboy_box" class="box-decor wardboy-box">
            <div id="wardboy">
                <div id="wardboy-link" class="boxes-text-decor"><a href="adminRightsWardboy.php"
                        class="boxes-link-decor">WardBoy</a></div>
            </div>
        </div>
        <div id="admin-patient_box" class="box-decor patient-box">
            <div id="patient">
                <div id="patient-link" class="boxes-text-decor"><a href="adminRightsPatient.php"
                        class="boxes-link-decor">Patient</a></div>
            </div>
        </div>
        <div id="admin-room_box" class="box-decor room-box">
            <div id="room">
                <div id="room-link" class="boxes-text-decor"><a href="adminRightsRoom.php"
                        class="boxes-link-decor">Room</a></div>
            </div>
        </div>
        <div id="admin-payment_box" class="box-decor room-box">
            <div id="payment">
                <div id="room-link" class="boxes-text-decor"><a href="adminRightsPayment.php"
                        class="boxes-link-decor">Payment</a></div>
            </div>
        </div>
        <div id="admin-supportgroup_box" class="box-decor room-box">
            <div id="supportgroup">
                <div id="room-link" class="boxes-text-decor"><a href="adminRightsSgroup.php"
                        class="boxes-link-decor">SupportGroup</a></div>
            </div>
        </div>
        <div id="admin-doctor_nurse_box" class="box-decor room-box">
            <div id="doctor_nurse">
                <div id="room-link" class="boxes-text-decor"><a href="adminRightsDoctorNurse.php"
                        class="boxes-link-decor">DoctorNurse</a></div>
            </div>
        </div>
        <div id="admin-doctor_wardboy_box" class="box-decor room-box">
            <div id="doctor_wardboy">
                <div id="room-link" class="boxes-text-decor"><a href="adminRightsDoctorWBoy.php"
                        class="boxes-link-decor">DoctorWardBoy</a></div>
            </div>
        </div>
        <div id="admin-doctor_patient_box" class="box-decor room-box">
            <div id="doctor_patient">
                <div id="room-link" class="boxes-text-decor"><a href="adminRightsDoctorPatient.php"
                        class="boxes-link-decor">DoctorPatient</a></div>
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