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
    <?php
    $dbconn = connection(); // This is the function from connection.php
    if (isset($_POST['make_call'])) {
        $email_email_id = $_SESSION['email_as_id']; // Catching value of email form doctorlogin page
        $query = $_POST['query'];
        // echo (empty($query));
        if (!isset($query) or empty($query)) {
            echo '<script>alert("PLEASE ENTER A QUERY")</script>';
        } else {
            $sql_pId = 'SELECT patient_id FROM patient where email = "' . $email_email_id . '";';
            $result_pId = mysqli_query($dbconn, $sql_pId);
            $row_pId = mysqli_fetch_assoc($result_pId);
            $patient_patient_id = $row_pId['patient_id'];
            $sql_cId = 'SELECT max(call_id) FROM unattended_call;';
            $result_cId = mysqli_query($dbconn, $sql_cId);
            $row_cId = mysqli_fetch_assoc($result_cId);
            $call_call_id = $row_cId['max(call_id)'] + 1;
            $sql_call = 'INSERT INTO project.unattended_call (call_id, query, patient_patient_id,status) VALUES (' . $call_call_id . ', "' . $query . '", ' . $patient_patient_id . ', 0);';
            $result_call = mysqli_query($dbconn, $sql_call);
            header('Location: patientRightsCall.php');
        }
    }
    ?>
    <!-- Call Making Button and form -->
    <div class="edit-data" style="margin: 30vh 0 0 27vw">
        <form action="patientRightsCall.php" method="POST">
            <input type="text" name="query" id="query_no" placeholder="Enter query" style="width:30vw;height:8vh">
            <input type="submit" value="Make Call" name="make_call" id="call" class="bttn">
        </form>
    </div>
    <!-- Finish -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    </body>

</html>