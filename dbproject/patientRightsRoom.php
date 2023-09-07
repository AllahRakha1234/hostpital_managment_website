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
            <li class="item"><a href="patientRights.php">Back</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
    </nav>
    <!-- Representing the doctor table data -->
    <table style="width: 80vw; line-height: 5vh; margin-top: 5vh;">
        <tr>
            <th colspan="3">
                <h1>Doctor and Medical Report</h1>
            </th>
        </tr>
        <t>
            <th>room_id</th>
            <th>room_type</th>
            <th>fee</th>
            <t />
            <?php
            $dbconn = connection();
            $email_email_id = $_SESSION['email_as_id'];  // Catching value of email form doctorlogin page
            $sql_room = 'Select * From project.room Where room_id = (SELECT room_id FROM project.patient where patient.email = "'.$email_email_id.'")';
            $result_room = mysqli_query($dbconn, $sql_room);
            while ($row_room = mysqli_fetch_assoc($result_room)) {
            ?>
            <tr>
                <td><?php echo $row_room['room_id']; ?> </td>
                <td><?php echo $row_room['room_type']; ?> </td>
                <td><?php echo $row_room['fee']; ?> </td>
            </tr>
            <?php
            }
            ?>
    </table>
    <!-- Finish -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>