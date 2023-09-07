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
    <!-- Navbar Ended -->
    <?php
    $dbconn = connection();
    if (isset($_POST['delete'])) {
        $delete_id = $_POST["delete_id_no"];
        $sql = 'Select * FROM payment where payment.payment_id =' . $delete_id . ';';
        $result = mysqli_query($dbconn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $sql = 'DELETE FROM payment where payment.payment_id =' . $delete_id . ';';
            $result = mysqli_query($dbconn, $sql);
            header("Location: adminRightsPayment.php");
        } else {
            echo '<script text = "Error">alert("DATA NOT FOUND")</script>';
        }
    } else if (isset($_POST['update'])) {
        $pre_id = $_POST['update_id_no'];
        $sql = 'Select * FROM payment where payment.payment_id =' . $pre_id . ';';
        $result = mysqli_query($dbconn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            // Creating Table for updating data
    ?>
    <table style="width: 80vw; line-height: 5vh; line-width: 5vh">
        <tr>
            <th colspan="4">
                <h1>Payment Table</h1>
            </th>
        </tr>
        <t>
            <th>payment_id</th>
            <th>patient_id</th>
            <th>payment_type</th>
            <th>amount</th>
            <t />
            <?php
            session_start();
            $dbconn = connection();
            $update_id = $_POST["update_id_no"];
            $_SESSION['upd_id'] = $update_id;
            $sql_payment = 'SELECT * FROM project.payment where payment.payment_id =' . $update_id . ';';
            $result_payment = mysqli_query($dbconn, $sql_payment);

            // $bytes_written =  file_put_contents("temp.txt", $update_id);
            while ($row_payment = mysqli_fetch_assoc($result_payment)) {
            ?>
            <tr>
                <td><?php echo $row_payment['payment_id']; ?> </td>
                <td><?php echo $row_payment['patient_id']; ?> </td>
                <td><?php echo $row_payment['payment_type']; ?> </td>
                <td><?php echo $row_payment['amount']; ?> </td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <form action="updatePaymentData1.php" method="POST">
                    <td><input type="text" name="payment_id" class="input_width"></td>
                    <td><input type="text" name="patient_id" class="input_width"></td>
                    <td><input type="text" name="payment_type" class="input_width"></td>
                    <td><input type="text" name="amount" class="input_width"></td>
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
            <th colspan="4">
                <h1>Payment Table</h1>
            </th>
        </tr>
        <t>
            <!-- <th>payment_id</th> -->
            <th>patient_id</th>
            <th>payment_type</th>
            <th>amount</th>
            <t />
            <tr>
                <form action="addPaymentData1.php" method="POST">
                    <!-- <td><input type="text" name="id" style="width: auto; text-align: center;"></td> -->
                    <td><input type="text" name="patient_id" class="input_width"></td>
                    <td><input type="text" name="payment_type" class="input_width"></td>
                    <td><input type="text" name="amount" class="input_width"></td>
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
            <form action="adminRightsPayment.php" method="POST">
                <input type="text" name="delete_id_no" id="delete_id" placeholder="Enter ID">
                <input type="submit" value="Delete" name="delete" id="delete_btn" class="bttn">
            </form>
        </div>
        <div class="edit-data">
            <form action="adminRightsPayment.php" method="POST">
                <input type="text" name="update_id_no" id="update_id_no" placeholder="Enter ID">
                <input type="submit" value="Update" name="update" id="update" class="bttn">
            </form>
        </div>
    </div>
    <!-- Table -->
    <table style="width: 80vw; line-height: 5vh">
        <tr>
            <th colspan="4">
                <h1>Payment Table</h1>
            </th>
        </tr>
        <t>
            <th>payment_id</th>
            <th>patient_id</th>
            <th>payment_type</th>
            <th>amount</th>
            <t />
            <?php
            $sql_room = 'SELECT * FROM project.payment';
            $result_payment = mysqli_query($dbconn, $sql_room);
            while ($row_payment = mysqli_fetch_assoc($result_payment)) {
            ?>
            <tr>
                <td><?php echo $row_payment['payment_id']; ?> </td>
                <td><?php echo $row_payment['patient_id']; ?> </td>
                <td><?php echo $row_payment['payment_type']; ?> </td>
                <td><?php echo $row_payment['amount']; ?> </td>
            </tr>
            <?php
            }
            ?>
    </table>
    <div id="add-data">
        <form action="adminRightsPayment.php" method="POST">
            <input type="submit" name="add" value="Add New Data" class="bttn" style="margin: 3vh 0 0 44vw;">
        </form>
    </div>
    <!-- Finish -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>