<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rental_motor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $merk = $_POST["merk"];
    $no_plat = $_POST["no_plat"];
    $jenis_motor = $_POST["jenis_motor"];
    $harga = $_POST["harga"];
    $status = $_POST["status"];

    $gambar = basename($_FILES['gambar']['name']);
    $gambar_path = "uploads/" . $gambar;

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar_path)) {
        echo "Gambar berhasil diunggah dan disimpan di folder lokal.";
    } else {
        echo "Gagal mengunggah gambar.";
    }

    $sql = "INSERT INTO tb_motor (merk, no_plat, jenis_motor, status, harga, gambar)
    VALUES ('$merk', '$no_plat', '$jenis_motor', '$status', '$harga', '$gambar')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        echo '<script>window.location.href = "admin.php?p=motor";</script>';
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

      <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label>Merk</label>
          <input type="text" name="merk" maxlength="200" class="form-control" required id="id_name">
        </div>

        <div class="form-group">
          <label>Number of Vehicles</label>
          <input type="text" name="no_plat" maxlength="200" class="form-control" required id="id_email">
        </div>

        <div class="form-group">
          <label>Motor Type</label>
          <select name="jenis_motor" id="id_email">
            <option>-----</option>
            <option>Matic</option>
            <option>Manual</option>
          </select>
        </div>

        <div class="form-group">
          <label>Price</label>
          <input type="number" name="harga" maxlength="200" class="form-control" required id="id_email">
        </div>

        <div class="form-group">
          <label>Status</label>
          <input type="text" name="status" maxlength="200" class="form-control" required id="id_email">
        </div>

        <div class="form-group">
          <label for="formFile" class="form-label">Image</label>
          <div class="custom-file">
            <input type="file" name="gambar" class="form-control" id="id_avatar">
          </div>
        </div>
                
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    
    </div>
  </div>
</div> 
</div>

</body>
</html>
