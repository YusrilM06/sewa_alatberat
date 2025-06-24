<?php include('header.php'); ?>


<main class="main">

  <div class="page-title dark-background" data-aos="fade" style="background-image: url(depan/img/page-title-bg.jpg);padding: 0px;height: 100px;">

  </div>

  <!-- Services Section -->
  <section id="services" class="services section">

    <div class="container">

      <div class="row">
        <div class="col-lg-3">
          <h4 class="mb-3 fw-semibold">Kategori</h4>
          <div class="list-group">
           <?php 
           $data = mysqli_query($koneksi,"SELECT * FROM kategori WHERE kategori_id != 1");
           while($d = mysqli_fetch_array($data)){
            ?>
            <a class="list-group-item" href="alat.php?kategori=<?php echo $d['kategori_id']; ?>"><?php echo $d['kategori_nama']; ?></a>
            <?php 
          }
          ?>
        </div>            

      </div>
      <div class="col-lg-9">




        <?php
        $id_alat = mysqli_real_escape_string($koneksi, $_GET['id']);
        $data = mysqli_query($koneksi,"select * from alat,kategori where kategori_id=alat_kategori and alat_id='$id_alat'");
        while($d=mysqli_fetch_array($data)){

          ?>

          <div class="card border-0">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
                  <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <?php if($d['alat_foto1'] == ""){ ?>
                          <img src="gambar/sistem/alat.png" alt="" class="d-block w-100">
                        <?php }else{ ?>
                          <img src="gambar/alat/<?php echo $d['alat_foto1'] ?>" alt="" class="d-block w-100">
                        <?php } ?>                      
                      </div>
                      <div class="carousel-item">
                        <?php if($d['alat_foto1'] == ""){ ?>
                          <img src="gambar/sistem/alat.png" alt="" class="d-block w-100">
                        <?php }else{ ?>
                          <img src="gambar/alat/<?php echo $d['alat_foto1'] ?>" alt="" class="d-block w-100">
                        <?php } ?>                      
                      </div>
                      <div class="carousel-item">
                        <?php if($d['alat_foto1'] == ""){ ?>
                          <img src="gambar/sistem/alat.png" alt="" class="d-block w-100">
                        <?php }else{ ?>
                          <img src="gambar/alat/<?php echo $d['alat_foto1'] ?>" alt="" class="d-block w-100">
                        <?php } ?>                      
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>      
                </div>


                <div class="col-lg-6 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">


                  <h2 class="p-0"><a href="alat_detail.php?id=<?php echo $d['alat_id']; ?>"><?php echo $d['alat_nama'] ?></a></h2>
                  <small class="text-muted"><?php echo $d['kategori_nama'] ?></small>                

                  <div class="rating">

                    <?php 
                    $rata = bintang($d['alat_id']);
                    ?>

                    <?php if($rata >= 1){ ?>
                      <i class="fa fa-star fa-solid text-warning"></i>
                    <?php }else{ ?>
                      <i class="fa fa-star fa-regular text-warning"></i>
                    <?php } ?>
                    <?php if($rata >= 2){ ?>
                      <i class="fa fa-star fa-solid text-warning"></i>
                    <?php }else{ ?>
                      <i class="fa fa-star fa-regular text-warning"></i>
                    <?php } ?>
                    <?php if($rata >= 3){ ?>
                      <i class="fa fa-star fa-solid text-warning"></i>
                    <?php }else{ ?>
                      <i class="fa fa-star fa-regular text-warning"></i>
                    <?php } ?>
                    <?php if($rata >= 4){ ?>
                      <i class="fa fa-star fa-solid text-warning"></i>
                    <?php }else{ ?>
                      <i class="fa fa-star fa-regular text-warning"></i>
                    <?php } ?>
                    <?php if($rata >= 5){ ?>
                      <i class="fa fa-star fa-solid text-warning"></i>
                    <?php }else{ ?>
                      <i class="fa fa-star fa-regular text-warning"></i>
                    <?php } ?>

                    <small class="text-muted">(<?php echo total_review($d['alat_id']) ?>)</small>

                  </div>

                  <div class="">  
                    <small class="text-muted"><span>Merk  : </span> <?php echo $d['alat_merk'] ?></small><br>
                    <small class="text-muted"><span>Model : </span> <?php echo $d['alat_model'] ?></small><br>
                    <small class="text-muted"><span>Kategori : </span> <?php echo $d['kategori_nama'] ?></small><br>
                  </div>

                  <h4 class="text-center my-4"><?php echo "Rp. ".number_format($d['alat_harga']).",-"; ?> / Hari</h4>


                  <div class="product__details__cart__option">                
                    <a href="booking.php?id=<?php echo $d['alat_id'] ?>" class="btn btn-primary w-100 text-light my-3 fw-semibold">SEWA ALAT</a>
                  </div>

                  

                  <hr>

                  <h5 class="fw-bold">Deskripsi : </h5>

                  <div>
                    <?php echo nl2br($d['alat_deskripsi']) ?>
                  </div>

                </div><!-- End Card Item -->


                
              </div>


              <hr>

              <h5 class="mb-4 fw-bold">Ulasan : </h5>

              <div>
                <ul class="list-group">
                  <?php 
                  $id_alat = $_GET['id'];
                  $rating = mysqli_query($koneksi,"select * from rating, invoice where rating_invoice=invoice_id and invoice_alat='$id_alat'");
                  while($r = mysqli_fetch_array($rating)){
                    ?>
                    <li class="list-group-item">
                      <div class="d-flex justify-content-between">
                        <h6 class="fw-semibold"><?php echo $r['invoice_nama'] ?></h6>

                        <div>

                          <?php if($r['rating'] >= 1){ ?>
                            <i class="fa fa-star fa-solid text-warning"></i>
                          <?php }else{ ?>
                            <i class="fa fa-star fa-regular text-warning"></i>
                          <?php } ?>
                          <?php if($r['rating'] >= 2){ ?>
                            <i class="fa fa-star fa-solid text-warning"></i>
                          <?php }else{ ?>
                            <i class="fa fa-star fa-regular text-warning"></i>
                          <?php } ?>
                          <?php if($r['rating'] >= 3){ ?>
                            <i class="fa fa-star fa-solid text-warning"></i>
                          <?php }else{ ?>
                            <i class="fa fa-star fa-regular text-warning"></i>
                          <?php } ?>
                          <?php if($r['rating'] >= 4){ ?>
                            <i class="fa fa-star fa-solid text-warning"></i>
                          <?php }else{ ?>
                            <i class="fa fa-star fa-regular text-warning"></i>
                          <?php } ?>
                          <?php if($r['rating'] >= 5){ ?>
                            <i class="fa fa-star fa-solid text-warning"></i>
                          <?php }else{ ?>
                            <i class="fa fa-star fa-regular text-warning"></i>
                          <?php } ?>
                        </div>
                      </div>
                      <?php echo nl2br($r['rating_review']) ?>
                    </li>
                    <?php
                  }
                  ?>
                </ul>
              </div>


            </div>
          </div>


          


          <?php 
        }
        ?>





      </div>
    </div>

  </div>

</section><!-- /Services Section -->

</main>

<?php include('footer.php'); ?>