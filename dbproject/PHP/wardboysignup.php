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
            <img src="img/profile.png" alt="HMC">
        </div>
        <ul>
            <li class="item"><a href="signup.php">Home</a></li>
            <li class="item"><a href="#services-container">Services</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
    </nav>
    <!-- Doctor SignUp Modal -->
    <div id="wboy-container" class="adm-container">
    <div id="wboy-signup" class="adm-login">
        <form action="data1.php" method="get">
            <h3>Create Account</h3>
            Email: <br><input type="text" name="wboy-email" id = "wboy-email"><br>
            Password: <br><input type="text" name="wboy-password" id = "wboy-password"><br>
            <input type="submit" name="Submit" value="Create Account" id = "wboy-submit-btn" class="adm-submit-btn">
        </form>
    </div>
    </div>
    <!-- Footer -->
    <footer>
        Copyright &copy; www.HMC.com
    </footer>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>