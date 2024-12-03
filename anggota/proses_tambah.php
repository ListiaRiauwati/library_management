<?php

session_start(); // Mulai sesi
//Menghubungkan file ini dengan file konfigurasi database
include("../koneksi.php");

// Mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])){
/* Mengambil nilai dari form input
   dan menyimpannya ke dalam variabel */
    $anggota_id = $_POST['anggota_id'];
    $namaLengkap = $_POST['namaLengkap'];
    $email= $_POST['email'];

    /* Menyusun query SQL untuk menambahkan data
    ke table 'anggota' */
    $sql = "INSERT INTO anggota
      (anggota_id, namaLengkap, email)
      VALUES ('$anggota_id', '$namaLengkap', '$email')";

    // Menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Data anggota berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data anggota gagal ditambahkan!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>