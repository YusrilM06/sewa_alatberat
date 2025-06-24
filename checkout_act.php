<?php 
include 'koneksi.php';

session_start();
date_default_timezone_set('Asia/Jakarta');

$tanggal = date('Y-m-d');
$id_customer = $_SESSION['customer_id'];

$customer = mysqli_query($koneksi,"select * from customer where customer_id='$id_customer'");
$c = mysqli_fetch_assoc($customer);

$nama = $c['customer_nama'];
$hp = $c['customer_hp'];
$alat = $_SESSION['booking_alat'];
$dari = mysqli_real_escape_string($koneksi, $_POST['dari']);
$sampai = mysqli_real_escape_string($koneksi, $_POST['sampai']);
$harga_per_hari = mysqli_real_escape_string($koneksi, $_POST['harga_per_hari']);
$total_bayar = mysqli_real_escape_string($koneksi, $_POST['harga']);

mysqli_query($koneksi,"insert into invoice values(NULL,'$tanggal','$id_customer','$nama','$hp','$alat','$dari','$sampai','$harga_per_hari','$total_bayar','0','','0',NULL,'0','0','')")or die(mysqli_error($koneksi));



unset($_SESSION['booking_alat_status']);
unset($_SESSION['booking_alat']);
unset($_SESSION['booking_dari']);
unset($_SESSION['booking_sampai']);

header("location:customer_pesanan.php?alert=sukses");