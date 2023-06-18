<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rental_motor";
$conn = new mysqli($servername, $username, $password, $dbname);

error_reporting(0);
session_start();

if (isset($_GET['menu_del']) && !empty($_GET['menu_del'])) {
    $sewa_id = $_GET['menu_del'];

    // Dapatkan id_motor sebelum menghapus data sewa
    $get_motor_query = "SELECT id_motor FROM tb_sewa WHERE id_sewa = ?";
    $stmt_get_motor = $conn->prepare($get_motor_query);
    $stmt_get_motor->bind_param("i", $sewa_id);
    $stmt_get_motor->execute();
    $stmt_get_motor->store_result();

    if ($stmt_get_motor->num_rows > 0) {
        $stmt_get_motor->bind_result($id_motor);
        $stmt_get_motor->fetch();

        $delete_query = "DELETE FROM tb_sewa WHERE id_sewa = ?";
        $stmt_delete = $conn->prepare($delete_query);
        $stmt_delete->bind_param("i", $sewa_id);

        if ($stmt_delete->execute()) {
            // Set status tb_motor menjadi 1
            $update_status_query = "UPDATE tb_motor SET status = 1 WHERE id_motor = ?";
            $stmt_update_status = $conn->prepare($update_status_query);
            $stmt_update_status->bind_param("i", $id_motor);

            if ($stmt_update_status->execute()) {
                header("location:index.php?p=orders");
                exit();
            } else {
                echo "Error: Gagal mengubah status motor.";
            }
        } else {
            echo "Error: Gagal menghapus data sewa.";
        }
    } else {
        echo "Error: Data sewa tidak ditemukan.";
    }
} else {
    echo "Error: ID sewa tidak valid.";
}
?>

