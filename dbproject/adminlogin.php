<?php include('connection.php'); ?>
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

<body style='background: url("img/bgdoctor.jpg") no-repeat center center/cover;'>
    <!-- Navbar Code -->
    <nav id="navbar">
        <div id="logo">
            <!-- <img src="img/adminRights/profile.JPEG" alt="HMC"> -->
            <!-- <img src="img/profile.jpeg" alt="HMC"> -->
            <!-- <img src="img/profile2.png" alt="HMC"> -->
            <img src="img/profile1.jpeg" alt="HMC">

        </div>
        <ul>
            <li class="item"><a href="login.php">Home</a></li>
            <li class="item"><a href="login.php">Back</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
    </nav>
    <!-- Checking Validiation of login -->
    <?php
    $dbconn = connection();    // This is the function from connection.php
    if (isset($_POST['Submit'])) {
        $email = $_POST['adm-email'];
        $password = $_POST['adm-password'];
        $sql = 'SELECT * FROM admin where email = "' . $email . '" AND pass = "' . $password . '";';
        $result = mysqli_query($dbconn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            header("Location: adminRights.php");
        } else {
            echo '<script text = "Error">alert("Cannot Login \nInvalid Email or Password")</script>';
        }
    }
    ?>
    <!-- Admin Login Modal -->
    <div id="adm-container">
        <div id="adm-login">
            <form action="adminlogin.php" method="POST">
                <h3>Login Page</h3>
                Email: <br><input type="text" name="adm-email" id="adm_email"><br>
                Password: <br><input type="text" name="adm-password" id="adm_password"><br>
                <input type="submit" value="Submit" name="Submit" id="adm-submit-btn" class="bttn">
            </form>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        Copyright &copy; <www class="HMS"></www>.com
    </footer>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>