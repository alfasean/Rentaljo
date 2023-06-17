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
							<div class="col-sm-6">
								<a href="admin.php?p=addmotor" class="btn btn-success"><i
										class="material-icons">&#xE147;</i>
									<span>Add New Motor</span></a>
								<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
							</div>
						</div>
					</div>

				<?php
				$servername = "localhost";
				$username = "root"; 
				$password = ""; 
				$dbname = "db_rental_motor";
				
				$conn = new mysqli($servername, $username, $password, $dbname);

				if (!$conn) {
					die("Koneksi database gagal: " . mysqli_connect_error());
				}

				$no = 0;

				$query = "SELECT * FROM tb_motor";
				$result = mysqli_query($conn, $query);

				if (mysqli_num_rows($result) > 0) {
		
					echo '<table class="table table-striped table-hover">
					<thead>
					<tr>
						<th>No</th>
						<th>Merk</th>
						<th>Number of Vehicles</th>
						<th>Motor Type</th>
						<th>Price</th>
						<th>Status</th>
						<th>Image</th>
						<th>Actions</th>
					</tr>
				</thead>';

        while ($row = mysqli_fetch_assoc($result)) {
			$no++;
            echo '<tr>
                    <td>' . $no . '</td>
                    <td>' . $row['merk'] . '</td>
                    <td>' . $row['no_plat'] . '</td>
                    <td>' . $row['jenis_motor'] . '</td>
                    <td>' . $row['harga'] . '</td>
					<td><span class="label label-' . ($row['status'] ? "success" : "danger") . '" style="background-color: ' . ($row['status'] ? "#54B435" : "#FF0000") . ';">' . ($row['status'] ? "Tersedia" : "Tidak Tersedia") . '</span></td>
					<td><img src="uploads/' . $row['gambar'] . '" width="100" height="100" alt="Motor Image"></td>
					<td>
									<a href="admin.php?p=updatemotor&menu_upd='.$row['id_motor'].'"" class="edit"><i class="material-icons" data-toggle="tooltip"
											title="Edit">&#xE254;</i></a>
									<a href="deleteMotor.php?menu_del='.$row['id_motor'].'" class="delete"><i class="material-icons"
											data-toggle="tooltip" title="Delete">&#xE872;</i></a>
								</td>
                </tr>';
        }

        echo '</table>';
    } else {
        echo 'Tidak ada data motor.';
    }

    mysqli_close($conn);
	?>

				</div>
			</div>
		</div>
	</div>
</body>

</html>
