<?php 
include 'koneksi.php';

$id = $_POST['id'];

$rand = rand();
$allowed =  array('png','jpg','jpeg',"PNG","JPG","JPEG");

$filename = $_FILES['bukti']['name'];

$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(in_array($ext,$allowed) ) {

	$file_gambar = $rand.'.'.$ext;

	move_uploaded_file($_FILES['bukti']['tmp_name'], 'gambar/bukti_pembayaran/'.$file_gambar);

	// hapus gambar lama
	$lama = mysqli_query($koneksi, "select * from invoice where invoice_id='$id'");
	$l = mysqli_fetch_assoc($lama);

	$foto = $l['invoice_bukti_denda'];

	unlink("gambar/bukti_pembayaran/$foto");

	mysqli_query($koneksi,"update invoice set invoice_bukti_denda='$file_gambar' where invoice_id='$id'")or die(mysqli_error($koneksi));
	header("location:customer_pesanan.php?alert=upload");
}else{
	header("location:customer_pesanan.php?alert=gagal");
}