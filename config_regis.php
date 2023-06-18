<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rental_motor";

$conn = new mysqli($servername, $username, $password, $dbname);
$usrname = $_POST["usrname"];
$pwd = md5($_POST["pwd"]);
$nama_cus = $_POST["nama_cus"];
$jk = $_POST["jk"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];

if (strlen($_POST["pwd"]) < 8) {
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Password harus memiliki minimal 8 karakter!"
            }).then(function() {
              window.location.href = "regis.php";
            });
          });
        </script>';
    exit; 
}

$sql = "INSERT INTO tb_customer (username, password, nama_customer, jenis_kelamin, alamat, no_hp)
VALUES ('$usrname', '$pwd', '$nama_cus', '$jk', '$alamat', '$no_hp')";

if ($conn->query($sql) === TRUE) {
  echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              icon: "success",
              title: "Good job!",
              text: "Sukses Membuat Akun"
            }).then(function() {
              window.location.href = "login.php";
            });
          });
        </script>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
