<?php include('header.php'); ?>


<main class="main">

  <!-- Page Title -->
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


        <div class="row">

          <div class="col-lg-12">

            <div class="shop__product__option">
              <div class="row justify-content-between">
                <div class="col-lg-8 col-md-6 col-sm-6">
                  <div class="shop__product__option__left">
                    <?php 
                    if(isset($_GET['cari'])){
                      ?>
                      Hasil Pencarian : <b><?php echo htmlspecialchars($_GET['cari']); ?></b>
                      <?php
                    }
                    ?>

                    <?php 
                    if(isset($_GET['kategori'])){
   
                      $id_kategori = mysqli_real_escape_string($koneksi, $_GET['kategori']);
                      $kategori = mysqli_query($koneksi,"select * from kategori where kategori_id='$id_kategori'");
                      $k = mysqli_fetch_assoc($kategori);                      
                      ?>
                      <h4>Kategori : <?php echo $k['kategori_nama']; ?></h4>
                      <?php
                    }
                    ?>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="justify-items-end mb-3">

                    <form action="" method="get">
                      <?php 
                      if(isset($_GET['cari'])){
                        $c = "&cari=".$_GET['cari'];
                        ?>
                        <input type="hidden" name="cari" value="<?php echo $_GET['cari']; ?>">
                        <?php
                      }
                      ?>

                      <?php 
                      if(isset($_GET['kategori'])){
                        $c = "&kategori=".$_GET['kategori'];
                        ?>
                        <input type="hidden" name="kategori" value="<?php echo $_GET['kategori']; ?>">
                        <?php
                      }
                      ?>

                      <select name="urutan" class="form-control" onchange="this.form.submit()">
                        <option value="">- Urutkan -</option>
                        <option <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "termurah"){echo "selected='selected'";} ?> value="termurah">Termurah</option>
                        <option <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "termahal"){echo "selected='selected'";} ?> value="termahal">Termahal</option>
                      </select>
                    </form>

                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="row">

          <?php
          $halaman = 9;
          $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
          $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
            // $result = mysqli_query($koneksi, "SELECT * FROM alat");
      
          if(isset($_GET['urutan'])){
            $urutan = $_GET['urutan'];
            if($urutan == "termahal"){
              $qu = " order by alat_harga desc";
            }else{
              $qu = " order by alat_harga asc";
            }
          }else{
            $qu = " order by alat_id desc";
          }

          if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $qc = " and alat_nama like '%$cari%'";
          }else{
            $qc = "";
          }

          if(isset($_GET['kategori'])){
            $kategori = $_GET['kategori'];
            $qk = " and alat_kategori='$kategori'";
          }else{
            $qk = "";
          }
 
          $result = mysqli_query($koneksi,"select * from alat,kategori where kategori_id=alat_kategori $qc $qk $qu");          

          $total = mysqli_num_rows($result);
          $pages = ceil($total/$halaman);  

          $data = mysqli_query($koneksi,"select * from alat,kategori where kategori_id=alat_kategori $qc $qk $qu LIMIT $mulai, $halaman");          
          $no =$mulai+1;

          while($d = mysqli_fetch_array($data)){
            ?>


            <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
              <div class="card border-2 shadow-sm">
                <div class="card-img">
                  <a href="alat_detail.php?id=<?php echo $d['alat_id']; ?>">
                   <?php if($d['alat_foto1'] == ""){ ?>
                    <img src="gambar/sistem/alat.png" alt="" class="w-100">
                  <?php }else{ ?>
                    <img src="gambar/alat/<?php echo $d['alat_foto1'] ?>" alt="">
                  <?php } ?>
                </a>
              </div>

              <div class="card-body">

                <h3 class="p-0"><a href="alat_detail.php?id=<?php echo $d['alat_id']; ?>"><?php echo $d['alat_nama'] ?></a></h3>
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

                <h6 class="text-center my-3"><?php echo "Rp. ".number_format($d['alat_harga']).",-"; ?> <small class="fs-6 text-muted">/Hari</small></h6>

                <a href="alat_detail.php?id=<?php echo $d['alat_id']; ?>" class="btn btn-primary w-100 text-light"><i class="fa fa-eye"></i> Lihat Alat</a>
                
              </div>

            </div>
          </div><!-- End Card Item -->


          <?php 
        }
        ?>

      </div>

      <?php 
      if($total == 0){
        ?>
        <center><h4>Belum ada alat.</h4></center>
        <?php
      }
      ?>


      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination my-3">
            
            <?php for ($i=1; $i<=$pages ; $i++){ ?>
              <?php if($page==$i){ ?>
                <li class="page-item"><a class="page-link active"><?php echo $i; ?></a></li>
              <?php }else{ ?>

                <?php 
                if(isset($_GET['cari'])){
                  $cari = $_GET['cari'];
                  $c = "&cari=".$cari;
                }else{
                  $c = "";
                }

                if(isset($_GET['kategori'])){
                  $kategori = $_GET['kategori'];
                  $k = "&kategori=".$kategori;
                }else{
                  $k = "";
                }
                if(isset($_GET['urutan'])){
                  $urutan = $_GET['urutan'];
                  ?>
                  <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?><?php echo $k ?>&urutan=<?php echo $urutan ?><?php echo $c ?>"><?php echo $i; ?></a></li>
                  <?php 
                }else{
                  ?>
                  <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?><?php echo $k ?><?php echo $c ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                ?>

              <?php } ?>
            <?php } ?>

          </ul>
        </div>
      </div>


    </div>
  </div>

</div>

</section><!-- /Services Section -->

</main>

<?php include('footer.php'); ?>