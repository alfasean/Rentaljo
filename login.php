<?php 
session_start();

require_once "connections/config.php";

$err        = "";
$username   = "";

// if(isset($_SESSION['session_username'])){
//     header("location:index.php");
//     exit();
// }

if(isset($_POST['tb_customer'])){
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    if($username == '' or $password == ''){
        $err .= "<p style='margin: 10px 30px 0px 30px; color: #D21312 !important;'>Silakan masukkan username dan juga password</p>";
    }else{
        $sql1 = "select * from tb_customer where username = '$username'";
        $q1   = mysqli_query($conn,$sql1);
        $r1   = mysqli_fetch_array($q1);

        if(isset($r1['username']) == ''){
            $err .= "<p style='margin: 10px 30px 0px 30px; color: #D21312 !important;'>Username <b>$username</b> tidak tersedia</p>";
        }elseif($r1['password'] != md5($password)){
            $err .= "<p style='margin: 10px 30px 0px 30px; color: #D21312 !important;'>Password yang dimasukkan tidak sesuai</p>";
        }       
        
        if(empty($err)){
            $_SESSION['session_username'] = $username; 
            $_SESSION['session_password'] = md5($password);
            header("location:index.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login | RENTALJO</title>
    <link rel="stylesheet" href="login.css">
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper d-flex">
        <div class="title col-md-5">
            <img src="img/logo1.png" alt="logo" style="width:280px; height:280px;">
        </div>
        <div class="col-md-7">
            <form id="form_login" role="form" action="" method="post">
                <?php if($err){ ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <p><?php echo $err ?></p>
                </div>
                <?php } ?>
                <div class="field">
                    <input type="text" id="login_email" name="username">
                    <label>Username</label>
                </div>
                <div class="field">
                    <input type="password" name="password" id="login_password">
                    <label>Password</label>
                </div>
                <div class="field">
                    <input type="submit" name="tb_customer">
                </div>
                <div class="signup-link">
                    Don't have an account yet? <a href="regis.php">Signup</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>