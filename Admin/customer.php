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
							<a href="admin.php?p=addcustomer" class="btn btn-success"><i class="material-icons">&#xE147;</i>
								<span>Add New Customer</span></a>
							<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
						</div>
					</div>
				</div>

				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Customer</th>
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>Nomor Handphone</th>
							<th>Username</th>
							<th>Password</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>

						<tr>
							<td>1</td>
							<td><a href="#"></a>Alfa Sean</a></td>
							<td>Pria</td>
							<td>Malalayang</td>
							<td>08123456789</td>
							<td>alfa22</td>
							<td>Password</td>
							<td>
								<a href="./createCustomer.html" class="edit"><i class="material-icons" data-toggle="tooltip"
										title="Edit">&#xE254;</i></a>
								<a href="./delete.html" class="delete"><i class="material-icons" data-toggle="tooltip"
										title="Delete">&#xE872;</i></a>
							</td>
						</tr>

					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>
</body>

</html>