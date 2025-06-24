<?php 
$id = $_SESSION['customer_id'];
$customer = mysqli_query($koneksi,"select * from customer where customer_id='$id'");
$c = mysqli_fetch_assoc($customer)
?>

<div class="shop__sidebar ">
	<div class="shop__sidebar__accordion bg-primary">
		<div class="card">			
			<div class="card-body bg-primary">
				<h5 class="mb-4 text-white"><b>Hy, <?php echo $c['customer_nama'] ?></b></h5>
				<div class="list-group">
					<a class="w-100 list-group-item" href="customer.php"> <i class="fa fa-home"></i> &nbsp; Dashboard</a>
					<a class="w-100 list-group-item" href="customer_pesanan.php"> <i class="fa fa-list"></i> &nbsp; Transaksi Saya</a>
					<a class="w-100 list-group-item" href="customer_password.php"> <i class="fa fa-unlock"></i> &nbsp; Ganti Password</a>
					<a class="w-100 list-group-item" href="customer_logout.php"> <i class="fa fa-sign-out"></i> &nbsp; Keluar</a>
				</div>
			</div>
		</div>
	</div>
</div>