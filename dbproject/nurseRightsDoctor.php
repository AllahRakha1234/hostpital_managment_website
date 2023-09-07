<?php
include('connection.php');
session_start();
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

<body">
    <!-- Navbar Code -->
    <nav id="navbar">
        <div id="logo">
            <!-- <img src="img/profile.png" alt="HMC"> -->
            <!-- <img src="img/profile2.png" alt="HMC"> -->
            <img src="img/profile1.jpeg" alt="HMC">

        </div>
        <ul>
            <li class="item"><a href="login.php">Home</a></li>
            <li class="item"><a href="nurseRights.php">Back</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
    </nav>
    <!-- Representing the doctor table data -->
    <table style="width: 80vw; line-height: 5vh; margin-top: 5vh;">
        <tr>
            <th colspan="7">
                <h1>Report To Doctors</h1>
            </th>
        </tr>
        <t>
            <th>doctor_id</th>
            <th>name</th>
            <th>phone_no</th>
            <th>email</th>
            <th>NurseEmail</th>
            <t />
            <?php
            $dbconn = connection();
            $email_email_id = $_SESSION['email_as_id'];  // Catching value of email form doctorlogin page
            $sql_nurse_doctor = 'SELECT * FROM project.nd_relation where nd_relation.NurseEmail = "'.$email_email_id.'"';
            $result_nurse_doctor = mysqli_query($dbconn, $sql_nurse_doctor);
            while ($row_nurse_doctor = mysqli_fetch_assoc($result_nurse_doctor)) {
            ?>
            <tr>
                <td><?php echo $row_nurse_doctor['doctor_id']; ?> </td>
                <td><?php echo $row_nurse_doctor['name']; ?> </td>
                <td><?php echo $row_nurse_doctor['phone_no']; ?> </td>
                <td><?php echo $row_nurse_doctor['email']; ?> </td>
                <td><?php echo $row_nurse_doctor['NurseEmail']; ?> </td>
            </tr>
            <?php
            }
            ?>
    </table>
    <!-- <div id="add-data">
        <form action="addDoctorData.php"><input type="submit" name = "submit" value="Add New Data" class="bttn" style="margin: 2vh 0 0 44vw;"></form>
    </div> -->
    <!-- Finish -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>