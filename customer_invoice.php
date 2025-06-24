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
        
        <h4><b>INVOICE</b></h4>
        <br>
        <small class="text-muted">Detail pesanan alat</small>
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

              <a href="customer_pesanan.php" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> KEMBALI</a>
              <a href="customer_invoice_cetak.php?id=<?php echo $_GET['id'] ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> KONTRAK</a>

              <br/>
              <br/>

              <h4>INVOICE-00<?php echo $i['invoice_id'] ?></h4>


              <br/>
              <table class="table table-bordered">
                <tr>
                  <th width="20%">Nama</th>
                  <td><?php echo $i['invoice_nama']; ?></td>
                </tr>
                <tr>
                  <th>HP</th>
                  <td><?php echo $i['invoice_hp']; ?></td>
                </tr>
              </table> 
              <br/>

              <?php 
              $no=1;
              $id_alat = $i['invoice_alat'];
              $alat = mysqli_query($koneksi,"SELECT * FROM alat,kategori where kategori_id=alat_kategori and alat_id='$id_alat' order by alat_id desc");
              $k = mysqli_fetch_assoc($alat);
              ?>

              <div class="row">

                <div class="col-lg-2">
                  <?php if($k['alat_foto1'] == ""){ ?>
                    <img src="gambar/sistem/alat.png" style="width: 100%;">
                  <?php }else{ ?>
                    <img src="gambar/alat/<?php echo $k['alat_foto1'] ?>" style="width: 100%;">
                  <?php } ?>
                </div>

                <div class="col-lg-10">

                  <h5><?php echo $k['alat_nama']; ?></h5>


                  <small class="text-muted">
                    <?php echo $k['kategori_nama']; ?>
                    |
                    Merk : <?php echo $k['alat_merk']; ?>
                    |
                    Model : <?php echo $k['alat_model']; ?> m2                   
                    <br>
                    Harga : <b><?php echo "Rp. ".number_format($k['alat_harga']).",-"; ?></b> / mlm

                  </small>

                </div>

              </div>

              <br>

              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th>Harga Alat</th>
                      <td class="text-center"><?php echo "Rp. ".number_format($i['invoice_harga'])." ,-"; ?></td>
                    </tr>
                    <tr>
                      <th>
                        Lama Sewa :
                        <br>
                        <small class="text-muted"><?php echo date('d/m/Y', strtotime($i['invoice_dari'])); ?> - <?php echo date('d/m/Y', strtotime($i['invoice_sampai'])); ?></small>
                      </th>
                      <td class="text-center">
                        <?php 
                        $tgl_dari = strtotime($i['invoice_dari'] );
                        $tgl_sampai = strtotime($i['invoice_sampai'] );
                        $jumlah_hari =  $tgl_sampai - $tgl_dari;
                        $hari = round($jumlah_hari / (60 * 60 * 24));
                        ?>
                        <?php echo $hari ?> Hari
                      </td>
                    </tr>                    
                    <tr>
                      <th>Total Bayar</th>
                      <td class="text-center bg-primary text-white font-weight-bold"><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-"; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>


              <br>
              <h5>STATUS :</h5> 
              <?php 
              if($i['invoice_status'] == 0){
                echo "<span class='label label-warning'>Menunggu Pembayaran</span>";
              }elseif($i['invoice_status'] == 1){
                echo "<span class='label label-default'>Menunggu Konfirmasi</span>";
              }elseif($i['invoice_status'] == 2){
                echo "<span class='label label-danger'>Ditolak</span>";
              }elseif($i['invoice_status'] == 3){
                echo "<span class='label label-primary'>Dikonfirmasi</span>";
              }elseif($i['invoice_status'] == 4){
                echo "<span class='label label-success'>Selesai</span>";
              }
              ?>

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