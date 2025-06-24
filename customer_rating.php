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

          <h4><b>RATING ALAT</b></h4>
          <br>
          <small class="text-muted">Isi rating dan review alat</small>

          <br>
          <br>
          <a href="customer_pesanan.php" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> KEMBALI</a>
          <br>
          <br>

          <div class="row">

            <?php 
            $id_invoice = mysqli_escape_string($koneksi, $_GET['id']);
            $id = $_SESSION['customer_id'];
            $invoice = mysqli_query($koneksi,"select * from invoice where invoice_customer='$id' and invoice_id='$id_invoice' order by invoice_id desc");
            while($i = mysqli_fetch_array($invoice)){
              ?>

              <div class="col-lg-12">

                <?php 
                if(isset($_GET['alert'])){
                  if($_GET['alert'] == "sukses"){
                    ?>

                    <div class="alert alert-success"> RATING DAN REVIEW KAMU TELAH TERSIMPAN</div>

                    <?php
                  }
                } 

                function rating($id_invoice,$id_alat){
                  global $koneksi;

                  $rating = mysqli_query($koneksi,"select * from rating where rating_invoice='$id_invoice'");
                  $r = mysqli_num_rows($rating);
                  if($r > 0){
                    $ra = mysqli_fetch_assoc($rating);
                    return $ra['rating'];
                  }else{
                    return "1";
                  }

                }

                function review($id_invoice,$id_alat){
                  global $koneksi;

                  $review = mysqli_query($koneksi,"select * from rating where rating_invoice='$id_invoice'");
                  $r = mysqli_num_rows($review);
                  if($r > 0){
                    $ra = mysqli_fetch_assoc($review);
                    return $ra['rating_review'];
                  }else{
                    return "-";
                  }

                }
                ?>

                <form action="customer_rating_aksi.php" method="post" class="form-rating-ku">

                  <input type="hidden" name="invoice" value="<?php echo $i['invoice_id'] ?>">

                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th colspan="2">ALAT</th>
                          <th>RATING</th>
                          <th>REVIEW PEMBELI</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        $total = 0;
                        $transaksi = mysqli_query($koneksi,"select * from invoice,alat where invoice_alat=alat_id and invoice_id='$id_invoice'");
                        while($d=mysqli_fetch_array($transaksi)){

                          ?>
                          <tr>
                            <td>
                              <center>
                                <?php if($d['alat_foto1'] == ""){ ?>
                                  <img src="gambar/sistem/alat.png" style="width: 50px;height: auto">
                                <?php }else{ ?>
                                  <img src="gambar/alat/<?php echo $d['alat_foto1'] ?>" style="width: 50px;height: auto">
                                <?php } ?>
                              </center>
                            </td>
                            <td>
                              <?php echo $d['alat_nama']; ?>
                              <br>
                              <small><i><?php echo "Rp. ".number_format($d['invoice_total_bayar']).",-"; ?></i></small>
                            </td>
                            <td>

                              <input type="hidden" name="alat[]" value="<?php echo $d['alat_id'] ?>">
                              <input type="hidden" value="<?php echo rating($i['invoice_id'], $d['alat_id']); ?>" name="rating[]" class="form_rating_<?php echo $d['alat_id']; ?>">
                              
                              <i id="1" ke="<?php echo $d['alat_id']; ?>" class="rating_bintang rating_<?php echo $d['alat_id']; ?>_1 fa fa-star fa-solid" style="color: orange"></i>
                              <i id="2" ke="<?php echo $d['alat_id']; ?>" class="rating_bintang rating_<?php echo $d['alat_id']; ?>_2 fa fa-star <?php if(rating($i['invoice_id'], $d['alat_id']) >= 2){ echo "fa-solid"; }else{ echo "fa-regular"; } ?>" style="color: orange"></i>
                              <i id="3" ke="<?php echo $d['alat_id']; ?>" class="rating_bintang rating_<?php echo $d['alat_id']; ?>_3 fa fa-star <?php if(rating($i['invoice_id'], $d['alat_id']) >= 3){ echo "fa-solid"; }else{ echo "fa-regular"; } ?>" style="color: orange"></i>
                              <i id="4" ke="<?php echo $d['alat_id']; ?>" class="rating_bintang rating_<?php echo $d['alat_id']; ?>_4 fa fa-star <?php if(rating($i['invoice_id'], $d['alat_id']) >= 4){ echo "fa-solid"; }else{ echo "fa-regular"; } ?>" style="color: orange"></i>
                              <i id="5" ke="<?php echo $d['alat_id']; ?>" class="rating_bintang rating_<?php echo $d['alat_id']; ?>_5 fa fa-star <?php if(rating($i['invoice_id'], $d['alat_id']) >= 5){ echo "fa-solid"; }else{ echo "fa-regular"; } ?>" style="color: orange"></i>

                              <br>
                              <small><i>Klik jumlah bintang yang diinginkan</i></small>
                            </td>
                            <td>
                              <textarea required="required" name="review[]" class="form-control" placeholder="Isi review .." style="resize: none;height: 100px"><?php echo review($i['invoice_id'], $d['alat_id']) ?></textarea>
                            </td>
                          </tr>
                          <?php 
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>

                  <input type="submit" class="btn btn-primary" value="SIMPAN">
                </form>


              </div>  


              <?php 
            }
            ?>
          </div>
        </div>


      </div>

    </div>

  </section><!-- /Services Section -->

</main>

<?php include('footer.php'); ?>