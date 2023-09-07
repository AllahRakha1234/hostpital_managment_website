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
            <th colspan="6">
                <h1>WardBoy Table</h1>
            </th>
        </tr>
        <t>
            <th>ward_boy_id</th>
            <th>name</th>
            <!-- <th>specialization</th> -->
            <th>phone_no</th>
            <th>email</th>
            <th>experience</th>
            <th>pass</th>
            <t />
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $database = "project";
            $dbconn = mysqli_connect($servername, $username, $password, $database);
            $update_id = $_GET["update_id_no"];
            $sql_ward_boy = 'SELECT * FROM project.ward_boy where ward_boy.ward_boy_id =' . $update_id . ';';
            $result_ward_boy = mysqli_query($dbconn, $sql_ward_boy);
            // $bytes_written =  file_put_contents("temp.txt", $update_id);
            // $global_variable = $update_id;

            // $_SESSION("update_id1") = $update_id;
            // echo $_SESSION("update_id1");
            // $_SESSION("update_id") = $_GET["update_id_no"];
            while ($row_ward_boy = mysqli_fetch_assoc($result_ward_boy)) {
            ?>
            <tr>
                <td><?php echo $row_ward_boy['ward_boy_id']; ?> </td>
                <td><?php echo $row_ward_boy['name']; ?> </td>
                <td><?php echo $row_ward_boy['phone_no']; ?> </td>
                <td><?php echo $row_ward_boy['email']; ?> </td>
                <td><?php echo $row_ward_boy['experience']; ?> </td>
                <td><?php echo $row_ward_boy['pass']; ?> </td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <form action="updateWardBoyData1.php" method="get">
                    <td><input type="text" name="id" class="input_width"></td>
                    <td><input type="text" name="name" class="input_width"></td>
                    <td><input type="text" name="phone_no" class="input_width"></td>
                    <td><input type="text" name="email" class="input_width"></td>
                    <td><input type="text" name="experience" class="input_width"></td>
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