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
        
        <h4><b>DASHBOARD</b></h4>
        <br>

        <div>

          <table class="table table-bordered">
            <tbody>
              <?php 
              $id = $_SESSION['customer_id'];
              $customer = mysqli_query($koneksi,"select * from customer where customer_id='$id'");
              while($i = mysqli_fetch_array($customer)){
                ?>
                <tr>
                  <th width="20%">Nama</th> 
                  <td><?php echo $i['customer_nama'] ?></td>
                </tr>
                <tr>
                  <th width="20%">Email</th>  
                  <td><?php echo $i['customer_email'] ?></td>
                </tr>
                <tr>
                  <th>HP</th> 
                  <td><?php echo $i['customer_hp'] ?></td>
                </tr>
                <tr>
                  <th>Alamat</th> 
                  <td><?php echo $i['customer_alamat'] ?></td>
                </tr>
                <?php 
              }
              ?>
            </tbody>
          </table>

        </div>

      </div>
    </div>

    </div>

  </section><!-- /Services Section -->

</main>

<?php include('footer.php'); ?>