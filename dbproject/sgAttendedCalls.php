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
            <li class="item"><a href="supportgroupRights.php">Back</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
    </nav>
    <!-- Representing the doctor table data -->
    <table style="width: 80vw; line-height: 5vh; margin-top: 5vh;">
        <tr>
            <th colspan="5">
                <h1>Attended Calls</h1>
            </th>
        </tr>
        <t>
            <th>call_id</th>
            <th>query</th>
            <th>solution</th>
            <th>patient_patient_id</th>
            <th>support_group_group_id</th>
            <t />
            <?php
            $dbconn = connection();
            $email_email_id = $_SESSION['email_as_id'];  // Catching value of email form doctorlogin page
            $sql_sgroup_id = 'Select group_id From support_group Where email = "'.$email_email_id.'"';
            $result_sgroup_id = mysqli_query($dbconn, $sql_sgroup_id);
            $row_sg_id = mysqli_fetch_assoc($result_sgroup_id);
            $sql_sg = 'SELECT * FROM project.attend_call_relation where support_group_group_id = '.$row_sg_id['group_id'].'';
            $result_sg = mysqli_query($dbconn, $sql_sg);
            while ($row_sg = mysqli_fetch_assoc($result_sg)) {
            ?>
            <tr>
                <td><?php echo $row_sg['call_id']; ?> </td>
                <td><?php echo $row_sg['query']; ?> </td>
                <td><?php echo $row_sg['solution']; ?> </td>
                <td><?php echo $row_sg['patient_patient_id']; ?> </td>
                <td><?php echo $row_sg['support_group_group_id']; ?> </td>
            </tr>
            <?php
            }
            ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>