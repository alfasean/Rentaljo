<?php
session_start();
require_once "connections/config.php";
if (empty($_SESSION["session_username"])) {
    header('location:login.php');
    exit;
}

$id = $_SESSION["session_username"];


$query = "SELECT id_customer FROM tb_customer WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_customer = $row["id_customer"];

    
    $query_orderan = "SELECT tb_sewa.*, tb_motor.merk, tb_motor.harga 
                      FROM tb_sewa 
                      INNER JOIN tb_motor ON tb_sewa.id_motor = tb_motor.id_motor 
                      WHERE tb_sewa.id_customer = ?";

    $stmt_orderan = $conn->prepare($query_orderan);
    $stmt_orderan->bind_param("s", $id_customer);
    $stmt_orderan->execute();
    $result_orderan = $stmt_orderan->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orderan Sewa Motor</title>
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
    <script src="https://kit.fontawesome.com/8353bdf612.js" crossorigin="anonymous"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Stylesheet -->
    <link href="css/style.css?v=2" rel="stylesheet">

    <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "e20536c8-03ff-4e40-8cf2-d42a1521bd29";
        (function () {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>
</head>

<body>
    <div class="container mt-5">
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th class="text-dark">No.</th>
                    <th class="text-dark">Tanggal Pinjam</th>
                    <th class="text-dark">Tanggal Kembali</th>
                    <th class="text-dark">Jaminan</th>
                    <th class="text-dark">Metode Pembayaran</th>
                    <th class="text-dark">Nama Motor</th>
                    <th class="text-dark">Harga</th>
                    <th class="text-dark">Status</th>
                    <th class="text-dark">Total Bayar</th>
                    <th class="text-dark">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_orderan->num_rows > 0) {
                    $no = 1;
                    while ($row_orderan = $result_orderan->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row_orderan['tgl_pinjam'] . "</td>";
                        echo "<td>" . $row_orderan['tgl_kembali'] . "</td>";
                        echo "<td>" . $row_orderan['jaminan'] . "</td>";
                        echo "<td>" . $row_orderan['metode_pembayaran'] . "</td>";
                        echo "<td>" . $row_orderan['merk'] . "</td>";
                        echo "<td>" . $row_orderan['harga'] . "</td>";
                        echo "<td class='text-center'><div style='background-color: #379237; color: #fff; border-radius: 10px; font-size: 12px;'>" . $row_orderan['status'] . "</div></td>";
                        echo "<td>" . $row_orderan['total_bayar'] . "</td>";
                        
                        if ($row_orderan['status'] != "Belum Kembali" && $row_orderan['status'] != "Sudah Kembali") {
                            echo '<td><a href="cancelSewa.php?menu_del=' . $row_orderan['id_sewa'] . '" class="delete" title="Cancel"><i class="fa-solid fa-ban"></i></a></td>';
                        } else {
                            echo '<td></td>';
                        }
                        
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada orderan sewa motor.</td></tr>";
                }
                ?>
            </tbody>
        </table>
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