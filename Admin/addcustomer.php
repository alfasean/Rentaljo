<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rental_motor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama_customer"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = "INSERT INTO tb_customer (nama_customer, jenis_kelamin, alamat, no_hp, username, password)
    VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_hp', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        echo '<script>window.location.href = "admin.php?p=customer";</script>';
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
    <title>Rentaljo | Admin</title>
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

                    <form method="post">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_customer" maxlength="200" class="form-control" required id="id_name">
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select id="id_email" name="jenis_kelamin">
                                <option>-----</option>
                                <option>Pria</option>
                                <option>Wanita</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" maxlength="200" class="form-control" required id="id_email">
                        </div>

                        <div class="form-group">
                            <label>Nomor Handphone</label>
                            <input type="number" name="no_hp" maxlength="200" class="form-control" required id="id_email">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" maxlength="200" class="form-control" required id="id_email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" maxlength="200" class="form-control" required id="id_email">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
