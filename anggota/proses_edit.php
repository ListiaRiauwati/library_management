<?php

session_start();
include("../koneksi.php");

// Periksa apakah tombol 'simpan' pada form ditekan
if(isset($_POST['simpan'])) {
    // Ambil data dari form
    $anggota_id = $_POST['anggota_id'];
    $namaLengkap = $_POST['namaLengkap'];
    $email = $_POST['email'];

    $sql = "UPDATE anggota SET
      namaLengkap= '$namaLengkap',
      email= '$email'
      WHERE anggota_id=$anggota_id";
      

    $query = mysqli_query($db, $sql);

    if ($query) {
        $_SESSION['notifikasi'] = "Data anggota berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data anggota gagal diperbarui!";
    }

    header('Location: index.php');
    exit();
} else {
    die("Akses ditolak...");
}
?>