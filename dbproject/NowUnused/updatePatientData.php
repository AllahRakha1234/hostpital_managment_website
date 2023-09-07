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

<body style="background: white;">
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
    <!-- Representing the doctor table data -->
    <!-- <table align="center" border="2px" style="width: 80vw; line-height: 5vh"> -->
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
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $database = "project";
            $dbconn = mysqli_connect($servername, $username, $password, $database);
            $update_id = $_GET["update_id_no"];
            $sql_ward_boy = 'SELECT * FROM project.patient where patient.patient_id =' . $update_id . ';';
            $result_patient = mysqli_query($dbconn, $sql_ward_boy);
            $bytes_written = file_put_contents("temp.txt", $update_id);
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
                <!-- <form action="updatePatientData1.php" method="get">
                    <td><input type="text" name="id" class = "input_width" style="width: auto; text-align: center;"></td>
                    <td><input type="text" name="name" class = "input_width" style="width: auto; text-align: center;"></td>
                    <td><input type="text" name="address" class = "input_width" style="width: auto; text-align: center;"></td>
                    <td><input type="text" name="phone_no" class = "input_width" style="width: auto; text-align: center;"></td>
                    <td><input type="text" name="email" class = "input_width" style="width: auto; text-align: center;"></td>
                    <td><input type="text" name="date_of_birth" class = "input_width" style="width: auto; text-align: center;"></td>
                    <td><input type="text" name="nurse_nurse_id" class = "input_width" style="width: auto; text-align: center;"></td>
                    <td><input type="text" name="ward_ward_boy_id" class = "input_width" style="width: auto; text-align: center;"></td>
                    <td><input type="text" name="room_room_id" class="input_width" style="width: auto; text-align: center;"></td>
                    <td><input type="text" name="pass" class="input_width" style="width: auto; text-align: center;"></td>
                    <input type="submit" name="add" value="Update Data" class="bttn left-margin">
                </form> -->
                <!-- <form action="updatePatientData1.php" method="get">
                    <td><input type="text" name="id" class = "input_width" style=" text-align: center;"></td>
                    <td><input type="text" name="name" class = "input_width" style=" text-align: center;"></td>
                    <td><input type="text" name="address" class = "input_width" style=" text-align: center;"></td>
                    <td><input type="text" name="phone_no" class = "input_width" style=" text-align: center;"></td>
                    <td><input type="text" name="email" class = "input_width" style=" text-align: center;"></td>
                    <td><input type="text" name="date_of_birth" class = "input_width" style=" text-align: center;"></td>
                    <td><input type="text" name="nurse_nurse_id" class = "input_width" style=" text-align: center;"></td>
                    <td><input type="text" name="ward_ward_boy_id" class = "input_width" style=" text-align: center;"></td>
                    <td><input type="text" name="room_room_id" class="input_width" style=" text-align: center;"></td>
                    <td><input type="text" name="pass" class="input_width" style=" text-align: center;"></td>
                    <input type="submit" name="add" value="Update Data" class="bttn left-margin">
                </form> -->
                <form action="updatePatientData1.php" method="get">
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
    <!-- Finish -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>