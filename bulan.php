<?php
include 'koneksi.php';

$bulan = date('F-Y');
$sql = mysqli_query($koneksi, "select * from penerima_santunan");
$jumlahdata    = mysqli_num_rows($sql);

$data = mysqli_query($koneksi, "select * from bulan where bulan='$bulan'");
$cekbulan = mysqli_num_rows($data);
if ($cekbulan > 0) {
    echo 'Data Bulan Sudah Ada Tidak Dapat Di Input Lagi';
} else {
    mysqli_query($koneksi, "insert into bulan values('','$bulan','$jumlahdata')");
    echo 'Data Bulan Ini Berhasil Di Input';
}
