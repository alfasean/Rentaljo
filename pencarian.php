<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RENTALJO | Sewa Motor Terbaik</title>
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
</head>

<body>
    
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rental_motor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

$no = 0;

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

$query = "SELECT * FROM tb_motor WHERE merk LIKE '%$searchTerm%'";
$result = $conn->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        echo '<div class="row">';

        while ($row = $result->fetch_assoc()) {
            $no++;
            echo '
            <div class="mt-3 d-flex justify-content-center align-items-center">
                <div class="card border-0 dm" style="height: 100%;">
                    <img style="height: 100% class="card-img-top mx-auto" alt="img1" src="Admin/uploads/' . $row['gambar'] . '" />
                    <div class="card-body">
                        <p class="mx-auto judul">' . $row['merk'] . '</p>
                        <p class="card-text text-center" style="font-size:16px;">Rp ' . $row['harga'] . '</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <span class="label label-' . ($row['status'] ? "success" : "danger") . '" style="background-color: ' . ($row['status'] ? "#54B435" : "#CD1818") . '; color: ' . ($row['status'] ? "#FFF" : "#FFF") . '; border-radius: ' . ($row['status'] ? "5px" : "5px") . '; padding: ' . ($row['status'] ? "5px" : "5px") . ';">' . ($row['status'] ? "Tersedia" : "Tidak Tersedia") . '</span>
                        </div>
                    </div>';

            if ($row['status']) {
                echo '<a href="index.php?p=form_sewa&id=' . $row['id_motor'] . '" class="btn sewa_button text-white mx-auto mt-4 mb-4">Sewa Sekarang</a>';
            } else {
                echo '<button class="btn sewa_button text-white mx-auto mt-4 mb-4" disabled style="background-color: #000">Sewa Sekarang</button>';
            }
            echo '</div>
                </div>';
        }
        echo '<a href="index.php?p=service" class="btn sewa_button text-white mx-auto mt-4 mb-4" style="width: 20%; background-color: #F29727;">Kembali</a>';
        echo '</div>';
    } else {
        echo 'Tidak ada motor yang cocok dengan pencarian.';
    }
} else {
    echo 'Error: ' . $conn->error;
}

$conn->close();
?>

</body>

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
