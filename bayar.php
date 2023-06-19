<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rental_motor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sewa = $_POST["id_sewa"];
    $deskripsi = $_POST["deskripsi"];
    $id_sewa = $_GET['menu_upd'];
    $konfirmasi = 'Belum Dikonfirmasi';

    $gambar = basename($_FILES['gambar']['name']);
    $gambar_path = "uploads/" . $gambar;

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar_path)) {
        echo "Gambar berhasil diunggah dan disimpan di folder lokal.";
    } else {
        echo "Gagal mengunggah gambar.";
    }

    $sql = "INSERT INTO tb_transaksi (id_sewa, deskripsi, gambar, konfirmasi)
     VALUES ('$id_sewa', '$deskripsi', '$gambar', '$konfirmasi')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        echo '<script>window.location.href = "index.php?p=orders";</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    $id_sewa = $_GET['menu_upd'];
    $sql_harga = "SELECT total_bayar FROM tb_sewa WHERE id_sewa = $id_sewa";
    $result_harga = $conn->query($sql_harga);
    $row_harga = $result_harga->fetch_assoc();
    $total_bayar = $row_harga['total_bayar'];

    $sql_konfirmasi = "SELECT konfirmasi FROM tb_transaksi WHERE id_sewa = $id_sewa";
    $result_konfirmasi = $conn->query($sql_konfirmasi);

    if ($result_konfirmasi && $result_konfirmasi->num_rows > 0) {
        $row_konfirmasi = $result_konfirmasi->fetch_assoc();
        $konfirmasi = $row_konfirmasi['konfirmasi'];
    } else {
        $konfirmasi = "Data tidak tersedia";
    }
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- CSS Stylesheet -->
<link href="css/style.css?v=2" rel="stylesheet">

<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="e20536c8-03ff-4e40-8cf2-d42a1521bd29";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

body {
	color: #566787;
	background: #f5f5f5;
	font-size: 16px;
}
.table-responsive {
    margin: 30px 0;
    border-radius: 15px;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title .btn-group {
	float: right;
}
.table-title .btn, .delete .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i, .delete .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span, .delete .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
  font-family: 'Poppins', sans-serif;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
  height: 50px;
	width: 50px;
}

form label {
	font-size: 1rem;
	font-weight: normal;
  font-family: 'Poppins', sans-serif;
}	

.input {
	display: block;
	width: 100% !important;
	height: calc(1.5em + 0.75rem + 2px);
	padding: 0.375rem 0.75rem;
	font-size: 18px;
	font-weight: 400;
	line-height: 1.5;
	color: #495057;
	background-color: #fff;
	background-clip: padding-box;
	border: 1px solid #ced4da;
	border-radius: 0.25rem;
	transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  font-family: 'Poppins', sans-serif;
}
</style>
</head>
<body>
<div class="content-wrapper">
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper fm">
      <form method="post" action="" enctype="multipart/form-data">

      <div class="form-group">
        <label class="text">Total Bayar</label>
        <input type="text" name="total_bayar" value="<?php echo $total_bayar; ?>" readonly class="form-control input">
        </div>

      <div class="form-group">
        <label class="text">Konfirmasi Pembayaran</label>
        <input type="text" name="konfirmasi" value="<?php echo $konfirmasi; ?>" readonly class="form-control input">
        </div>

        <div class="form-group">
        <label class="text">Nomor Rekening</label>
        <input type="text" name="total_bayar" value="2839-1021-9322-74-9 / A.n Sewa Motor Rentaljo" readonly class="form-control input">
        </div>

        <div class="form-group">
          <label class="text">Deskripsi</label>
          <input type="text" name="deskripsi" maxlength="200" class="form-control" class="input">
        </div>

        <div class="form-group">
          <label class="text">Bukti Pembayaran</label>
          <input type="file" name="gambar" maxlength="200" class="form-control" required class="input">
        </div>

        <a class="btn btn-primary" role="button" href="index.php?p=orders" style="border-radius:5px;">Back</a>
        <input type="submit" name="submit" value="Submit" class="btn btn-success" style="border-radius: 5px;">
      </form>
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
  <script src="js/script.js"></script>
</body>
</html>
