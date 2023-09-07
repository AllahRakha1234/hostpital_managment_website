<?php
include('connection.php');
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
            <li class="item"><a href="adminRights.php">Back</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
    </nav>
    <!-- Navbar Emded -->
    <?php
    $dbconn = connection();
    if (isset($_POST['delete'])) {
        $delete_id = $_POST["delete_id_no"];
        $sql = 'Select * FROM patient where patient.patient_id =' . $delete_id . ';';
        $result = mysqli_query($dbconn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $sql = 'DELETE FROM patient where patient.patient_id =' . $delete_id . ';';
            $result = mysqli_query($dbconn, $sql);
        } else {
            echo '<script>alert("DATA NOT FOUND")</script>';
        }

    } else if (isset($_POST['update'])) {
        $pre_id = $_POST['update_id_no'];
        // $sql = 'Select * FROM doctor where doctor.doctor_id =' . $pre_id . ';';
        $sql = 'SELECT * FROM project.patient where patient.patient_id =' . $pre_id . ';';
        $result = mysqli_query($dbconn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            // Creating Table for updating data
    ?>
    <table style="width: 80vw; line-height: 5vh; line-width: 5vh">
        <tr>
            <th colspan="10">
                <h1>Patient Table</h1>
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
            session_start();
            $dbconn = connection();
            $update_id = $_POST["update_id_no"];
            $_SESSION['upd_id'] = $update_id;
            $sql_ward_boy = 'SELECT * FROM project.patient where patient.patient_id =' . $update_id . ';';
            $result_patient = mysqli_query($dbconn, $sql_ward_boy);
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
            <tr>
            <form action="updatePatientData1.php" method="POST">
                    <td><input type="text" name="id" class = "input_width"></td>
                    <td><input type="text" name="name" class = "input_width"></td>
                    <td><input type="text" name="address" class = "input_width"></td>
                    <td><input type="text" name="phone_no" class = "input_width"></td>
                    <td><input type="text" name="email" class = "input_width"></td>
                    <td><input type="text" name="date_of_birth" class = "input_width"></td>
                    <td><input type="text" name="nurse_nurse_id" class = "input_width"></td>
                    <td><input type="text" name="ward_ward_boy_id" class = "input_width"></td>
                    <td><input type="text" name="room_room_id" class="input_width"></td>
                    <td><input type="text" name="pass" class="input_width"></td>
                    <input type="submit" name="add" value="Update Data" class="bttn left-margin">
                </form>
            </tr>
    </table>
    <?php
        } else {
            echo '<script text = "Error">alert("Invalid Id Entered")</script>';
        }

    } else if (isset($_POST['add'])) {
    ?>
    <table style="width: 80vw; line-height: 5vh; line-width: 5vh">
        <tr>
            <th colspan="9">
                <h1>Patient Table</h1>
            </th>
        </tr>
        <t>
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
            <tr>
                <form action="addPatientData1.php" method="POST">
                    <!-- <td><input type="text" name="id" style="width: auto; text-align: center;"></td> -->
                    <td><input type="text" name="name" class="input_width"></td>
                    <td><input type="text" name="address" class="input_width"></td>
                    <td><input type="text" name="phone_no" class="input_width"></td>
                    <td><input type="text" name="email" class="input_width"></td>
                    <td><input type="text" name="date_of_birth" class="input_width"></td>
                    <td><input type="text" name="nurse_nurse_id" class="input_width"></td>
                    <td><input type="text" name="ward_ward_boy_id" class="input_width"></td>
                    <td><input type="text" name="room_room_id" class="input_width"></td>
                    <td><input type="text" name="pass" class="input_width"></td>
                    <input type="submit" name="add" value="Add New Data" class="bttn left-margin">
                </form>
            </tr>
    </table>
    <?php
    }
    ?>
    <!-- Delete Edit Container -->
    <div class="delete-edit-container">
        <div class="delete-data">
            <form action="adminRightsPatient.php" method="POST">
                <input type="text" name="delete_id_no" id="delete_id" placeholder="Enter ID">
                <input type="submit" value="Delete" name="delete" id="delete_btn" class="bttn">
            </form>
        </div>
        <div class="edit-data">
            <form action="adminRightsPatient.php" method="POST">
                <input type="text" name="update_id_no" id="update_id_no" placeholder="Enter ID">
                <input type="submit" value="Update" name="update" id="update" class="bttn">
            </form>
        </div>
    </div>
    <!-- Representing the nurse table data -->
    <table style="width: 80vw; line-height: 5vh">
        <tr>
            <th colspan="10">
                <h1>Patient Table</h1>
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
            $sql_patient = 'SELECT * FROM project.patient';
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
    <div id="add-data">
        <form action="adminRightsPatient.php" method="POST"><input type="submit" name="add" value="Add New Data"
                class="bttn" style="margin: 2vh 0 0 44vw;"></form>
    </div>

    <!-- Finish -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>