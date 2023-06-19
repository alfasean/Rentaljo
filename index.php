<?php 
session_start();
require_once "connections/config.php";
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/logo1.png" type="image/x-icon">
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
    <link href="css/style.css" rel="stylesheet">

    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="e20536c8-03ff-4e40-8cf2-d42a1521bd29";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0 navv">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img src="img/logo1.png" alt="logo" style="width: 85px; height: 85px;"></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse px-4" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php?p=homepage" class="nav-item nav-link text">Home</a>
                <a href="index.php?p=service" class="nav-item nav-link text">Services</a>
                <?php if (isset($_SESSION["session_username"])): ?>
                <a href="index.php?p=orders" class="nav-item nav-link text">Orders</a>
                <a href="#" class="nav-item nav-link text" style="color: #27374D;"><?= ucfirst($_SESSION["session_username"]) ?></a>
                <a href="logout.php" class="nav-item nav-link text" style="color: #27374D;">Logout</a>
                <?php else: ?>
                <a href="regis.php" class="nav-item nav-link text">Signup</a>
                <a href="login.php" class="nav-item nav-link text">Login</a>
                <?php endif; ?>
                <div class="d-flex align-items-center">
                <label class="switch">
                    <input type="checkbox" class="input" id="darkmode">
                    <span class="slider"></span>
                </label>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <style>
        .switch {
        font-size: 17px;
        position: relative;
        display: inline-block;
        width: 3.5em;
        height: 2em;
        }

        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        .slider {
        --background: #28096b;
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: var(--background);
        transition: .5s;
        border-radius: 30px;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 1.4em;
        width: 1.4em;
        border-radius: 50%;
        left: 10%;
        bottom: 15%;
        box-shadow: inset 8px -4px 0px 0px #fff000;
        background: var(--background);
        transition: .5s;
        }

        input:checked + .slider {
        background-color: #522ba7;
        }

        input:checked + .slider:before {
        transform: translateX(100%);
        box-shadow: inset 15px -4px 0px 15px #fff000;
        }

        .dark {
            background-color: #150050 !important;
        }

        .dark .dm {
            background-color: #270082 !important;
        }

        .dark .text {
            color: #fff !important;
        }

        .dark .footer {
            background-color: #270082 !important;
        }

        .dark .icf {
            background-color: #fff !important;
        }

        .dark .navv{
            background-color: #1D267D !important;
        }

        .dark .fm {
            background-color: #270082 !important;
        }
    </style>
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
    		case "form_sewa";
    			include 'rent_form.php';
    		break;
    		case "orders";
    			include 'orders.php';
    		break;
    		case "bayar";
    			include 'bayar.php';
    		break;
    	}
    	?>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4 class="text">IKUTI KAMI</h4>
                    <div class="social-links">
                        <a href='https://www.facebook.com/' target="_blank" class="icf"> <i class="fab fa-facebook-f"></i></a>
                        <a href='https://www.instagram.com/' target="_blank" class="icf"> <i class="fab fa-instagram"></i></a>
                        <a href='https://www.youtube.com/' target="_blank" class="icf"> <i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4 class="text">ALAMAT</h4>
                    <p class="text">Bahu, Manado</p>
                </div>
                <div class="footer-col">
                    <h4 class="text">LAYANAN</h4>
                    <ul>
                        <li><a class="text" href='index.php?p=home'>Home</a></li>
                        <li><a class="text" href='index.php?p=service'>Service</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <p class="footer-copyright text">© Copyright 2022 Web Developed by <a target="_blank"
                            href="https://www.instagram.com/"><b class="text">Rentaljo Team</b></a></p>
                </div>
            </div>
        </div>
    </footer>


    <script>
        const toggleSwitch = document.querySelector('input[type="checkbox"]');

        if(localStorage.getItem('darkModeEnabled')){
        document.body.className = 'dark';
        toggleSwitch.checked = true;
        }

        const body = document.querySelector('body');

        toggleSwitch.addEventListener('click', function(e) {
        const {checked} = toggleSwitch;
        if (checked) {
            localStorage.setItem('darkModeEnabled', true);
        } else {
            localStorage.removeItem('darkModeEnabled');
        }
        document.body.className = checked ? 'dark' : '' 
        })
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/script.js?v=2"></script>
</body>

</html>