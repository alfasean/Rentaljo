<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rental_motor";
$conn = new mysqli($servername, $username, $password, $dbname);

error_reporting(0);
session_start();

mysqli_query($conn,"DELETE FROM tb_sewa WHERE id_sewa = '".$_GET['menu_del']."'");
header("location:admin.php?p=laporansewa");  
?>
