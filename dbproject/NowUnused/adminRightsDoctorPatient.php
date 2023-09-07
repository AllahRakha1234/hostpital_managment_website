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
            <img src="img/profile2.png" alt="HMC">
        </div>
        <ul>
            <li class="item"><a href="login.php">Home</a></li>
            <li class="item"><a href="#services-container">Services</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
    </nav>
    <!-- Navbar Ended -->
    <?php
    $dbconn = connection();
    // Add button when pressed second times
    if (isset($_POST['add_second'])) {
        $doctor_id = $_POST['doctor_id'];
        $patient_id = $_POST['patient_id'];
        $sql_doctor = 'SELECT * FROM project.doctor where doctor.doctor_id =' . $doctor_id . ';';
        $result_doctor = mysqli_query($dbconn, $sql_doctor);
        $sql_patient = 'SELECT * FROM project.patient where patient.patient_id =' . $patient_id . ';';
        $result_patient = mysqli_query($dbconn, $sql_patient);
        if ((mysqli_num_rows($result_doctor) != 0) && (mysqli_num_rows($result_patient) != 0)) {
            $sql = 'INSERT INTO patient_doctor (patient_id, doctor_id) VALUES (' . $patient_id . ', ' . $doctor_id . ');';
            $result = mysqli_query($dbconn, $sql);
            header("Location: adminRightsDoctorPatient.php");
        } else {
            echo '<script text = "Error">alert("DATA NOT FOUND")</script>';
        }
    }
    // Update button when pressed second times

    // if (isset($_POST['update_second'])) {
    //     $pre_doc_id = $_SESSION['pre_doctor_id'];
    //     $pre_pat_id = $_SESSION['pre_patient_id'];
    //     $doctor_id = $_POST['doctor_id'];
    //     $patient_id = $_POST['patient_id'];
    //     $sql_doctor = 'SELECT * FROM project.doctor where doctor.doctor_id =' . $doctor_id . ';';
    //     $result_doctor = mysqli_query($dbconn, $sql_doctor);
    //     $sql_patient = 'SELECT * FROM project.patient where patient.patient_id =' . $patient_id . ';';
    //     $result_patient = mysqli_query($dbconn, $sql_patient);
    //     if ((mysqli_num_rows($result_doctor) != 0) && (mysqli_num_rows($result_patient) != 0)) {
    //         // $sql = 'INSERT INTO doctor_nurse (doctor_id, nurse_id) VALUES (' . $doctor_id . ', ' . $nurse_id . ');';
    //         $sql = 'UPDATE project.patient_doctor  SET doctor_id =' . $doctor_id . ', patient_id = ' . $patient_id . ' WHERE patient_doctor.doctor_id = ' . $pre_doc_id . ' AND patient_doctor.patient_id = ' . $pre_pat_id . '';
    //         $result = mysqli_query($dbconn, $sql);
    //         header("Location: adminRightsDoctorPatient.php");
    //     } else {
    //         echo '<script text = "Error">alert("DATA NOT FOUND")</script>';
    //     }
    // }

    if(isset($_POST['update_second'])) {
        $pre_doc_id = $_SESSION['pre_doctor_id'];
        $pre_pat_id = $_SESSION['pre_patient_id'];
        $doctor_id = $_POST['doctor_id'];
        $patient_id = $_POST['patient_id'];
        if ($doctor_id != "" && $patient_id != "") {
            $sql_doctor = 'SELECT * FROM project.doctor where doctor.doctor_id =' . $doctor_id . ';';
            $result_doctor = mysqli_query($dbconn, $sql_doctor);
            $sql_patient = 'SELECT * FROM project.patient where patient.patient_id =' . $patient_id . ';';
            $result_patient = mysqli_query($dbconn, $sql_patient);
            if ((mysqli_num_rows($result_doctor) != 0) && (mysqli_num_rows($result_patient) != 0)) {
                // $sql = 'INSERT INTO doctor_nurse (doctor_id, nurse_id) VALUES (' . $doctor_id . ', ' . $nurse_id . ');';
                $sql = 'UPDATE project.patient_doctor  SET doctor_id =' . $doctor_id . ', patient_id = ' . $patient_id . ' WHERE patient_doctor.doctor_id = ' . $pre_doc_id . ' AND patient_doctor.patient_id = ' . $pre_pat_id . '';
                $result = mysqli_query($dbconn, $sql);
                header("Location: adminRightsDoctorPatient.php");
            } else {
                echo '<script text = "Error">alert("DATA NOT FOUND")</script>';
            }
        } else {
            echo '<script text = "Error">alert("DATA NOT FOUND")</script>';
        }
    }
    // All buttons when pressed first time
    if (isset($_POST['delete'])) {
        $delete_id_doc = $_POST["delete_doc_id_no"];
        $delete_id_patient = $_POST["delete_patient_id_no"];
        if ($delete_id_doc != "" && $delete_id_patient != "") {
            $sql = 'Select * FROM patient_doctor Where patient_doctor.doctor_id =' . $delete_id_doc . ' AND patient_doctor.patient_id =' . $delete_id_patient . ';';
            $result = mysqli_query($dbconn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                $sql = 'DELETE FROM patient_doctor where patient_doctor.doctor_id =' . $delete_id_doc . ' AND patient_doctor.patient_id =' . $delete_id_patient . ';';
                $result = mysqli_query($dbconn, $sql);
                header("Location: adminRightsDoctorPatient.php");
            } else {
                echo '<script text = "Error">alert("DATA NOT FOUND")</script>';
            }
        } else {
            echo '<script text = "Error">alert("PLEASE ENTER BOTH THE IDs")</script>';
        }
    } 
    else if (isset($_POST['update'])) {
        $pre_id_doctor = $_POST["update_doc_id_no"];
        $pre_id_patient = $_POST["update_patient_id_no"];
        if ($pre_id_doctor != "" && $pre_id_patient != "") {
            $_SESSION['pre_doctor_id'] = $pre_id_doctor;
            $_SESSION['pre_patient_id'] = $pre_id_patient;
            $sql = 'Select * FROM patient_doctor where patient_doctor.doctor_id =' . $pre_id_doctor . ' AND patient_doctor.patient_id = ' . $pre_id_patient . ';';
            $result = mysqli_query($dbconn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                // Creating Table for updating data
                ?>
    <table style="width: 80vw; line-height: 5vh; line-width: 5vh">
        <tr>
            <th colspan="7">
                <h1>DoctorPatient Table</h1>
            </th>
        </tr>
        <t>
            <th>patient_id</th>
            <th>doctor_id</th>
            <t />
            <?php
            $dbconn = connection();
            $sql = 'SELECT * FROM patient_doctor Where patient_doctor.doctor_id =' . $pre_id_doctor . ' AND patient_doctor.patient_id =' . $pre_id_patient . ';';
            $result = mysqli_query($dbconn, $sql);

            // $bytes_written =  file_put_contents("temp.txt", $update_id);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <tr>
                <td><?php echo $row['patient_id']; ?> </td>
                <td><?php echo $row['doctor_id']; ?> </td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <form action="adminRightsDoctorPatient.php" method="POST">
                <td><input type="text" name="patient_id" class="input_width"></td>
                    <td><input type="text" name="doctor_id" class="input_width"></td>
                    <input type="submit" name="update_second" value="Update Data" class="bttn left-margin">
                </form>
            </tr>
    </table>
    <?php
            } else {
                echo '<script text = "Error">alert("Invalid Id Entered")</script>';
            }
        }else{
            echo '<script text = "Error">alert("Add Both Enteries")</script>';
        }

    }
    else if (isset($_POST['add'])) {

    ?>
    <table style="width: 80vw; line-height: 5vh; line-width: 5vh">
        <tr>
            <th colspan="2">
                <h1>Doctor Patient Table</h1>
            </th>
        </tr>
        <t>
            <th>patient_id</th>
            <th>doctor_id</th>
            <t />
            <tr>
                <!-- This data is goes to above another ispost() function -->
                <form action="adminRightsDoctorPatient.php" method="POST">
                    <td><input type="text" name="patient_id" class="input_width"></td>
                    <td><input type="text" name="doctor_id" class="input_width"></td>
                    <input type="submit" name="add_second" value="Add New Data" class="bttn left-margin">
                </form>
            </tr>
    </table>
    <?php
    }
    ?>
    <!-- Delete Edit Container -->
    <div class="delete-edit-container">
        <div class="delete-data">
            <form action="adminRightsDoctorPatient.php" method="POST">
                <input type="text" name="delete_doc_id_no" id="delete_id" placeholder="Enter doctor ID">
                <input type="text" name="delete_patient_id_no" id="delete_id" placeholder="Enter patient ID">
                <input type="submit" value="Delete" name="delete" id="delete_btn" class="bttn">
            </form>
        </div>
        <div class="edit-data">
            <form action="adminRightsDoctorPatient.php" method="POST">
                <input type="text" name="update_doc_id_no" id="update_id_no" placeholder="Enter doctor ID">
                <input type="text" name="update_patient_id_no" id="update_id_no" placeholder="Enter patient ID">
                <input type="submit" value="Update" name="update" id="update" class="bttn">
            </form>
        </div>
    </div>
    <!-- Table -->
    <table style="width: 80vw; line-height: 5vh">
        <tr>
            <th colspan="7">
                <h1>DoctorPatient Table</h1>
            </th>
        </tr>
        <t>
            <th>patient_id</th>
            <th>doctor_id</th>
            <t />
            <?php
            $sql_dp = 'SELECT pd.patient_id,pd.doctor_id  FROM project.patient_doctor AS pd;';
            $result_dp = mysqli_query($dbconn, $sql_dp);
            while ($row_dp = mysqli_fetch_assoc($result_dp)) {
            ?>
            <tr>
                <td><?php echo $row_dp['patient_id']; ?> </td>
                <td><?php echo $row_dp['doctor_id']; ?> </td>
            </tr>
            <?php
            }
            ?>
    </table>
    <div id="add-data">
        <form action="adminRightsDoctorPatient.php" method="POST">
            <input type="submit" name="add" value="Add New Data" class="bttn" style="margin: 2vh 0 0 44vw;">
        </form>
    </div>
    <!-- Finish -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>