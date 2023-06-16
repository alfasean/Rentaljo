<?php
session_start();
require_once "connections/config.php";
if (empty($_SESSION["session_username"])) {
    header('location:login.php');
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    
    if (isset($_GET["id"])) {
        $id_motor = $_GET["id"];
        $id = $_SESSION["session_username"];

        $tgl_pinjam = $_POST["tgl_pinjam"];
        $tgl_kembali = $_POST["tgl_kembali"];
        $jaminan = $_POST["jaminan"];
        $metode_pembayaran = $_POST["metode_pembayaran"];

        
        $query = "SELECT id_customer FROM tb_customer WHERE username = '$id'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_customer = $row["id_customer"];

            
            $query_motor = "SELECT harga FROM tb_motor WHERE id_motor = '$id_motor'";
            $result_motor = $conn->query($query_motor);
            if ($result_motor->num_rows > 0) {
                $row_motor = $result_motor->fetch_assoc();
                $harga = $row_motor["harga"];

                
                $date1 = new DateTime($tgl_pinjam);
                $date2 = new DateTime($tgl_kembali);
                $diff = $date2->diff($date1);
                $durasi_sewa = $diff->days;
                $total_bayar = $harga * $durasi_sewa;

                
                $sql = "INSERT INTO tb_sewa (id_customer, id_motor, tgl_pinjam, tgl_kembali, jaminan, metode_pembayaran, total_bayar)
                VALUES ('$id_customer', '$id_motor', '$tgl_pinjam', '$tgl_kembali', '$jaminan', '$metode_pembayaran', '$total_bayar')";

                if ($conn->query($sql) === TRUE) {
                    $conn->close();
                    echo '<script>window.location.href = "index.php?p=service";</script>';
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error: Tarif sewa motor tidak ditemukan.";
            }
        } else {
            echo "Error: ID customer tidak ditemukan.";
        }
    } else {
        echo "Error: Invalid request.";
    }
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

<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

body {
	color: #566787;
	background: #f5f5f5;
	font-size: 16px;
}
.table-responsive {
    margin: 30px 0;
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
		<div class="table-wrapper">
      <?php
        
        if (isset($_GET["id"])) {
          $id_motor = $_GET["id"];
          
          
          $query_motor = "SELECT * FROM tb_motor WHERE id_motor = '$id_motor'";
          $result_motor = $conn->query($query_motor);
          
          if ($result_motor->num_rows > 0) {
            $row_motor = $result_motor->fetch_assoc();
            $harga_sewa = $row_motor["harga_sewa"];

            
            echo '<div class="table-title">';
            echo '<div class="row">';
            echo '<div class="col-sm-6">';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
              

              
              $tgl_pinjam = $_POST["tgl_pinjam"];
              $tgl_kembali = $_POST["tgl_kembali"];

              
              $date_diff = date_diff(date_create($tgl_pinjam), date_create($tgl_kembali));
              $durasi_sewa = $date_diff->format('%a');

              
              $total_bayar = $harga_sewa * $durasi_sewa;

              
            }
          } else {
            echo "Error: Data motor tidak ditemukan.";
          }
        } else {
          echo "Error: Invalid request.";
        }
      ?>

      <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label>Tanggal Pinjam</label>
          <input type="date" name="tgl_pinjam" maxlength="200" class="form-control" required class="input">
        </div>

        <div class="form-group">
          <label>Tanggal Kembali</label>
          <input type="date" name="tgl_kembali" maxlength="200" class="form-control" required class="input">
        </div>

        <div class="form-group">
          <label>Jaminan</label>
          <select name="jaminan" class="input">
            <option>-----</option>
            <option>KTP/SIM</option>
            <option>Deposit Tunai</option>
          </select>
        </div>

        <div class="form-group">
          <label>Metode Pembayaran</label>
          <select name="metode_pembayaran" class="input">
            <option>-----</option>
            <option>Tunai</option>
          </select>
        </div>

        <input type="submit" name="submit" value="Submit" class="btn btn-success" style="border-radius: 5px;">
        <p class="mt-3"><i>Note : Pembayaran dan penyerahan jaminan dilakukan ketika customer melakukan pengambilan motor</i></p>
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
  <script src="js/main.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
