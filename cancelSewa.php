<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rental_motor";
$conn = new mysqli($servername, $username, $password, $dbname);

error_reporting(0);
session_start();

if(isset($_GET['menu_del']) && !empty($_GET['menu_del'])){
    $sewa_id = $_GET['menu_del'];
    
    // Hapus data sewa berdasarkan ID
    $query = "DELETE FROM tb_sewa WHERE id_sewa = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $sewa_id);
    if($stmt->execute()){
        header("location:index.php?p=orders");
        exit();
    } else {
        echo "Error: Gagal menghapus data sewa.";
    }
} else {
    echo "Error: ID sewa tidak valid.";
}
?>
