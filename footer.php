
  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.php" class="logo d-flex align-items-center">            
            <img src="gambar/sistem/logo1.png" alt="">
            <span class="sitename">CV. Ladomeng Jaya Bersama</span>
          </a>
          <p>Jasa penyewaan alat berat terbaik dan terpercaya di Kolaka. Alat berat lengkap dengan berbagai model.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Login</h4>
          <ul>
            <li><a href="masuk.php">Login</a></li>
            <li><a href="daftar.php">Daftar</a></li>
            <li><a href="login.php">Login Admin</a></li> 
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Halaman</h4>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="alat.php">Alat Berat</a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li><a href="kontak.php">Kontak</a></li>           
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Hubungi Kami</h4>
          <p>Jl. Poros Desa Pewisoa Jaya</p>
          <p>Tanggetada, 93563</p>
          <p>Kolaka</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+62 858 2531 8964</span></p>
          <p><strong>Email:</strong> <span>ladomengjayabersama@gmail.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">CV. Ladomeng Jaya Bersama</strong> <span>All Rights Reserved</span></p>

    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="depan/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="depan/vendor/php-email-form/validate.js"></script>
  <script src="depan/vendor/aos/aos.js"></script>
  <script src="depan/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="depan/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="depan/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="depan/js/main.js"></script>



<script>
    $(document).ready(function(){

        $(document).on("click",".rating_bintang", function(){
            var ke = $(this).attr("ke");

            var angka = $(this).attr("id");

            $(".rating_"+ke+"_1").removeClass("fa-solid").addClass("fa-regular");
            $(".rating_"+ke+"_2").removeClass("fa-solid").addClass("fa-regular");
            $(".rating_"+ke+"_3").removeClass("fa-solid").addClass("fa-regular");
            $(".rating_"+ke+"_4").removeClass("fa-solid").addClass("fa-regular");
            $(".rating_"+ke+"_5").removeClass("fa-solid").addClass("fa-regular");


            for(a = 1; a <= angka; a++){
                var xxx = ".rating_"+ke+"_"+a;
                $(xxx).toggleClass("fa-solid","addOrRemove");
                $(xxx).toggleClass("fa-regular","addOrRemove");
            }

            $(".form_rating_"+ke).val(angka);

        });



        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        $('.jumlah').on("keyup",function(){
            var nomor = $(this).attr('nomor');

            var jumlah = $(this).val();

            var harga = $("#harga_"+nomor).val();

            var total = jumlah*harga;

            var t = numberWithCommas(total);

            $("#total_"+nomor).text("Rp. "+t+" ,-");
        });
    });


</script>

</body>

</html>