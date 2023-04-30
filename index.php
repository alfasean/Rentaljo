<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="homepage.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #fff !important;">
        <div class="container">
            <a class="navbar-brand" href="#"> <img style="width: 90px; height: 90px;" src="img/logo1.png"
                    alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active me-3" href="index.php?p=homepage">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" href="index.php?p=service">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" href="#">About</a>
                    </li>
                    <?php if (isset($_SESSION["session_username"])): ?>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#"> | <?= ucfirst($_SESSION["session_username"]) ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" href="logout.php">Logout</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link me-3" href="regis.php">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    error_reporting(0);
    switch($_GET['p'])
    {
    default:
    include 'homepage.php';
    break;
    		case "service";
    		include 'service.php';
    		break;
    		case "about";
    			include 'about.php';
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
                        <li><a href='#home'>Home</a></li>
                        <li><a href='#portofolio'>Service</a></li>
                        <li><a href='#about'>About</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <p class="footer-copyright">© Copyright 2022 Web Developed by <a target="_blank"
                            href="https://www.instagram.com/"><b>Rentaljo Team</b></a></p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>