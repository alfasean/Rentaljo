<?php
    $servername = "localhost";
  $username = "root"; 
  $password = ""; 
  $dbname = "db_rental_motor";
  $conn = new mysqli($servername, $username, $password, $dbname);

    if (!$conn) {
        die('Koneksi ke database gagal: ' . mysqli_connect_error());
    }

    $query = "SELECT COUNT(*) as total_user FROM tb_customer";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_user = $data['total_user'];

    $query = "SELECT COUNT(*) as total_karyawan FROM tb_karyawan";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_karyawan = $data['total_karyawan'];

    $query = "SELECT COUNT(*) as total_motor FROM tb_motor";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_motor = $data['total_motor'];


    mysqli_close($conn);
    ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>10</h3>
                  <p>Rental Totals</p>
                </div>
                <div class="icon">
                  <i class="fa fa-check"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $total_motor; ?></h3>
                  <p>Number of Motors</p>
                </div>
                <div class="icon">
                  <i class="fa fa-motorcycle"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $total_user; ?></h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $total_karyawan; ?></h3>
                  <p>Admin Totals</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-tie"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>
        <!-- /.content-wrapper -->
    </div>