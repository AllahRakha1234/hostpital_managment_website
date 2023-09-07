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
            <li class="item"><a href="patientRights.php">Back</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
    </nav>
    <table style="width: 80vw; line-height: 5vh; margin-top: 5vh;">
        <tr>
            <th colspan="10">
                <h1>Personal Information</h1>
            </th>
        </tr>
        <t>
            <th>patient_id</th>
            <th>name</th>
            <th>address</th>
            <th>phone_no</th>
            <th>email</th>
            <th>date_of_birth</th>
            <th>nurse_nurse_id</th>
            <th>ward_ward_boy_id</th>
            <th>room_room_id</th>
            <th>pass</th>
            <t />
            <?php
            $dbconn = connection();
            $email_email_id = $_SESSION['email_as_id']; // Catching value of email form doctorlogin page
            $sql_patient = 'SELECT * FROM project.patient where patient.email = "' . $email_email_id . '"';
            $result_patient = mysqli_query($dbconn, $sql_patient);
            while ($row_patient = mysqli_fetch_assoc($result_patient)) {
            ?>
            <tr>
                <td><?php echo $row_patient['patient_id']; ?> </td>
                <td><?php echo $row_patient['name']; ?> </td>
                <td><?php echo $row_patient['address']; ?> </td>
                <td><?php echo $row_patient['phone_no']; ?> </td>
                <td><?php echo $row_patient['email']; ?> </td>
                <td><?php echo $row_patient['date_of_birth']; ?> </td>
                <td><?php echo $row_patient['nurse_nurse_id']; ?> </td>
                <td><?php echo $row_patient['ward_ward_boy_id']; ?> </td>
                <td><?php echo $row_patient['room_room_id']; ?> </td>
                <td><?php echo $row_patient['pass']; ?> </td>
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