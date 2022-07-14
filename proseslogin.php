<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from admin where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['rules'] == "super-admin") {
        $id = $data['id'];
        $no_kk = $data['no_kk'];
        // buat session login dan username
        $_SESSION['email'] = $email;
        $_SESSION['rules'] = "admin";
        $_SESSION['id'] = $id;
        $_SESSION['no_kk'] = $no_kk;
        // alihkan ke halaman dashboard admin
        header("location:superadmin/index.php");

        // cek jika user login sebagai pegawai
    } else if ($data['rules'] == "admin") {
        $id = $data['id'];
        $no_kk = $data['no_kk'];
        // buat session login dan username
        $_SESSION['email'] = $email;
        $_SESSION['rules'] = "warga";
        $_SESSION['id'] = $id;
        $_SESSION['no_kk'] = $no_kk;
        // alihkan ke halaman dashboard admin
        header("location:superadmin/index.php");
    } else {

        // alihkan ke halaman login kembali
        header("location:login.php?pesan=gagal");
    }
} else {
    header("location:login.php?pesan=gagal");
}
