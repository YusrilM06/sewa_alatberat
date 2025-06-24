<?php
// memanggil library FPDF
require('library/fpdf185/fpdf.php');


include 'koneksi.php'; 
$id = $_GET['id'];

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(190,7,'KONTRAK SEWA ALAT BERAT',0,1,'C');

$pdf->ln();


$id_invoice = mysqli_escape_string($koneksi, $_GET['id']);

$pdf->SetFont('Arial','',11);

$invoice = mysqli_query($koneksi,"select * from invoice where invoice_id='$id_invoice' order by invoice_id desc");
while($i = mysqli_fetch_array($invoice)){

	$id_alat = $i['invoice_alat'];
	$alat = mysqli_query($koneksi,"SELECT * FROM alat,kategori where kategori_id=alat_kategori and alat_id='$id_alat' order by alat_id desc");
	$k = mysqli_fetch_assoc($alat);


	$pdf->Cell(30,6,'Nomor',0,0,'');
	$pdf->Cell(5,6,':',0,0,'C');
	$pdf->Cell(85,6,'INVOICE-00'.$i['invoice_id'],0,1,'');

	$pdf->Cell(30,6,'Nama Penyewa',0,0,'');
	$pdf->Cell(5,6,':',0,0,'C');
	$pdf->Cell(85,6,$i['invoice_nama'],0,1,'');


	$pdf->Cell(30,6,'No.HP',0,0,'');
	$pdf->Cell(5,6,':',0,0,'C');
	$pdf->Cell(85,6,$i['invoice_hp'],0,1,'');

	$pdf->Cell(30,6,'Alat',0,0,'');
	$pdf->Cell(5,6,':',0,0,'C');
	$pdf->Cell(85,6,$k['alat_nama'],0,1,'');


	if($i['invoice_status'] == 0){
		$x =  "Menunggu Pembayaran";
	}elseif($i['invoice_status'] == 1){
		$x =  "Menunggu Konfirmasi";
	}elseif($i['invoice_status'] == 2){
		$x =  "Ditolak";
	}elseif($i['invoice_status'] == 3){
		$x =  "Dikonfirmasi";
	}elseif($i['invoice_status'] == 4){
		$x =  "Selesai";
	}

	$pdf->Cell(30,6,'Status',0,0,'');
	$pdf->Cell(5,6,':',0,0,'C');
	$pdf->Cell(85,6,$x ,0,1,'');


	$pdf->ln();

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(85,6, "Rincian" ,0,1,'');
	$pdf->SetFont('Arial','',11);

	$pdf->ln();

	$pdf->Cell(95,6, "Harga Alat" ,1,0,'');	
	$pdf->Cell(95,6, "Rp. ".number_format($i['invoice_harga'])." ,-" ,1,1,'R');

	$pdf->Cell(95,6, "Lama Sewa (" . date('d/m/Y', strtotime($i['invoice_dari'])) . " " . date('d/m/Y', strtotime($i['invoice_sampai'])) . ")" ,1,0,'');	
	

	$tgl_dari = strtotime($i['invoice_dari'] );
	$tgl_sampai = strtotime($i['invoice_sampai'] );
	$jumlah_hari =  $tgl_sampai - $tgl_dari;
	$hari = round($jumlah_hari / (60 * 60 * 24));

	$pdf->Cell(95,6, $hari . " Hari" ,1,1,'R');

	$pdf->SetFont('Arial','B',11);

	$pdf->Cell(95,6, "Total Bayar" ,1,0,'');	
	$pdf->Cell(95,6, "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ,1,1,'R');

	$pdf->SetFont('Arial','',11);

	$pdf->ln(5);

	$pdf->Cell(0,5, "Apabila penyewa melakukan keterlambatan dalam pengembalian alat, maka akan dikenakan denda sebesar" ,0,1,'');	
	$pdf->Cell(0,5, "Rp.".number_format($k['kategori_denda']) . " per hari keterlambatan." ,0,1,'');	
	$pdf->Cell(0,5, "yang akan dihitung sejak hari pertama setelah tanggal batas sewa yang telah ditentukan sampai dengan" ,0,1,'');	
	$pdf->Cell(0,5, "tanggal alat dikembalikan secara lengkap dan dalam kondisi baik." ,0,1,'');	

	
	$pdf->ln(10);



	$pdf->Cell(145,6,'',0,0,'C');
	$pdf->Cell(45,6,'Jakarta, '. date('d-m-Y', strtotime($i['invoice_tanggal'])) ,0,1,'C');

	$pdf->ln();

	$pdf->Cell(5,6,'',0,0,'C');
	$pdf->Cell(35,6,'Penyedia',0,0,'C');
	$pdf->Cell(110,6,'',0,0,'C');
	$pdf->Cell(35,6,'Penyewa',0,1,'C');

	$pdf->ln(14);

	$pdf->Cell(5,6,'',0,0,'C');
	$pdf->Cell(35,6,'PT.Sewa Alat Berat','T',0,'C');
	$pdf->Cell(110,6,'',0,0,'C');
	$pdf->Cell(35,6,$i['invoice_nama'],'T',1,'C');
}

$pdf->Output();
?>