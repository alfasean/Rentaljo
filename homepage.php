<?php 
session_start();
require_once "connections/config.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section class="jumbotron">
        <div class="d-flex p-5 row">
            <div class="col-12 col-md-9 mb-5 d-flex justify-content-center align-items-center">
                <div class="container mb-1">
                    <p class="title">RENTALJO DENG TORANG!</p>
                    <p class="title1">Jelajahi Kota dengan Bebas dan Hemat Bersama RentalJo</p>
                    <button onclick="location.href='index.php?p=service'" type="button" class="btn butt">PESAN SEKARANG</button>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-5 mt-5">
                <div>
                    <div class="bulat">
                        <img src="img/motor.png" alt="motor" style="width: 309px; height: 340px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <h1 class="text-center mt-5 content1">KEUNGGULAN</h1>
        <div class="d-flex justify-content-center align-items-center">
            <div class="garis mb-5">
            </div>
        </div>
        <div class="d-flex row">
            <div class="col-12 col-md-6">
                <div class="d-flex">
                    <div class="ctncard d-flex">
                        <div class="align-items-center d-flex justify-content-center">
                            <div class="bulat1 d-flex justify-content-center align-items-center m-3">
                                <img class="" src="img/best-price 1.png">
                            </div>
                        </div>
                        <div class="mt-4">
                            <h1 class="ctn1">MUDAH DAN MURAH</h1>
                            <p class="isictn1">Syarat Mudah untuk Wisatawan & Harga termurah di Kota Manado</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex">
                    <div class="ctncard d-flex">
                        <div class="align-items-center d-flex justify-content-center">
                            <div class="bulat1 d-flex justify-content-center align-items-center m-3">
                                <img class="" src="img/guaranteed 1.png">
                            </div>
                        </div>
                        <div class="mt-4">
                            <h1 class="ctn1">GARANSI KEPUASAN</h1>
                            <p class="isictn1">Jika merasa motor kurang cocok atau ada masalah, kami tukar dengan motor
                                yang lain.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex row mt-4">
            <div class="col-12 col-md-6">
                <div class="d-flex">
                    <div class="ctncard d-flex">
                        <div class="align-items-center d-flex justify-content-center">
                            <div class="bulat1 d-flex justify-content-center align-items-center m-3">
                                <img class="" src="img/customer-service 1.png">
                            </div>
                        </div>
                        <div class="mt-4">
                            <h1 class="ctn1">SUPPORT 24 JAM</h1>
                            <p class="isictn1">Dapat dihubungi 24 jam dan siap merespon dengan cepat dan sigap.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex">
                    <div class="ctncard d-flex">
                        <div class="align-items-center d-flex justify-content-center">
                            <div class="bulat1 d-flex justify-content-center align-items-center m-3">
                                <img class="" src="img/placeholder 1.png">
                            </div>
                        </div>
                        <div class="mt-4">
                            <h1 class="ctn1">FREE ANTAR JEMPUT</h1>
                            <p class="isictn1">Dimana pun kamu berada kami siap mengantar dan menjemput unit tanpa
                                dikenakan biaya lagi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <h1 class="text-center mt-5 content1">FASILITAS</h1>
        <div class="d-flex justify-content-center align-items-center">
            <div class="garis mb-5">
            </div>
        </div>
        <div class="d-flex row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <div class="d-flex">
                    <div class="ctncard1 d-flex">
                        <div class="align-items-center d-flex justify-content-center">
                            <img class="" src="img/helm 1.png">
                        </div>
                        <div class="mt-4">
                            <h1 class="ctn2">INCLUDE HELM</h1>
                            <p class="isictn2 ">Mendapatkan fasilitas 2 buah helm bersih dan berstandar SNI.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex">
                    <div class="ctncard1 d-flex" style="margin-left: 60px;">
                        <div class="align-items-center d-flex justify-content-center">
                            <img class="" src="img/raincoat 1.png">
                        </div>
                        <div class="mt-4">
                            <h1 class="ctn2">INCLUDE JAS HUJAN</h1>
                            <p class="isictn2 ">Mendapatkan fasilitas berupa jas hujan. Tersedia dalam bagasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>