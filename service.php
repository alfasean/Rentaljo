<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Service</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="mt-5">
    <h1 class="h-unit">Pilihan Unit Kami</h1>
    <p class="p-unit">Kami menyediakan beberapa unit motor, mulai dari motor matic sampai manual</p>
    <button class="pre-btn"><img src="img/arrow.png" alt="arrow" /></button>
    <button class="nxt-btn"><img src="img/arrow.png" alt="arrow2" /></button>
    <div class="container-services mt-4">
      <?php
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "db_rental_motor";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $query_res = mysqli_query($conn, "SELECT * FROM tb_motor"); 
        while ($r = mysqli_fetch_array($query_res)) {
          echo '<div class="row">
                  <div class="col-md-4 mx-3 mb-3">
                    <div class="card border-0">
                      <img class="card-img-top mx-auto" alt="img1" src="Admin/uploads/'.$r['gambar'].'" />
                      <div class="card-body">
                        <p class="mx-auto judul">'.$r['merk'].'</p>
                        <p class="card-text text-center">Rp '.$r['harga'].'</p>
                      </div>
                      <a href="#" class="btn sewa_button text-white mx-auto mt-4 mb-4">Sewa Sekarang</a>
                    </div>
                  </div>
                </div>';
        }
      ?>
    </div>
  </div>

  <script src="script.js"></script>
</body>

</html>
