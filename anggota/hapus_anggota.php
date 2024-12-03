<?php
session_start();
include("../koneksi.php");

if (isset($_GET['anggota_id'])) {
    $id = $_GET['anggota_id'];
     // Sanitasi input untuk mencegah SQL Injection
    $id = mysqli_real_escape_string($db, $id);

     // Query untuk menghapus data
    $sql = "DELETE FROM anggota WHERE anggota_id='$id'";
    $query = mysqli_query($db, $sql);

    if ($query) {
        $_SESSION['notifikasi'] = "Data anggota berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data anggota gagal dihapus!";
    }

    // Redirect ke index.php
    header('Location: index.php');
    exit(); // Pastikan untuk keluar setelah redirect
} else {
    die("Akses ditolak...");
}
?>