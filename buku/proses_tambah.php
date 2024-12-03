<?php

session_start(); // Mulai sesi
//Menghubungkan file ini dengan file konfigurasi database
include("../koneksi.php");

// Mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])){
/* Mengambil nilai dari form input
   dan menyimpannya ke dalam variabel */
    $judulBuku = $_POST['judulBuku'];
    $penulis = $_POST['penulis'];
    $tahun_publikasi= $_POST['tahun_publikasi'];

    /* Menyusun query SQL untuk menambahkan data
    ke table 'buku' */
    $sql = "INSERT INTO buku
      (judulBuku, penulis, tahun_publikasi)
      VALUES ('$judulBuku', '$penulis', '$tahun_publikasi')";

    // Menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Data buku berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data buku gagal ditambahkan!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>