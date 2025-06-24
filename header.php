<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Sewa Alat Berat</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="gambar/sistem/logo1.png" rel="icon">
  <link href="gambar/sistem/logo1.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="depan/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="depan/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="depan/vendor/aos/aos.css" rel="stylesheet">
  <link href="depan/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="depan/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="depan/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="depan/css/main.css" rel="stylesheet">

  

<?php
    include 'koneksi.php';

    session_start();

    $file = basename($_SERVER['PHP_SELF']);

    if(!isset($_SESSION['customer_status'])){

        // halaman yg dilindungi jika customer belum login
        $lindungi = array('customer.php','customer_logout.php','customer_invoice.php','customer_invoice_cetak.php','customer_password.php','customer_pembayaran.php','customer_pesanan.php','customer_rating.php');

        // periksa halaman, jika belum login ke halaman di atas, maka alihkan halaman
        if(in_array($file, $lindungi)){
            header("location:index.php");
        }

        if($file == "checkout.php"){
            header("location:masuk.php?alert=login-dulu");
        }

    }else{

        // halaman yg tidak boleh diakses jika customer sudah login
        $lindungi = array('masuk.php','daftar.php');

        // periksa halaman, jika sudah dan mengakses halaman di atas, maka alihkan halaman
        if(in_array($file, $lindungi)){
            header("location:customer.php");
        }

    }



    if($file == "checkout.php"){


        if(!isset($_SESSION['booking_alat_status'])){

            header("location:alat.php");

        }
    }




    function bintang($id_alat){

        global $koneksi;

        $jumlah = mysqli_query($koneksi,"select * from rating, invoice where rating_invoice=invoice_id and invoice_alat='$id_alat'");

        if(mysqli_num_rows($jumlah) > 0){

            $rating = mysqli_query($koneksi,"select sum(rating) as total_rating from rating, invoice where rating_invoice=invoice_id  and invoice_alat='$id_alat'");
            $r = mysqli_fetch_assoc($rating);

            $pemberi = mysqli_query($koneksi,"select count(rating) as total_pemberi from rating, invoice where rating_invoice=invoice_id  and invoice_alat='$id_alat'");
            $p = mysqli_fetch_assoc($pemberi);

            $rr = $r['total_rating'];
            $pp = $p['total_pemberi'];

            $rata = $rr / $pp;

            return $rata;

        }else{
            return "0";
        }
        
    }

    function total_review($id_alat){

        global $koneksi;

        $pemberi = mysqli_query($koneksi,"select count(rating) as total_pemberi from rating, invoice where rating_invoice=invoice_id and invoice_alat='$id_alat'");
        $p = mysqli_fetch_assoc($pemberi);

        $pp = $p['total_pemberi'];

        return $pp;

    }
?>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="gambar/sistem/logo1.png" alt="">
        <h1 class="sitename">CV. Ladomeng Jaya Bersama</h1>
      </a>

      <nav id="navmenu" class="navmenu">

     

        <ul>
          <li><a href="index.php" class="active">Home<br></a></li>
          <li><a href="alat.php" class="active">Alat Berat</a></li>
          
          <li><a href="tentang.php" class="active">Tentang</a></li>
          <li><a href="kontak.php" class="active">Kontak</a></li>
          
          <?php 
            if(isset($_SESSION['customer_status'])){
              $id_customer = $_SESSION['customer_id'];
              $customer = mysqli_query($koneksi,"select * from customer where customer_id='$id_customer'");
              $c = mysqli_fetch_assoc($customer);
            ?>
            <li class="dropdown text-start">
                <a href="#"><span><?php echo $c['customer_nama']; ?></span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul style="left: auto !important;right: 0 !important;">
                    <li class="justify-items-center"><a class="text-left" href="customer.php"> <i class="fa fa-user"></i> &nbsp; Akun Saya</a></li>
                    <li class="justify-items-center"><a class="text-left" href="customer_pesanan.php"> <i class="fa fa-list"></i> &nbsp; Pesanan Saya</a></li>
                    <li class="justify-items-center"><a class="text-left" href="customer_password.php"> <i class="fa fa-lock"></i> &nbsp; Ganti  Password</a></li>
                    <li class="justify-items-center"><a class="text-left" href="customer_logout.php"> <i class="fa fa-sign-out"></i> &nbsp; Keluar </a></li>
                </ul>
            </li>            
            <?php
            }else{
            ?>
            <li><a href="masuk.php" class="active">Login</a></li>
            <li><a href="daftar.php" class="active">Daftar</a></li>
            <?php
            }
          ?>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>