<?php
// memanggil library FPDF
require('../fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('../assets/images/korp.jpg', 15, 5, 175, 35);
$pdf->Image('../assets/images/barcode.jpg', 125, 246, 20, 8);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', '', 16);
// mencetak string 
$pdf->Cell(15, 30, '', 0, 1,);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->SetFont('Arial', '', 11);
$date = date(' d F Y');
$date2 = date(' n/Y');
$pdf->Cell(175, 7, 'Jakarta,' . $date, 0, 1, 'R');

//no surat
$pdf->Cell(15, 10, '', 0, 1,);
$pdf->Cell(8, 6, 'No', 0, 0);
$pdf->Cell(3, 6, ':', 0, 0);
$pdf->Cell(8, 6, '...../DKM/' . $date2, 0, 1);
//hal surat
$pdf->Cell(8, 6, 'Hal', 0, 0);
$pdf->Cell(3, 6, ':', 0, 0);
$pdf->Cell(8, 6, 'Undangan Santunan', 0, 1);

//lampiran surat
$pdf->Cell(15, 6, 'Lampiran', 0, 0);
$pdf->Cell(3, 6, ':', 0, 0);
$pdf->Cell(8, 6, ': -', 0, 1);

$pdf->Cell(8, 5, '', 0, 1);

//setting db
include '../koneksi.php';
$nik = $_GET['nik'];
$undangan = mysqli_query($koneksi, "select * from penerima_santunan where nik=$nik");
$nomor = 1;
while ($row = mysqli_fetch_array($undangan)) {

    //Kepada
    $pdf->Cell(15, 6, 'Kepada Yth,', 0, 1);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(15, 6, $row['nama'] . ' / ' . $row['nik'], 0, 1);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(15, 6, 'Di Tempat,', 0, 1);

    $pdf->Cell(15, 5, '', 0, 1);
    //Pembuka
    $pdf->SetFont('Arial', 'I', 11);
    $pdf->Cell(15, 6, 'Assalamulaikum Warahmatullahi Wabarakatuh,', 0, 1);

    //isi
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(15, 1, '', 0, 1);
    $pdf->Cell(15, 6, 'Salam sejahtera kami sampaikan teriring doa semoga Bapak/Ibu/Saudara/i senantiasa dalam keadaan', 0, 1);
    $pdf->Cell(15, 6, 'sehat, serta mendapatkan taufik dan hidayah dari Allah, sehingga senantiasa dapat melakukan ', 0, 1);
    $pdf->Cell(15, 6, 'aktifitas ibadah dengan lebih baik lagi.', 0, 1);

    //isi2    
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(15, 3, '', 0, 1);
    $pdf->Cell(15, 6, 'Dalam rangka pemberian santunan, Kami pengurus Dewan Kemakmuran Masjid Jami Nurul Iman,', 0, 1);
    $pdf->Cell(15, 6, 'mengharapakan kehadiran Bapak/Ibu/Saudara/i Untuk menerima santunan, yang Insya Allah kami ', 0, 1);
    $pdf->Cell(15, 6, 'bagikan pada:', 0, 1);

    //Hari waktu
    $pdf->Cell(15, 3, '', 0, 1);
    $pdf->Cell(35, 6, 'Hari & Tanggal', 0, 0);
    $pdf->Cell(30, 6, ': Jumat, 20 Agustus 2021', 0, 1);
    $pdf->Cell(35, 6, 'Waktu', 0, 0);
    $pdf->Cell(30, 6, ': 13.30-15.00 WIB', 0, 1);
    $pdf->Cell(35, 6, 'Tempat', 0, 0);
    $pdf->Cell(30, 6, ': Masjid Jami Nurul Iman', 0, 1);

    //penutup    
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(15, 3, '', 0, 1);
    $pdf->Cell(15, 6, 'Demikian surat undangan ini kami sampaikan,  atas kehadirannya kami ucapkan terimakasih.', 0, 1);
    $pdf->Cell(15, 3, '', 0, 1);
    $pdf->Cell(15, 6, 'Wassalamualaikum Warahmatullahi Wabarakatuh. ', 0, 1);

    $pdf->Cell(15, 10, '', 0, 1);

    $date2 = date('d- M - y');
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(15, 0, 'Mengetahui,', 0, 1);
    $pdf->Cell(15, 25, '', 0, 1);
    $pdf->Cell(15, 4, 'Drs. Jahudi', 0, 1);
    $pdf->Cell(15, 5, 'Ketua DKM Masjid Nurul Iman', 0, 1);

    $pdf->Cell(15, 8, '', 0, 1);
    $pdf->SetFont('times', '', 10);
    $pdf->Cell(30, 6, 'Nama', 1, 0);
    $pdf->Cell(30, 6, 'NIK', 1, 0);
    $pdf->Cell(25, 6, 'Jenis Kelamin', 1, 0);
    $pdf->Cell(25, 6, 'Tanggal Lahir', 1, 0);
    $pdf->Cell(35, 6, 'PassCode', 1, 1);
    $pdf->Cell(30, 8, $row['nama'], 1, 0);
    $pdf->Cell(30, 8, $row['nik'], 1, 0);
    $pdf->Cell(25, 8, $row['jenkel'], 1, 0);
    $pdf->Cell(25, 8, $row['tgl_lahir'], 1, 0);
    $pdf->Cell(35, 8, '', 1, 0);
}


$pdf->SetFont('Arial', 'i', 9);
$pdf->Cell(15, 10, '', 0, 1);
$pdf->Cell(15, 4, '*Harap membawa surat ini dan KTP untuk pengambilan,', 0, 1);
$pdf->Cell(15, 4, '*Patuhi protokol kesehatan,', 0, 1);
$pdf->Cell(15, 4, '*Himbau anggota keluarga yang laki2 untuk sholat berjamaah di masjid,', 0, 1);
$pdf->Output();
