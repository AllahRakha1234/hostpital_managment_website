<?php
include('connection.php');
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
    <!-- Second Time Update -->
    <?php
    if (isset($_POST['update_second'])) {
        $dbconn = connection();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $sql = 'UPDATE project.admin  SET name ="' . $name . '", email = "' . $email . '" , pass = "' . $pass . '"';
        $result = mysqli_query($dbconn, $sql);
        header("Location: adminProfile.php");
    }
    ?>
    <!-- First time Update -->
    <?php
    $dbconn = connection();
    if (isset($_POST['update'])) {
    ?>
    <table style="width: 80vw; line-height: 5vh; line-width: 5vh">
        <tr>
            <th colspan="3">
                <h1>Admin Table</h1>
            </th>
        </tr>
        <t>
            <th>name</th>
            <th>email</th>
            <th>pass</th>
            <t />
            <?php
        session_start();
        $dbconn = connection();
        $sql = 'SELECT * FROM project.admin';
        $result = mysqli_query($dbconn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['name']; ?> </td>
                <td><?php echo $row['email']; ?> </td>
                <td><?php echo $row['pass']; ?> </td>
            </tr>
            <?php
        }
            ?>
            <tr>
                <form action="adminProfile.php" method="POST">
                    <td><input type="text" name="name" class="input_width"></td>
                    <td><input type="text" name="email" class="input_width"></td>
                    <td><input type="text" name="pass" class="input_width"></td>
                    <input type="submit" name="update_second" value="Update Data" class="bttn" style="margin: 0 0 0 45vw;">
                </form>
            </tr>
    </table>
    <?php }
    ?>
    <!-- Edit Container -->
    <div class="edit-data">
        <form action="adminProfile.php" method="POST" style="margin: 0 0 0 60vw;">
            <input type="submit" value="Update" name="update" class="bttn">
        </form>
    </div>
    <!-- Table -->
    <table style="width: 80vw; line-height: 5vh">
        <tr>
            <th colspan="3">
                <h1>Admin Table</h1>
            </th>
        </tr>
        <t>
            <th>name</th>
            <th>email</th>
            <th>pass</th>
            <t />
            <?php
            $sql = 'SELECT * FROM project.admin';
            $result = mysqli_query($dbconn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['name']; ?> </td>
                <td><?php echo $row['email']; ?> </td>
                <td><?php echo $row['pass']; ?> </td>
            </tr>
            <?php
            }
            ?>
    </table>
    <!-- Finish -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>