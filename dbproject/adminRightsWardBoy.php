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
        $sql = 'Select * FROM ward_boy where ward_boy.ward_boy_id =' . $delete_id . ';';
        $result = mysqli_query($dbconn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $sql = 'DELETE FROM ward_boy where ward_boy.ward_boy_id =' . $delete_id . ';';
            $result = mysqli_query($dbconn, $sql);
            // header("Location: adminRightsNurse.php");
        } else {
            echo '<script>alert("DATA NOT FOUND")</script>';
        }
    } else if (isset($_POST['update'])) {
        $pre_id = $_POST['update_id_no'];
        // $sql = 'Select * FROM doctor where doctor.doctor_id =' . $pre_id . ';';
        $sql = 'SELECT * FROM project.ward_boy where ward_boy.ward_boy_id =' . $pre_id . ';';
        $result = mysqli_query($dbconn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            // Creating Table for updating data
    ?>
    <table style="width: 80vw; line-height: 5vh; line-width: 5vh">
        <tr>
            <th colspan="7">
                <h1>WardBoy Table</h1>
            </th>
        </tr>
        <t>
            <th>ward_boy_id</th>
            <th>name</th>
            <th>phone_no</th>
            <th>email</th>
            <th>experience</th>
            <th>pass</th>
            <t />
            <?php
            session_start();
            $dbconn = connection();
            $update_id = $_POST["update_id_no"];
            $_SESSION['upd_id'] = $update_id;
            $sql_ward_boy = 'SELECT * FROM project.ward_boy where ward_boy.ward_boy_id =' . $update_id . ';';
            $result_ward_boy = mysqli_query($dbconn, $sql_ward_boy);
            // $bytes_written =  file_put_contents("temp.txt", $update_id);
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
                <form action="updateWardBoyData1.php" method="POST">
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
    <?php
        } else {
            echo '<script text = "Error">alert("Invalid Id Entered")</script>';
        }

    } else if (isset($_POST['add'])) {
    ?>
    <table style="width: 80vw; line-height: 5vh; line-width: 5vh">
        <tr>
            <th colspan="6">
                <h1>WardBoy Table</h1>
            </th>
        </tr>
        <t>
            <!-- <th>doctor_id</th> -->
            <th>name</th>
            <th>phone_no</th>
            <th>email</th>
            <th>experience</th>
            <th>pass</th>
            <t />
            <tr>
                <form action="addWardBoyData1.php" method="POST">
                    <!-- <td><input type="text" name="id" style="width: auto; text-align: center;"></td> -->
                    <td><input type="text" name="name" class="input_width"></td>
                    <td><input type="text" name="phone_no" class="input_width"></td>
                    <td><input type="text" name="email" class="input_width"></td>
                    <td><input type="text" name="experience" class="input_width"></td>
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
            <form action="adminRightsWardBoy.php" method="POST">
                <input type="text" name="delete_id_no" id="delete_id" placeholder="Enter ID">
                <input type="submit" value="Delete" name="delete" id="delete_btn" class="bttn">
            </form>
        </div>
        <div class="edit-data">
            <form action="adminRightsWardBoy.php" method="POST">
                <input type="text" name="update_id_no" id="update_id_no" placeholder="Enter ID">
                <input type="submit" value="Update" name="update" id="update" class="bttn">
            </form>
        </div>
    </div>
    <!-- Representing the nurse table data -->
    <table style="width: 80vw; line-height: 5vh">
        <tr>
            <th colspan="6">
                <h1>WardBoy Table</h1>
            </th>
        </tr>
        <t>
            <th>ward_boy_id</th>
            <th>name</th>
            <th>phone_no</th>
            <th>email</th>
            <th>experience</th>
            <th>pass</th>
            <t />
            <?php
            $dbconn = connection();
            $sql_WBoy = 'SELECT * FROM project.ward_boy';
            $result_WBoy = mysqli_query($dbconn, $sql_WBoy);
            while ($row_WBoy = mysqli_fetch_assoc($result_WBoy)) {
            ?>
            <tr>
                <td><?php echo $row_WBoy['ward_boy_id']; ?> </td>
                <td><?php echo $row_WBoy['name']; ?> </td>
                <td><?php echo $row_WBoy['phone_no']; ?> </td>
                <td><?php echo $row_WBoy['email']; ?> </td>
                <td><?php echo $row_WBoy['experience']; ?> </td>
                <td><?php echo $row_WBoy['pass']; ?> </td>
            </tr>
            <?php
            }
            ?>
    </table>
    <div id="add-data">
        <form action="adminRightsWardBoy.php" method="POST"><input type="submit" name="add" value="Add New Data"
                class="bttn" style="margin: 2vh 0 0 44vw;"></form>
    </div>

    <!-- Finish -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>




<!-- /////////////////////////////////////////////////////////////////////////////////// -->