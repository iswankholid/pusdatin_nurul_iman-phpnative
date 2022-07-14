<?php
// memanggil library FPDF
require('../fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('../assets/images/nurul iman.png', 10, 5, 20, 20);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', '', 16);
// mencetak string 
$pdf->Cell(190, 7, 'MASJID JAMI NURUL IMAN', 0, 1, 'C');
$pdf->SetFont('Arial', '', 14);
$bulan = $_GET['bulan'];
$pdf->Cell(190, 7, 'Daftar Penerima Santunan Bulan ' . $bulan, 0, 1, 'C');


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(15, 15, '', 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(8, 6, 'No', 1, 0);
$pdf->Cell(35, 6, 'NIK', 1, 0);
$pdf->Cell(55, 6, 'Nama', 1, 0);
$pdf->Cell(27, 6, 'Status', 1, 0);
$pdf->Cell(25, 6, 'Petugas', 1, 1);

$pdf->SetFont('Arial', '', 10);

include '../koneksi.php';
$mahasiswa = mysqli_query($koneksi, "select * from santunan_bulanan where bulan ='$bulan'");
$nomor = 1;
while ($row = mysqli_fetch_array($mahasiswa)) {
    $pdf->Cell(8, 6, $nomor++, 1, 0);
    $pdf->Cell(35, 6, $row['nik'], 1, 0);
    $pdf->Cell(55, 6, $row['nama'], 1, 0);
    $pdf->Cell(27, 6, $row['status'], 1, 0);
    $pdf->Cell(25, 6, $row['petugas'], 1, 1);
}

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(15, 20, 'Mengetahui,', 0, 1);
$pdf->Cell(15, 0, '', 0, 1);
$pdf->Cell(15, 2, 'Drs. Jahudi', 0, 1);
$pdf->Cell(15, 5, 'Ketua DKM Masjid Nurul Iman', 0, 1);

$pdf->Output();
