<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Signup | RENTALJO</title>
   <link rel="stylesheet" href="regis.css?v=2">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
   <div class="wrapper  d-flex">
      <div class="title d-flex justify-content-center align-items-center">
         <img src="img/logo1.png" alt="logo" style="width:350px; height:350px;">
      </div>
      <form id="form_login" role="form" method="post" action="config_regis.php">
         <div class="d-flex">
            <div class="aa">
               <div class="field">
                  <input type="text" name="usrname" id="register_username" required>
                  <label>Username</label>
               </div>
               <div class="field">
                  <input type="password" name="pwd" id="password" required>
                  <label>Password</label>
               </div>
               <div class="field">
                  <input type="text" name="nama_cus" id="nama_customer" required>
                  <label>Nama Lengkap</label>
               </div>
            </div>
            <div class="bb">
               <div class="field" placeholder="Jenis Kelamin">
                  <select id="jk" name="jk">
                     <!-- <option value=""></option> -->
                     <option value="Pria">Pria</option>
                     <option value="Wanita">Wanita</option>
                  </select>
                  <!-- <label>Jenis Kelamin</label> -->
               </div>
               <div class="field">
                  <input type="text" name="alamat" id="alamat" required>
                  <label>Alamat</label>
               </div>
               <div class="field">
                  <input type="number" name="no_hp" id="no_hp" required>
                  <label>Nomor Handphone</label>
               </div>
            </div>
         </div>
         <div class="field">
            <input type="submit">
         </div>
         <div class="signup-link">
            Already a member? <a href="login.php">Login Now</a>
         </div>
      </form>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
   </script>
</body>

</html>