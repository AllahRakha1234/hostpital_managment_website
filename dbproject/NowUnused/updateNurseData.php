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
            <th colspan="7">
                <h1>Nurse Table</h1>
            </th>
        </tr>
        <t>
            <th>nurse_id</th>
            <th>name</th>
            <th>specialization</th>
            <th>phone_no</th>
            <th>experience</th>
            <th>email</th>
            <th>pass</th>
            <t />
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $database = "project";
            $dbconn = mysqli_connect($servername, $username, $password, $database);
            $update_id = $_GET["update_id_no"];
            $sql_nurse = 'SELECT * FROM project.nurse where nurse.nurse_id =' . $update_id . ';';
            $result_nurse = mysqli_query($dbconn, $sql_nurse);
            $bytes_written =  file_put_contents("temp.txt", $update_id);
            while ($row_nurse = mysqli_fetch_assoc($result_nurse)) {
            ?>
            <tr>
                <td><?php echo $row_nurse['nurse_id']; ?> </td>
                <td><?php echo $row_nurse['name']; ?> </td>
                <td><?php echo $row_nurse['specialization']; ?> </td>
                <td><?php echo $row_nurse['phone_no']; ?> </td>
                <td><?php echo $row_nurse['experience']; ?> </td>
                <td><?php echo $row_nurse['email']; ?> </td>
                <td><?php echo $row_nurse['pass']; ?> </td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <form action="updateNurseData1.php" method="get">
                    <td><input type="text" name="id" class="input_width"></td>
                    <td><input type="text" name="name" class="input_width"></td>
                    <td><input type="text" name="specialization" class="input_width"></td>
                    <td><input type="text" name="phone_no" class="input_width"></td>
                    <td><input type="text" name="experience" class="input_width"></td>
                    <td><input type="text" name="email" class="input_width"></td>
                    <td><input type="text" name="pass" class="input_width"></td>
                    <input type="submit" name="update" value="Update Data" class="bttn left-margin">
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