<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rental_motor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sewa = $_POST["id_sewa"];
    $deskripsi = $_POST["deskripsi"];
    $konfirmasi = $_POST["konfirmasi"];

    if (isset($_GET['menu_upd'])) {
        $sql = "UPDATE tb_transaksi SET deskripsi='$deskripsi', konfirmasi='$konfirmasi' WHERE id_sewa='$_GET[menu_upd]'";
    } else {
        echo "Invalid request.";
        exit();
    }

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        echo '<script>window.location.href = "admin.php?p=laporansewa";</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
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

                    if (isset($_GET['menu_upd'])) {
                        $sql = "SELECT tb_sewa.*, tb_customer.nama_customer, tb_motor.merk, tb_transaksi.deskripsi, tb_transaksi.konfirmasi, tb_transaksi.gambar FROM tb_sewa
                                JOIN tb_customer ON tb_sewa.id_customer = tb_customer.id_customer
                                JOIN tb_motor ON tb_sewa.id_motor = tb_motor.id_motor
                                JOIN tb_transaksi ON tb_sewa.id_sewa = tb_transaksi.id_sewa
                                WHERE tb_sewa.id_sewa = $_GET[menu_upd]";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                    } else {
                        echo "Invalid request.";
                        exit();
                    }                    
                    ?>

                    <form method="post">
                        <input type="hidden" name="id_sewa" value="<?php echo $row['id_sewa']; ?>">
                        
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" value="<?php echo $row['deskripsi']; ?>" readonly name="deskripsi" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Konfirmasi Pembayaran</label>
                            <select name="konfirmasi" class="form-control" required>
                                <option value="Belum Dikonfirmasi" <?php if ($row['konfirmasi'] == 'Belum Dikonfirmasi') echo 'selected'; ?>>Belum Dikonfirmasi</option>
                                <option value="Sudah Dikonfirmasi" <?php if ($row['konfirmasi'] == 'Sudah Dikonfirmasi') echo 'selected'; ?>>Sudah Dikonfirmasi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Struk Pembayaran</label>
                            <br>
                            <img style="height:500px; width 500px" src="../uploads/<?php echo $row['gambar']; ?>" alt="Gambar Transaksi" class="img-fluid">
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
