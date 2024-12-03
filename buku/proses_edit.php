<?php

session_start();
include("../koneksi.php");

if(isset($_POST['simpan'])){
    
    $buku_id = $_POST['id'];
    $judulBuku = $_POST['judulBuku'];
    $penulis = $_POST['penulis'];
    $tahun_publikasi = $_POST['tahun_publikasi'];

    $sql = "UPDATE buku SET 
      judulBuku= '$judulBuku',
      penulis= '$penulis',
      tahun_publikasi= '$tahun_publikasi'
      WHERE buku_id='$buku_id'";

    $query = mysqli_query($db, $sql);

    if ($query) {
        $_SESSION['notifikasi'] = "Data buku berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data buku gagal diperbarui!";
    }

    header('Location: index.php');
    exit();
} else {
    die("Akses ditolak...");
}
?>