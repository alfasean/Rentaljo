<?php
session_start(); // Mulai sesi jika belum dimulai
require_once "connections/config.php";
if(empty($_SESSION["session_username"]))
{
	header('location:login.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl_pinjam = $_POST["tgl_pinjam"];
    $tgl_kembali = $_POST["tgl_kembali"];
    $jaminan = $_POST["jaminan"];

    $sql = "INSERT INTO tb_sewa (tgl_pinjam, tgl_kembali, jaminan)
    VALUES ('$tgl_pinjam', '$tgl_kembali', '$jaminan')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        echo '<script>window.location.href = "index.php?p=service";</script>';
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Poppins', sans-serif;
	font-size: 16px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn, .delete .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i, .delete .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span, .delete .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
  height: 50px;
	width: 50px;
}

form label {
	font-size: 1rem;
	font-weight: normal;
}	

.input {
	display: block;
	width: 100% !important;
	height: calc(1.5em + 0.75rem + 2px);
	padding: 0.375rem 0.75rem;
	font-size: 18px;
	font-weight: 400;
	line-height: 1.5;
	color: #495057;
	background-color: #fff;
	background-clip: padding-box;
	border: 1px solid #ced4da;
	border-radius: 0.25rem;
	transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
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

      <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label>Tanggal Pinjam</label>
          <input type="date" name="tgl_pinjam" maxlength="200" class="form-control" required class="input">
        </div>

        <div class="form-group">
          <label>Tanggal Kembali</label>
          <input type="date" name="tgl_kembali" maxlength="200" class="form-control" required class="input">
        </div>

        <div class="form-group">
          <label>Jaminan</label>
          <select name="jaminan" class="input">
            <option>-----</option>
            <option>KTP/SIM</option>
            <option>Deposit Tunai</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
  </div>
</div> 
</div>

</body>
</html>