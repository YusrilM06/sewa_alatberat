<?php 
include 'koneksi.php';

session_start();
date_default_timezone_set('Asia/Jakarta');

// $id_customer = $_SESSION['customer_id'];

$alat = mysqli_real_escape_string($koneksi, $_POST['alat']);
$dari = mysqli_real_escape_string($koneksi, $_POST['dari']);
$sampai = mysqli_real_escape_string($koneksi, $_POST['sampai']);

$kk = mysqli_query($koneksi,"select * from alat where alat_id='$alat'");
$k = mysqli_fetch_assoc($kk);
$jumlah_alat = $k['alat_jumlah'];
// echo $jumlah_alat;

// echo $dari;

$dari = date('Y-m-d', strtotime($dari));
$sampai = date('Y-m-d', strtotime($sampai));
// echo $dari;
$cek = mysqli_query($koneksi,"select * from invoice where invoice_alat='$alat' and (invoice_dari >= '$dari' and invoice_dari <= '$sampai' or invoice_sampai > '$dari' and invoice_sampai <= '$sampai') and (invoice_status='0' or invoice_status='1' or invoice_status='3')");
                    
// $cek = mysqli_query($koneksi,"select * from invoice where (date(invoice_dari) >= '$dari' and date(invoice_dari) <= '$sampai') or ((date(invoice_sampai) >= '$dari' and date(invoice_sampai) <= '$sampai')) and invoice_alat='$alat'");

$c = mysqli_num_rows($cek);
echo $c;
if($c >= $jumlah_alat){
	echo "tidak tersedia";

	$_SESSION['booking_alat_status'] = "tidak-tersedia";
	$_SESSION['booking_alat'] = $alat;
	$_SESSION['booking_dari'] = $dari;
	$_SESSION['booking_sampai'] = $sampai;	

	header("location:booking.php?id=$alat&alert=tidak-tersedia");
}else{
	echo "tersedia";

	$_SESSION['booking_alat_status'] = "tersedia";
	$_SESSION['booking_alat'] = $alat;
	$_SESSION['booking_dari'] = $dari;
	$_SESSION['booking_sampai'] = $sampai;	

	header("location:booking.php?id=$alat&alert=tersedia");
}

