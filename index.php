<?php 
session_start();
require_once "connections/config.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RENTALJO | Sewa Motor Terbaik</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css?v=2" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Stylesheet -->
    <link href="css/style.css?v=2" rel="stylesheet">

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img src="img/logo1.png" alt="logo" style="width: 85px; height: 85px;"></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse px-4" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php?p=homepage" class="nav-item nav-link">Home</a>
                <a href="index.php?p=service" class="nav-item nav-link">Services</a>
                <a href="index.php?p=faq" class="nav-item nav-link">FAQ</a>
                <?php if (isset($_SESSION["session_username"])): ?>
                <a href="index.php?p=orders" class="nav-item nav-link">Orders</a>
                <a href="#" class="nav-item nav-link" style="color: #27374D;"><?= ucfirst($_SESSION["session_username"]) ?></a>
                <a href="logout.php" class="nav-item nav-link" style="color: #27374D;">Logout</a>
                <?php else: ?>
                <a href="regis.php" class="nav-item nav-link">Signup</a>
                <a href="login.php" class="nav-item nav-link">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
</head>

<body>


    <?php
    error_reporting(0);
    switch($_GET['p'])
    {
    default:
    include 'home.php';
    break;
    		case "service";
    		include 'service.php';
    		break;
    		case "faq";
    			include 'faq.php';
    		break;
    		case "form_sewa";
    			include 'rent_form.php';
    		break;
    		case "orders";
    			include 'orders.php';
    		break;
    	}
    	?>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>IKUTI KAMI</h4>
                    <div class="social-links">
                        <a href='https://www.facebook.com/' target="_blank"> <i class="fab fa-facebook-f"></i></a>
                        <a href='https://www.instagram.com/' target="_blank"> <i class="fab fa-instagram"></i></a>
                        <a href='https://www.youtube.com/' target="_blank"> <i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>ALAMAT</h4>
                    <p>Bahu, Manado</p>
                </div>
                <div class="footer-col">
                    <h4>LAYANAN</h4>
                    <ul>
                        <li><a href='index.php?p=home'>Home</a></li>
                        <li><a href='index.php?p=service'>Service</a></li>
                        <li><a href='index.php?p=faq'>FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <p class="footer-copyright">© Copyright 2022 Web Developed by <a target="_blank"
                            href="https://www.instagram.com/"><b>Rentaljo Team</b></a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/script.js?v=2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js?v=2"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>