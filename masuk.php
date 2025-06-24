<?php include('header.php'); ?>


<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background text-start" data-aos="fade" style="background-image: url(gambar/sistem/gambar3.jpeg);">


    <div class="container">

      <div class="row justify-content-center">

        <div class="col-lg-6">
          <form action="masuk_act.php" method="post">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-6">

                <?php 
                if(isset($_GET['alert'])){
                  if($_GET['alert'] == "terdaftar"){
                    echo "<div class='alert alert-success text-center'>Selamat akun anda telah disimpan, silahkan login.</div>";
                  }elseif($_GET['alert'] == "gagal"){
                    echo "<div class='alert alert-danger text-center'>Email dan Password tidak sesuai, coba lagi.</div>";
                  }elseif($_GET['alert'] == "login-dulu"){
                    echo "<div class='alert alert-warning text-center'>Silahkan login terlebih dulu untuk booking.</div>";
                  }
                }
                ?>



                <div class="card mb-5 text-dark">
                  <div class="card-body">
                    <h5 class="text-dark my-3 fw-bold text-center">Login</h5>

                    <div class="form-group mb-3">
                      <label class="text-dark fw-semibold">Email<span>*</span></label>
                      <input type="email" class="form-control border-2" required="required" name="email" placeholder="Masukkan email ..">

                    </div>
                    <div class="form-group mb-3">
                      <label class="text-dark fw-semibold">Password<span>*</span></label>
                      <input type="password" class="form-control border-2" required="required" name="password" placeholder="Masukkan password ..">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">LOGIN SEKARANG</button>

                    <p class="my-4 text-dark text-center">Belum punya akun? <a href="daftar.php" class="text-success">Daftar Sekarang</a></p>
                  </div>
                </div>

              </div>

            </div>
          </form>
        </div>
      </div>
    </div>



  </div>

  <!-- Services Section -->


</main>

<?php include('footer.php'); ?>