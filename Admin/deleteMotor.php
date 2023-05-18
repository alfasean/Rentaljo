<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rental_motor";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);
//including the database connection file

error_reporting(0);
session_start();

mysqli_query($conn,"DELETE FROM tb_motor WHERE id_motor = '".$_GET['menu_del']."'");
header("location:admin.php?p=motor");  
?>
