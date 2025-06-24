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

          <h4><b>TRANSAKSI SAYA</b></h4>
          <br>

          <div>

            <?php 
            if(isset($_GET['alert'])){
              if($_GET['alert'] == "gagal"){
                echo "<div class='alert alert-danger'>Bukti pembayaran gagal diupload!</div>";
              }elseif($_GET['alert'] == "sukses"){
                echo "<div class='alert alert-success'>Pesanan berhasil dibuat, silahkan melakukan pembayaran!</div>";
              }elseif($_GET['alert'] == "upload"){
                echo "<div class='alert alert-success'>Bukti pembayaran berhasil tersimpan, silahkan menunggu konfirmasi dari admin!</div>";
              }
            }
            ?>

            <small class="text-muted">
              Semua data alat yang anda booking / invoice.
            </small>
          
            <br/>


            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>No.Invoice</th>
                    <th>Tgl.Dikembalikan</th>
                    <th>Keterlambatan</th>
                    <th>Denda</th>
                    <th>Status</th>
                    <th class="text-center">Status</th>
                    <th class="text-center" style="width: 30%;">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  $id = $_SESSION['customer_id'];
                  $invoice = mysqli_query($koneksi,"select * from invoice where invoice_customer='$id' order by invoice_id desc");
                  while($i = mysqli_fetch_array($invoice)){
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td>
                        <small class="text-muted"><?php echo date('d/m/Y', strtotime($i['invoice_tanggal'])) ?></small><br>
                        INVOICE-00<?php echo $i['invoice_id'] ?><br>                       
                        <?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?>
                      </td>
                      <td class="text-center">
                        <?php 
                        if($i['invoice_tanggal_dikembalikan'] != NULL){
                          echo date('d-m-Y', strtotime($i['invoice_tanggal_dikembalikan']));
                        }else{
                          echo "<i class='small text-muted'>Belum Dikembalikan</i>";
                        }
                        ?>
                      </td>
                       <td><?php echo $i['invoice_keterlambatan'] ?> Hari</td>
                       <td><?php echo "Rp. ".number_format($i['invoice_denda'])." ,-" ?></td>                                        
                       

                      <td class="text-center">
                        <?php 
                        if($i['invoice_status'] == 0){
                          echo "<span class='badge bg-warning text-dark'>Menunggu Pembayaran</span>";
                        }elseif($i['invoice_status'] == 1){
                          echo "<span class='badge bg-info'>Menunggu Konfirmasi</span>";
                        }elseif($i['invoice_status'] == 2){
                          echo "<span class='badge bg-danger'>Ditolak</span>";
                        }elseif($i['invoice_status'] == 3){
                          echo "<span class='badge bg-primary'>Dikonfirmasi</span>";
                        }elseif($i['invoice_status'] == 4){
                          echo "<span class='badge bg-success'>Selesai</span>";
                        }
                        ?>
                      </td>
                      <td class="text-center">
                        <?php 
                        if($i['invoice_status_pengembalian'] == 0){
                          echo "<span class='badge bg-danger'>Dipinjam</span>";
                        }elseif($i['invoice_status_pengembalian'] == 1){
                          echo "<span class='badge bg-success'>Dikembalikan</span>";                        
                        }
                        ?>
                      </td>
                      <td class="text-center">
                        <?php 
                        if($i['invoice_status'] == 0){
                          ?>
                          <a class='btn btn-sm btn-primary' href="customer_pembayaran.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-money"></i> Konfirmasi Pembayaran</a>
                          <?php
                        }elseif($i['invoice_status'] == 1){
                          ?>
                          <a class='btn btn-sm btn-primary' href="customer_pembayaran.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-money"></i> Konfirmasi Pembayaran</a>
                          <?php
                        }elseif($i['invoice_status'] == 2){
                          ?>
                          <a class='btn btn-sm btn-primary' href="customer_pembayaran.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-money"></i> Konfirmasi Pembayaran</a>
                          <?php
                        }
                        ?>

                        <?php 
                        if($i['invoice_status'] == 4){
                          ?>
                          <a class='btn btn-sm btn-danger' href="customer_rating.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-star"></i> Beri Rating & Review</a>
                          <?php
                        }
                        ?>
                        <a class='btn btn-sm btn-success' href="customer_invoice.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-search"></i></a>
                        <a class='btn btn-sm btn-success' target="_blank" href="customer_invoice_cetak.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-file"></i> Kontrak</a>

                        <?php 
                        if($i['invoice_keterlambatan'] != 0 && $i['invoice_status_pengembalian'] == 0){
                         ?>
                         <a class='btn btn-sm btn-primary' href="customer_pembayaran_denda.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-money"></i> Konfirmasi Pembayaran Denda</a>
                         <?php
                       }
                       ?>
                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>


            <small class="text-muted"></small>
          </div>

        </div>

      </div>

    </div>

  </section><!-- /Services Section -->

</main>

<?php include('footer.php'); ?>