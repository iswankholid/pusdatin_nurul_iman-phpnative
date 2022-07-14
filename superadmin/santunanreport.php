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
$pdf->Cell(190, 7, 'Daftar Penerima Santunan', 0, 1, 'C');


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->SetFont('Arial', 'U', 11);
$pdf->Cell(15, 15, 'Bulan:', 0, 0, 'R');
$date = date(' M / y');
$pdf->Cell(15, 15, $date, 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(8, 6, 'No', 1, 0);
$pdf->Cell(35, 6, 'NIK', 1, 0);
$pdf->Cell(55, 6, 'Nama', 1, 0);
$pdf->Cell(27, 6, 'Jenis Kelamin', 1, 0);
$pdf->Cell(25, 6, 'Rt/Rw', 1, 0);
$pdf->Cell(25, 6, 'Status', 1, 0);
$pdf->Cell(15, 6, 'check', 1, 1);

$pdf->SetFont('Arial', '', 10);

include '../koneksi.php';
$mahasiswa = mysqli_query($koneksi, "select * from penerima_santunan where aktif='Aktif'");
$nomor = 1;
while ($row = mysqli_fetch_array($mahasiswa)) {
    $pdf->Cell(8, 6, $nomor++, 1, 0);
    $pdf->Cell(35, 6, $row['nik'], 1, 0);
    $pdf->Cell(55, 6, $row['nama'], 1, 0);
    $pdf->Cell(27, 6, $row['jenkel'], 1, 0);
    $pdf->Cell(25, 6, $row['rtrw'], 1, 0);
    $pdf->Cell(25, 6, $row['status'], 1, 0);
    $pdf->Cell(15, 6, '', 1, 1);
}
$date2 = date('d- M - y');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(15, 10, 'Jakarta, ' . $date2, 0, 1);
$pdf->Cell(15, 0, 'Mengetahui,', 0, 1);
$pdf->Cell(15, 20, '', 0, 1);
$pdf->Cell(15, 2, 'Drs. Jahudi', 0, 1);
$pdf->Cell(15, 5, 'Ketua DKM Masjid Nurul Iman', 0, 1);

$pdf->Output();
