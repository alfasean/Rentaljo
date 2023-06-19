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

$id_sewa = $_GET['menu_upd'];

$query = "SELECT tb_sewa.*, tb_customer.nama_customer, tb_motor.merk FROM tb_sewa
          JOIN tb_customer ON tb_sewa.id_customer = tb_customer.id_customer
          JOIN tb_motor ON tb_sewa.id_motor = tb_motor.id_motor
          WHERE tb_sewa.id_sewa = '$id_sewa'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Rentaljo</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="content-wrapper">
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2><b>RENTALJO</b></h2>
                            </div>
                        </div>
                    </div>

                    <?php
                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $status = $row['status'];
                                $total_bayar = $row['total_bayar'];
                                $denda = $row['denda'];

                                if ($status == "Sudah Kembali") {
                                    $total_bayar = "Lunas";
                                    $denda = "Lunas";
                                }

                                echo '
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="card-text"><strong>Customer Name: </strong>' . $row['nama_customer'] . '</p>
                                        <p class="card-text"><strong>Motorcycle Name: </strong>' . $row['merk'] . '</p>
                                        <p class="card-text"><strong>Borrow Date: </strong>' . $row['tgl_pinjam'] . '</p>
                                        <p class="card-text"><strong>Return Date: </strong>' . $row['tgl_kembali'] . '</p>
                                        <p class="card-text"><strong>Guarantee: </strong>' . $row['jaminan'] . '</p>
                                        <p class="card-text"><strong>Status: </strong>' . $status . '</p>
                                        <p class="card-text"><strong>Payment Method: </strong>' . $row['metode_pembayaran'] . '</p>
                                        <p class="card-text"><strong>Denda: </strong>' . $denda . '</p>
                                        <p class="card-text"><strong>Total Pay: </strong>' . $total_bayar . '</p>
                                        <a href="admin.php?p=laporansewa" class="btn btn-primary">Back</a>
                                    </div>
                                </div>';
                            }
                        } else {
                            echo '<p>Tidak ada data sewa.</p>';
                        }
                    } else {
                        echo 'Error: ' . $conn->error;
                    }

                    $conn->close();
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
