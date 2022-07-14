<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['rules'] == "") {
    header("location:login.php?pesan=unlogin");
}
if ($_SESSION['rules'] == "super-admin") {
    header("location:superadmin/index.php");
}
if ($_SESSION['rules'] == "admin") {
    header("location:admin/index.php");
}
