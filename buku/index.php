<?php
// menghubungkan file koneksi dengan index
include("../koneksi.php");
session_start(); // mulai sesi
?>

<!DOCTYPE html>
<html>
<head>
   <title>Data Buku</title>
<style>

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px;
} 
</style>
</head>
<body>
  <div>
    <ul>
      <li><a href="../buku/index.php">Data buku</a></li>
      <li><a href="../anggota/index.php">Data anggota</a></li>
    <ul>
  </div>

  <h2>Data Buku</h2>
 <!-- Tampilkan Notifikasi Jika Ada -->
 <?php if (isset($_SESSION['notifikasi'])): ?>
  <p><?php echo $_SESSION['notifikasi']; ?></p>
  <!-- Hapus notifikasi setelah ditampilkan -->
  <?php unset($_SESSION['notifikasi']); ?>
 <?php endif; ?>
 <table>
  <thead>
    <tr align="center">
      <th>#</th>
      <th>judul buku</th>
      <th>penulis</th>
      <th>tahun publikasi</th>
      <th><a href="tambah_buku.php">Tambah Data</a></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1; 
    $query = $db->query("SELECT * FROM buku");
    while ($buku = $query->fetch_assoc()){
    ?> 
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $buku['judulBuku'] ?></td>
      <td><?php echo $buku['penulis'] ?></td>
      <td><?php echo $buku['tahun_publikasi'] ?></td>
      <td align="center">
         <!-- URL ke halaman edit data dengan menggunakan parameter id pada kolom table -->
         <a href="edit_buku.php?buku_id=<?php echo $buku['buku_id'] ?>">Edit</a> 
         <!-- URL untuk menghapus data dengan menggunakan parameter id pada kolom table dan alert confirmasi hapus data-->
         <a onclick="return confirm('Anda yakin ingin menghapus data?')"
         href="hapus_buku.php?buku_id=<?php echo $buku['buku_id'] ?>">Hapus</a>
       </td>
     </tr>
     <?php
     } 
     ?>
   </tbody>
 </table>
 <!-- Menghitung jumlah baris yang ada pada table (buku) -->
 <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>