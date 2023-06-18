<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rental_motor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sewa = $_POST["id_sewa"];
    $tgl_pinjam = $_POST["tgl_pinjam"];
    $tgl_kembali = $_POST["tgl_kembali"];
    $jaminan = $_POST["jaminan"];
    $status = $_POST["status"];
    $metode_pembayaran = $_POST["metode_pembayaran"];

    if (isset($_GET['menu_upd'])) {
        $sql = "UPDATE tb_sewa SET tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', jaminan='$jaminan', metode_pembayaran='$metode_pembayaran', status='$status' WHERE id_sewa='$_GET[menu_upd]'";

        if ($status == 'Sudah Kembali') {
            $query_motor = "SELECT id_motor FROM tb_sewa WHERE id_sewa='$_GET[menu_upd]'";
            $result_motor = $conn->query($query_motor);
            if ($result_motor->num_rows > 0) {
                $row_motor = $result_motor->fetch_assoc();
                $id_motor = $row_motor["id_motor"];

                $update_motor_query = "UPDATE tb_motor SET status='1' WHERE id_motor='$id_motor'";
                if ($conn->query($update_motor_query) === FALSE) {
                    echo "Error updating motor status: " . $conn->error;
                    exit();
                }
            } else {
                echo "Error: Failed to retrieve motor data.";
                exit();
            }
        }
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
                        $sql = "SELECT tb_sewa.*, tb_customer.nama_customer, tb_motor.merk FROM tb_sewa
                                JOIN tb_customer ON tb_sewa.id_customer = tb_customer.id_customer
                                JOIN tb_motor ON tb_sewa.id_motor = tb_motor.id_motor
                                WHERE id_sewa='$_GET[menu_upd]'";
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
                            <label>Borrow Date</label>
                            <input type="date" value="<?php echo $row['tgl_pinjam']; ?>" name="tgl_pinjam" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Return Date</label>
                            <input type="date" value="<?php echo $row['tgl_kembali']; ?>" name="tgl_kembali" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Guarantee</label>
                            <input type="text" value="<?php echo $row['jaminan']; ?>" name="jaminan" maxlength="200" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="metode_pembayaran" class="form-control" required>
                                <option value="Tunai" <?php if ($row['metode_pembayaran'] == 'Tunai') echo 'selected'; ?>>Tunai</option>
                                <option value="Transfer Bank" <?php if ($row['metode_pembayaran'] == 'Transfer Bank') echo 'selected'; ?>>Transfer Bank</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="Belum Diambil" <?php if ($row['status'] == 'Belum Diambil') echo 'selected'; ?>>Belum Diambil</option>
                                <option value="Belum Kembali" <?php if ($row['status'] == 'Belum Kembali') echo 'selected'; ?>>Belum Kembali</option>
                                <option value="Sudah Kembali" <?php if ($row['status'] == 'Sudah Kembali') echo 'selected'; ?>>Sudah Kembali</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
