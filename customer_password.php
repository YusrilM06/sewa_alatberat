<?php include('header.php'); ?>


<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url(depan/img/page-title-bg.jpg);padding: 0px;height: 100px;">

  </div>

  <!-- Services Section -->
  <section id="services" class="services section">

    <div class="container">

      <div class="row">

        <div id="aside" class="col-md-3">
          <?php 
          include 'customer_sidebar.php'; 
          ?>
        </div>


        
        <div id="main" class="col-md-9">

          <h4><b>GANTI PASSWORD</b></h4>
          <br>

          <div>
            <?php 
            if(isset($_GET['alert'])){
              if($_GET['alert'] == "sukses"){
                echo "<div class='alert alert-success'>Password anda berhasil diganti!</div>";
              }
            }
            ?>

            <form action="customer_password_act.php" method="post">
              <div class="checkout__input">
                <label for="">Masukkan Password Baru</label>
                <input type="password" class="form-control" required="required" name="password" placeholder="Masukkan password .." min="5">
              </div>

              <br>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ganti Password">
              </div>
            </form>

          </div>

        </div>


      </div>

    </div>

  </section><!-- /Services Section -->

</main>

<?php include('footer.php'); ?>