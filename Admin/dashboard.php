<style>
  #myChart {
    width: 400px !important;
    height: 400px !important;
  }
  #myChart2 {
    width: 400px !important;
    height: 400px !important;
  }
</style>

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

    $query = "SELECT COUNT(*) as total_rental FROM tb_sewa";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_rental = $data['total_rental'];

    $query = "SELECT COUNT(*) as total_karyawan FROM tb_karyawan";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_karyawan = $data['total_karyawan'];

    $query = "SELECT COUNT(*) as total_motor FROM tb_motor";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_motor = $data['total_motor'];

    $query = "SELECT COUNT(*) as total_male FROM tb_customer WHERE jenis_kelamin = 'Pria'";
    $result = mysqli_query($conn, $query);
    $data_male = mysqli_fetch_assoc($result);
    $total_male = $data_male['total_male'];

    $query = "SELECT COUNT(*) as total_female FROM tb_customer WHERE jenis_kelamin = 'Wanita'";
    $result = mysqli_query($conn, $query);
    $data_female = mysqli_fetch_assoc($result);
    $total_female = $data_female['total_female'];
    
    $query = "SELECT COUNT(*) as total_sewa_may FROM tb_sewa WHERE MONTH(tgl_pinjam) = 5";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_sewa_may = $data['total_sewa_may'];

    $query = "SELECT COUNT(*) as total_sewa_june FROM tb_sewa WHERE MONTH(tgl_pinjam) = 6";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $total_sewa_june = $data['total_sewa_june'];


  

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
              <h3><?php echo $total_rental; ?></h3>
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
      <!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="row">
      <div class="col-lg-6">
        <!-- Chart 1 -->
        <div class="card">
          <div class="card-body">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <!-- Chart 2 -->
        <div class="card">
          <div class="card-body">
            <canvas id="myChart2"></canvas>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart').getContext('2d');

  const data = {
    labels: [
      'Pria',
      'Wanita'
    ],
    datasets: [{
      label: 'Jenis Kelamin',
      data: [<?php echo $total_male; ?>, <?php echo $total_female; ?>],
      backgroundColor: [
        'rgb(54, 162, 235)',
        'rgb(255, 99, 132)'
      ],
      hoverOffset: 4
    }]
  };

  const myChart = new Chart(ctx, {
    type: 'pie', 
    data: data 
  });


const ctx2 = document.getElementById('myChart2').getContext('2d');


const labels = ['May', 'June'];

const data2 = {
  labels: labels,
  datasets: [{
    label: 'Total Sewa',
    data: [<?php echo $total_sewa_may; ?>, <?php echo $total_sewa_june; ?>],
    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
    borderWidth: 1
  }]
};

const myChart2 = new Chart(ctx2, {
  type: 'bar',
  data: data2,
  options: {
    responsive: true,
    scales: {
      x: {
        display: true,
        title: {
          display: true,
          text: 'Bulan'
        }
      },
      y: {
        display: true,
        title: {
          display: false,
          text: 'Total Sewa'
        }
      }
    }
  }
});


</script>
