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

$sql = "INSERT INTO tb_customer (username, password, nama_customer, jenis_kelamin, alamat, no_hp)
VALUES ('$usrname', '$pwd', '$nama_cus', '$jk', '$alamat', '$no_hp')";

if ($conn->query($sql) === TRUE) {
  echo header("location:login.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>