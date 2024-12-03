<?php
session_start();
include("../koneksi.php");

if (isset($_GET['buku_id'])) {
    $id = $_GET['buku_id'];

     // Sanitasi input untuk mencegah SQL Injection
    $id = mysqli_real_escape_string($db, $id);

     // Query untuk menghapus data
    $sql = "DELETE FROM buku WHERE buku_id='$id'";
    $query = mysqli_query($db, $sql);

    if ($query) {
        $_SESSION['notifikasi'] = "Data buku berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data buku gagal dihapus!";
    }

    // Redirect ke index.php
    header('Location: index.php');
    exit(); // Pastikan untuk keluar setelah redirect
} else {
    die("Akses ditolak...");
}
?>
