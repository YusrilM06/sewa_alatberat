<?php include('header.php'); ?>
<?php 
if(isset($_SESSION['booking_alat_status'])){
    if($_SESSION['booking_alat'] != $_GET['id']){
        unset($_SESSION['booking_alat_status']);
        unset($_SESSION['booking_alat']);
        unset($_SESSION['booking_dari']);
        unset($_SESSION['booking_sampai']);
    }
}
?>

<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url(depan/img/page-title-bg.jpg);padding: 0px;height: 100px;">

    </div>

    <!-- Services Section -->
    <section id="services" class="services section">

        <div class="container">

            <div class="checkout__form">

               
                <!-- <form action="#"> -->
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-6">

                            <?php 
                            if(isset($_SESSION['booking_alat_status'])){
                                if($_SESSION['booking_alat_status'] == "tersedia"){
                                    echo "<div class='alert mb-4 alert-success text-center'><b>Alat tersedia.</b> silahkan klik \"CHECKOUT\" untuk melanjutkan booking</div>";
                                }elseif($_SESSION['booking_alat_status'] == "tidak-tersedia"){
                                    echo "<div class='alert mb-4 alert-danger text-center'><b>Alat tidak tersedia.</b> Silahkan cari tanggal atau alat lain.</div>";
                                }
                            }
                            ?>


                            <h4 class="mb-5">Cek Ketersediaan Alat</h4>

                            <?php 
                            $no=1;
                            $id_alat = mysqli_escape_string($koneksi,$_GET['id']);
                            $alat = mysqli_query($koneksi,"SELECT * FROM alat,kategori where kategori_id=alat_kategori and alat_id='$id_alat' order by alat_id desc");
                            $k = mysqli_fetch_assoc($alat);
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
                                        Model Alat : <?php echo $k['alat_model']; ?>
                                        <br>
                                        
                                        <br>
                                        Harga : <b><?php echo "Rp. ".number_format($k['alat_harga']).",-"; ?></b> / hari
                                    </small>

                                </div>

                            </div>

                            <br>
                            <hr>


                            <form action="booking_act.php" method="post">
                                <input type="hidden" name="alat" value="<?php echo $id_alat ?>">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Mulai Sewa<span>*</span></p>
                                            <input type="date" name="dari" class="form-control" required="required" value="<?php if(isset($_SESSION['booking_dari'])){ echo $_SESSION['booking_dari']; } ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Sampai Dengan<span>*</span></p>
                                            <input type="date" name="sampai" class="form-control" required="required" value="<?php if(isset($_SESSION['booking_sampai'])){ echo $_SESSION['booking_sampai']; } ?>">
                                        </div>
                                    </div>
                                    
                                </div>
                                <center><button class="btn btn-primary my-4">CEK KETERSEDIAAN ALAT</button></center>
                            </form>


                            <center>
                                <?php 
                                if(isset($_SESSION['booking_alat_status'])){
                                    if($_SESSION['booking_alat_status'] == "tersedia"){
                                        ?>
                                        <a href="checkout.php" class="btn btn-success">CHECK OUT &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        <?php
                                    }

                                }
                                ?>
                            </center>


                        </div>

                    </div>
                    <!-- </form> -->
                </div>

            </div>

        </section><!-- /Services Section -->

    </main>

    <?php include('footer.php'); ?>