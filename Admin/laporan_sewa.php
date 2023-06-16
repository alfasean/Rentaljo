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

				$query = "SELECT * FROM tb_sewa";
				$result = mysqli_query($conn, $query);

				if (mysqli_num_rows($result) > 0) {
		
					echo '<table class="table table-striped table-hover">
					<thead>
					<tr>
						<th>No</th>
						<th>Customer Name</th>
						<th>Motorcycle Name</th>
						<th>Borrow Date</th>
						<th>Return Date</th>
						<th>Guarantee</th>
					</tr>
				</thead>';

        while ($row = mysqli_fetch_assoc($result)) {
			$no++;
            echo '<tr>
                    <td>' . $no . '</td>
                    <td>as</td>
                    <td>sa</td>
                    <td>' . $row['tgl_pinjam'] . '</td>
                    <td>' . $row['tgl_kembali'] . '</td>
                    <td>' . $row['jaminan'] . '</td>
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
