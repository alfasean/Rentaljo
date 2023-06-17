<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Service</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

  <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="e20536c8-03ff-4e40-8cf2-d42a1521bd29";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</head>

<body>
  <div class="mt-5">
    <h1 class="h-unit">Pilihan Unit Kami</h1>
    <p class="p-unit">Kami menyediakan beberapa unit motor, mulai dari motor matic sampai manual</p>
    <div class="container-services mt-4">
    <div class="row">
      <?php
      session_start();
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "db_rental_motor";
      $conn = new mysqli($servername, $username, $password, $dbname);
      $query_res = mysqli_query($conn, "SELECT * FROM tb_motor");
      while ($r = mysqli_fetch_array($query_res)) {
          echo '
                  <div class="col-md-4 mb-3 d-flex justify-content-center align-items-center">
                    <div class="card border-0" style="height: 100%;">
                      <img style="height: 100% class="card-img-top mx-auto" alt="img1" src="Admin/uploads/' . $r['gambar'] . '" />
                      <div class="card-body">
                        <p class="mx-auto judul">' . $r['merk'] . '</p>
                        <p class="card-text text-center">Rp ' . $r['harga'] . '</p>
                      </div>
                      <a href="index.php?p=form_sewa&id=' . $r['id_motor'] . '" class="btn sewa_button text-white mx-auto mt-4 mb-4">Sewa Sekarang</a>
                    </div>
                  
                </div>';
      }
      ?>
      </div>
    </div>
  </div>
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
</body>

</html>