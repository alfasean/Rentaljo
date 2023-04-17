<?php 
session_start();

$servername = "localhost"; //nama server database
$username = "root"; //nama pengguna database
$password = ""; //kata sandi database
$dbname = "db_rental_motor"; //nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);
//atur variabel
$err        = "";
$username   = "";

if(isset($_SESSION['session_username'])){
    header("location:test.php");
    exit();
}

if(isset($_POST['tb_customer'])){
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    if($username == '' or $password == ''){
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    }else{
        $sql1 = "select * from tb_customer where username = '$username'";
        $q1   = mysqli_query($conn,$sql1);
        $r1   = mysqli_fetch_array($q1);

        if($r1['username'] == ''){
            $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        }elseif($r1['password'] != md5($password)){
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }       
        
        if(empty($err)){
            $_SESSION['session_username'] = $username; //server
            $_SESSION['session_password'] = md5($password);
            header("location:test.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login | RENTAL JO</title>
    <link rel="stylesheet" href="login.css">
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <link rel="icon" sizes="180x180" href="img/favicon-96x96.png">
</head>

<body>
    <div class="wrapper">
        <div class="title">
            Login Form
        </div>

        <?php if($err){ ?>
        <div id="login-alert" class="alert alert-danger col-sm-12">
            <ul><?php echo $err ?></ul>
        </div>
        <?php } ?>
        <form id="form_login" role="form" action="" method="post">
            <div class="field">
                <input type="text" id="login_email" name="username" value="<?php echo $username ?>">
                <label>Username</label>
            </div>
            <div class="field">
                <input type="password" name="password" id="login_password" required>
                <label>Password</label>
            </div>
            <div class="field">
                <input type="submit" name="tb_customer">
            </div>
            <div class="signup-link">
                Not a member? <a href="regis.php">Signup now</a>
            </div>
        </form>
    </div>
    <!-- <script type="text/javascript" src="script.js"></script> -->
</body>

</html>