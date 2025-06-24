<?php include('header.php'); ?>


<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background text-start" data-aos="fade" style="background-image: url(gambar/sistem/gambar3.jpeg);">


    <div class="container">

      <div class="row justify-content-center">

        <div class="col-lg-6">
          <form action="daftar_act.php" method="post">

            <?php 
            if(isset($_GET['alert'])){
              if($_GET['alert'] == "duplikat"){
                echo "<div class='alert alert-danger text-center'>Maaf email ini sudah digunakan, silahkan gunakan email yang lain.</div>";
              }
            }
            ?>



            <div class="card mb-5 text-dark">
              <div class="card-body">
                <h5 class="text-dark my-3 fw-bold text-center">Daftar</h5>
                
                <div class="form-group mb-3">
                  <label class="fw-semibold">Nama Lengkap<span class="text-danger">*</span></label>
                  <input type="text" class="form-control border-2" required="required" name="nama" placeholder="Masukkan nama lengkap ..">
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group mb-3">
                      <label class="fw-semibold">Email<span class="text-danger">*</span></label>
                      <input type="email" class="form-control border-2" required="required" name="email" placeholder="Masukkan email ..">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mb-3">
                      <label class="fw-semibold">No. HP / Whatsapp<span class="text-danger">*</span></label>
                      <input type="number" class="form-control border-2" required="required" name="hp" placeholder="Masukkan nomor HP/Whatsapp ..">
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label class="fw-semibold">Alamat<span class="text-danger">*</span></label>
                  <input type="text" class="form-control border-2" required="required" name="alamat" placeholder="Masukkan alamat lengkap ..">
                </div>
                <div class="form-group mb-3">
                  <label class="fw-semibold">Password<span class="text-danger">*</span> <small class="text-muted">Password ini digunakan untuk login ke akun anda.</small></label>
                  <input type="password" class="form-control border-2" required="required" name="password" placeholder="Masukkan password ..">
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-2">DAFTAR SEKARANG</button>

                <p class="my-4 text-dark text-center mb-5">Sudah punya akun? <a href="masuk.php" class="text-success">Login Sekarang</a></p>



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