<?php include('header.php'); ?>

<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url(depan/img/page-title-bg.jpg);padding: 0px;height: 100px;">

    </div>

    <!-- Services Section -->
    <section id="services" class="services section">

        <div class="container">

            <?php 
            if(isset($_GET['alert'])){
                if($_GET['alert'] == "login"){
                    echo "<div class='alert alert-success'>Login berhasil, silahkan lanjutkan pemesanan</div><br>";
                }
            }
            ?>

            <div class="checkout__form">
                <form action="checkout_act.php" method="post">
                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-md-6">

                            <div class="card bg-warning-subtle">
                                
                                <div class="card-body">

                                   <div class="checkout__order">
                                    <h4 class="text-center">Keterangan</h4>

                                    <h5 class="mt-5 mb-3">Alat Yang Disewa</h5>

                                    <?php 
                                    $no=1;
                                    $id_alat = $_SESSION['booking_alat'];
                                    $alat = mysqli_query($koneksi,"SELECT * FROM alat,kategori where kategori_id=alat_kategori and alat_id='$id_alat' order by alat_id desc");
                                    $k = mysqli_fetch_assoc($alat)
                                    ?>

                                    <div class="row">

                                        <div class="col-lg-2">
                                            <?php if($k['alat_foto1'] == ""){ ?>
                                                <img src="gambar/sistem/alat.png" class="w-100">
                                            <?php }else{ ?>
                                                <img src="gambar/alat/<?php echo $k['alat_foto1'] ?>" class="w-100">
                                            <?php } ?>
                                        </div>

                                        <div class="col-lg-10">

                                            <h5><?php echo $k['alat_nama']; ?></h5>

                                            <small class="text-muted">
                                                <?php echo $k['kategori_nama']; ?>
                                                |
                                                Merk : <?php echo $k['alat_merk']; ?>
                                                |
                                                Model : <?php echo $k['alat_model']; ?>
                                                <br>
                                                Harga : <b><?php echo "Rp. ".number_format($k['alat_harga']).",-"; ?></b> / mlm

                                            </small>

                                        </div>

                                    </div>

                                    <hr>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Keterangan</th>
                                                <th>Total</th>
                                            </tr>
                                            <tr>
                                                <th>Mulai Sewa</th>
                                                <td><?php echo date('d-m-Y', strtotime($_SESSION['booking_dari'] ))?></td>
                                            </tr>
                                            <tr>
                                                <th>Sampai Dengan</th>
                                                <td><?php echo date('d-m-Y', strtotime($_SESSION['booking_sampai'] ))?></td>
                                            </tr>
                                            <tr>
                                                <td>Harga Sewa</td>
                                                <td><?php echo "Rp. ".number_format($k['alat_harga']).",-"; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Lama Sewa</td>
                                                <td>                                                
                                                    <?php 
                                                    $tgl_dari = strtotime($_SESSION['booking_dari'] );
                                                    $tgl_sampai = strtotime($_SESSION['booking_sampai'] );
                                                    $jumlah_hari =  $tgl_sampai - $tgl_dari;
                                                    $hari = round($jumlah_hari / (60 * 60 * 24));
                                                    echo $hari . " hari";
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-success text-white fw-bold">Total Bayar</td>
                                                <td class="bg-success text-white fw-bold"><?php echo "Rp. ".number_format($k['alat_harga'] * $hari).",-"; ?></td>
                                            </tr>
                                        </table>
                                    </div>


                                    <input type="hidden" name="dari" value="<?php echo $_SESSION['booking_dari']; ?>">
                                    <input type="hidden" name="sampai" value="<?php echo $_SESSION['booking_sampai']; ?>">                                    
                                    <input type="hidden" name="harga_per_hari" value="<?php echo $k['alat_harga']; ?>">
                                    <input type="hidden" name="harga" id="total_harga" value="<?php echo $k['alat_harga'] * $hari; ?>">
                                    <input type="hidden" name="customer" value="<?php echo $_SESSION['customer_id']; ?>">

                                    <center>
                                        <a href="booking.php?id=<?php echo $k['alat_id'] ?>" class="btn btn-danger text-white px-5 text-center">BATAL</a>
                                        <button type="submit" class="btn btn-primary px-5 text-center">SELESAI</button>
                                    </center>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>





    </div>

</section><!-- /Services Section -->

</main>

<?php include('footer.php'); ?>