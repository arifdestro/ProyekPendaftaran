	
<?php
  include 'includes/connector.php';
  session_start();
  if(isset($_SESSION['NISN'])){
    $NISN = $_SESSION['NISN'];
    $result_siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE NISN = '$NISN'");
    $data_siswa = mysqli_fetch_assoc($result_siswa);
  }

// memanggil library FPDF
include 'includes/fpdf/fpdf.php';
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->isFinished = false;
// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',16);
// mencetak string 
$pdf->Image('../../src/img/icons/cap.png',20,10,22,22);
$pdf->Cell(190,12,'HMPS Tadris IPA IAIN Jember',0,1,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(190,7,'Jalan Mataram No.1, Karang Miuwo, Mangli, Kec. Kaliwates',0,1,'C');
$pdf->Cell(190,4,'Kabupaten Jember',0,1,'C');
$pdf->Cell(190,4,'','B',1);
$pdf->Cell(190,1,'','B',1);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Times','B',14);
$pdf->Cell(190,12,'LAPORAN DATA PESERTA LOMBA',0,1,'C');

$pdf->SetFont('Times','B',10);
// Menampilkan Header Tabel
$pdf->Cell(11,6,'',0,0,'C');
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(30,6,'NISN',1,0,'C');
$pdf->Cell(50,6,'NAMA_SISWA',1,0,'C');
$pdf->Cell(35,6,'TEMPAT_LAHIR',1,0,'C');
$pdf->Cell(35,6,'TANGGAL_LAHIR',1,1,'C');
$pdf->Cell(50,6,'ALAMAT',1,0,'C');
$pdf->Cell(30,6,'FOTO',1,0,'C');


// select seluruh data pada tabel ukuran
$pdf->SetFont('Times','',10);
$result_ukuran = mysqli_query($con, "SELECT * FROM siswa");
$i = 0;
while($data_ukuran = mysqli_fetch_assoc($result_ukuran)){
  $i+=1;
  $pdf->Cell(11,6,'',0,0,'C');
  $pdf->Cell(10,6,$i,1,0,'C');
  $pdf->Cell(30,6,$data_ukuran['NISN'],1,0,'C');
  $pdf->Cell(50,6,$data_ukuran['NAMA_SISWA'],1,0,'C');
  $pdf->Cell(35,6,$data_ukuran['TEMPAT_LAHIR'],1,0,'C');
  $pdf->Cell(50,6,$data_ukuran['TANGGAL_LAHIR'],1,1,'C');
  $pdf->Cell(50,6,$data_ukuran['ALAMAT'],1,0,'C');
  $pdf->Cell(30,6,$data_ukuran['FOTO'],1,0,'C');
}


// tampilkan footer ketika dokumen telah selesai
$pdf->isFinished = true;
if($pdf->isFinished){
  $pdf->setY(-60);
  $pdf->SetFont('Times','',12);
  $pdf->Cell(130);
  date_default_timezone_set('Asia/Jakarta');
  $date = date("d")." ".month(date("n"))." ".date("Y");
  $pdf->Cell(30,6,'Jember, '. $date,0,1,'C');
  $pdf->Cell(130);
  $pdf->Cell(30,6,"Penanggung Jawab,",0,1,'C');
  $pdf->Cell(10,7,'',0,1);
  $pdf->Cell(10,7,'',0,1);
  $pdf->Cell(10,7,'',0,1);
  $pdf->Cell(130);
  $pdf->Cell(30,6,$data_siswa['NAMA_SISWA'],0,1,'C');
}


$pdf->Output();


    

?>