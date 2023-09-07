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
    <!-- Attending call and checking validiation as well -->
    <?php
    $dbconn = connection(); // This is the function from connection.php
    if (isset($_POST['attend_call'])) {
        $call_call_id = $_POST['call_id_no'];
        $_SESSION['call_id'] = $call_call_id;
        $sql = 'SELECT * FROM unattended_call where call_id = ' . $call_call_id . ';';
        $result = mysqli_query($dbconn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
    ?>
    <table style="width: 80vw; line-height: 5vh; margin-top: 5vh;">
        <tr>
            <th colspan="3">
                <h1>Processing Call</h1>
            </th>
        </tr>
        <t>
            <th>call_id</th>
            <th>query</th>
            <th>solution</th>
            <t />
            <?php
            $sql_sg = 'SELECT * FROM project.unattended_call where call_id = ' . $call_call_id . '';
            $result_sg = mysqli_query($dbconn, $sql_sg);
            while ($row_sg = mysqli_fetch_assoc($result_sg)) {
                ?>
            <tr>
                <td><?php echo $row_sg['call_id']; ?> </td>
                <td><?php echo $row_sg['query']; ?> </td>
                <form action="sg_attend_call_patient.php" method="POST">
                    <td><input type="text" name="solution" class="input_width"></td>
                    <input type="submit" name="confirm_call" value="Confirm Attend" class="bttn left-margin top-margin">
                </form>
            </tr>
            <?php
            }
                ?>
    </table>

    <?php
        } else {
            echo '<script text = "Error">alert("DO NOT FOUND DATA \n Inavlid Call ID")</script>';
        }
    }
        ?>
    <!-- Call attend button -->
    <div class="edit-data" style="margin: 2vh 0 0 27vw;">
        <form action="sgUnattendedCalls.php" method="POST">
            <input type="text" name="call_id_no" id="call_id_no" placeholder="Enter Call ID">
            <input type="submit" value="Attend Call" name="attend_call" id="call" class="bttn">
        </form>
    </div>
    <!-- Representing the unattended call table data -->
    <table style="width: 80vw; line-height: 5vh; margin-top: 5vh;">
        <tr>
            <th colspan="5">
                <h1>Unattended Calls Table</h1>
            </th>
        </tr>
        <t>
            <th>call_id</th>
            <th>query</th>
            <th>patient_patient_id</th>
            <t />
            <?php
            $dbconn = connection();
            // $email_email_id = $_SESSION['email_as_id']; // Catching value of email form doctorlogin page
            $sql_sg = 'SELECT * FROM project.unattended_call Where status = 0 ';
            $result_sg = mysqli_query($dbconn, $sql_sg);
            while ($row_sg = mysqli_fetch_assoc($result_sg)) {
            ?>
            <tr>
                <td><?php echo $row_sg['call_id']; ?> </td>
                <td><?php echo $row_sg['query']; ?> </td>
                <td><?php echo $row_sg['patient_patient_id']; ?> </td>
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