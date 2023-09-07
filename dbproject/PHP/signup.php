<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <!-- Navbar Code -->
    <nav id="navbar">
        <div id="logo">
            <img src="img/profile.png" alt="HMC">
        </div>
        <ul>
            <li class="item"><a href="index.php">Home</a></li>
            <li class="item"><a href="#services-container">Services</a></li>
            <li class="item"><a href="#clients-section">Clients</a></li>
            <li class="item"><a href="#contact-section">Contact Us</a></li>
        </ul>
    </nav>
    <!-- Container containing all components of the page acting like body -->
    <div id="container-all">
        <!-- Sidebar Code -->
        <div id="sidebar">
            <div id="doclogin" class="sd-list"><a href="doctorsignup.php">Doctor SignUp</a></div>
            <div id="doclogin" class="sd-list"><a href="nursesignup.php">Nurse SignUp</a></div>
            <div id="doclogin" class="sd-list"><a href="wardboysignup.php">WardBoy SignUp</a></div>
            <div id="doclogin" class="sd-list"><a href="patientsignup.php">Patient SignUp</a></div>
        </div>
        <!-- Slider Code -->
        <div id="slider">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner cls">
                    <div class="carousel-item active">
                        <img src="img/slider/slider_4.jpeg" class="d-block w-100" alt="HMS">
                    </div>
                    <div class="carousel-item">
                        <img src="img/slider/slider_5.jpg" class="d-block w-100" alt="HMS">
                    </div>
                    <div class="carousel-item">
                        <img src="img/slider/slider_6.jpg" class="d-block w-100" alt="HMS">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- container-all ended  -->
    </div>

    <footer>
        Copyright &copy; www.HMC.com
    </footer>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>