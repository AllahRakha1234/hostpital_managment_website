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
            <li class="item"><a href="doctorRights.php">Back</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
    </nav>
    <!-- Updating Data and checking validiation as well -->
    <?php
    $dbconn = connection();
    if (isset($_POST['update'])) {
        $pre_id = $_POST['update_id_no'];
        $sql = 'Select * FROM dp_relation where dp_relation.patient_id =' . $pre_id . ';';
        $result = mysqli_query($dbconn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            // Creating Table for updating data
    ?>
    <table style="width: 80vw; line-height: 5vh; margin-top: 5vh;">
        <tr>
            <th colspan="8">
                <h1>Diagnosised Patients</h1>
            </th>
        </tr>
        <t>
            <th>patient_id</th>
            <th>name</th>
            <th>phone_no</th>
            <th>email</th>
            <th>Diagnosis</th>
            <th>Prescription</th>
            <th>room_room_id</th>
            <th>DoctorEmail</th>
            <t />
            <?php
            $dbconn = connection();
            $update_id = $_POST["update_id_no"];
            $_SESSION['upd_id'] = $update_id;
            $sql_doctor = 'SELECT * FROM project.dp_relation where dp_relation.patient_id =' . $update_id . ';';
            $result_doctor = mysqli_query($dbconn, $sql_doctor);
            while ($row_doctor_patient = mysqli_fetch_assoc($result_doctor)) {
            ?>
            <tr>
            <tr>
                <td><?php echo $row_doctor_patient['patient_id']; ?> </td>
                <td><?php echo $row_doctor_patient['name']; ?> </td>
                <td><?php echo $row_doctor_patient['phone_no']; ?> </td>
                <td><?php echo $row_doctor_patient['email']; ?> </td>
                <form action="doc_updatePatientData.php" method="POST">
                    <td><input type="text" name="Diagnosis" class="input_width"></td>
                    <td><input type="text" name="Prescription" class="input_width"></td>
                    <input type="submit" name="update" value="Update Data" class="bttn left-margin top-margin">
                </form>
                <!-- <td><?php echo $row_doctor_patient['Diagnosis']; ?> </td>
                <td><?php echo $row_doctor_patient['Prescription']; ?> </td> -->
                <td><?php echo $row_doctor_patient['room_room_id']; ?> </td>
                <td><?php echo $row_doctor_patient['DoctorEmail']; ?> </td>
            </tr>
            <?php
            }
            ?>
            <!-- <tr>
                <form action="updateDoctorData1.php" method="POST">
                    <td><input type="text" name="id" class="input_width"></td>
                    <td><input type="text" name="name" class="input_width"></td>
                    <td><input type="text" name="specialization" class="input_width"></td>
                    <td><input type="text" name="phone_no" class="input_width"></td>
                    <td><input type="text" name="experience" class="input_width"></td>
                    <td><input type="text" name="email" class="input_width"></td>
                    <td><input type="text" name="pass" class="input_width"></td>
                    <input type="submit" name="update" value="Update Data" class="bttn left-margin">
                </form>
            </tr> -->
    </table>
    <?php
        } else {
            echo '<script text = "Error">alert("Invalid Id Entered")</script>';
        }

    } ?>

    <!-- Update Button -->
    <div class="edit-data" style="margin: 2vh 0 0 27vw;">
        <form action="doctorRightsPatient.php" method="POST">
            <input type="text" name="update_id_no" id="update_id_no" placeholder="Enter ID">
            <input type="submit" value="Update" name="update" id="update" class="bttn">
        </form>
    </div>
    <!-- Representing the doctor table data -->
    <table style="width: 80vw; line-height: 5vh; margin-top: 5vh;">
        <tr>
            <th colspan="8">
                <h1>Diagnosised Patients</h1>
            </th>
        </tr>
        <t>
            <th>patient_id</th>
            <th>name</th>
            <th>phone_no</th>
            <th>email</th>
            <th>Diagnosis</th>
            <th>Prescription</th>
            <th>room_room_id</th>
            <th>DoctorEmail</th>
            <t />
            <?php
            $dbconn = connection();
            $email_email_id = $_SESSION['email_as_id']; // Catching value of email form doctorlogin page
            $sql_doctor_patient = 'SELECT * FROM project.dp_relation where dp_relation.DoctorEmail = "' . $email_email_id . '"';
            $result_doctor_patient = mysqli_query($dbconn, $sql_doctor_patient);
            while ($row_doctor_patient = mysqli_fetch_assoc($result_doctor_patient)) {
            ?>
            <tr>
                <td><?php echo $row_doctor_patient['patient_id']; ?> </td>
                <td><?php echo $row_doctor_patient['name']; ?> </td>
                <td><?php echo $row_doctor_patient['phone_no']; ?> </td>
                <td><?php echo $row_doctor_patient['email']; ?> </td>
                <td><?php echo $row_doctor_patient['Diagnosis']; ?> </td>
                <td><?php echo $row_doctor_patient['Prescription']; ?> </td>
                <td><?php echo $row_doctor_patient['room_room_id']; ?> </td>
                <td><?php echo $row_doctor_patient['DoctorEmail']; ?> </td>

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