<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sewa Alat Berat</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="icon" href="gambar/sistem/logo1.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class=" bg-black">
  <style type="text/css">
    body {
      position: relative;
      height: 100vh;
      margin: 0;
    }

    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('gambar/sistem/gambar4.jpeg') center/cover no-repeat;
      opacity: 0.5; /* Ubah opacity sesuai kebutuhan */
      z-index: -1;
    }
  </style>
  <div class="container">
    <div class="login-box">

      <center>


        <br>
        <br/>

        <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "gagal"){
            echo "<div class='alert alert-danger'>Login gagal! username dan password salah!</div>";
          }else if($_GET['alert'] == "logout"){
            echo "<div class='alert alert-success'>Anda telah berhasil logout</div>";
          }else if($_GET['alert'] == "belum_login"){
            echo "<div class='alert alert-warning'>Anda harus login untuk mengakses halaman admin/resepsionis.</div>";
          }
        }
        ?>

      </center>

      <div class="login-box-body">

       <center>
         <a href="index.php"><img width="100px" src="gambar/sistem/logo1.png" alt=""></a>
       </center>

       <br>

       <p class="login-box-msg text-bold">LOGIN ADMIN / PIMPINAN</p>

       <form action="periksa_login.php" method="POST">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <br>

        <button type="submit" class="btn btn-success btn-block btn-flat btn-block">LOGIN</button>       



      </form>

      <br>
      <center>
        <a href="index.php">KEMBALI</a>
      </center>

      <br>
    </div>
  </div>
</div>


<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
