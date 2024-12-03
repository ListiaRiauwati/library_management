<?php
// menghubungkan file koneksi dengan index
include("../koneksi.php");
session_start(); // mulai sesi
?>

<!DOCTYPE html>
<html>
<head>
   <title>Data Anggota</title>
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

  <h2>Data Anggota</h2>
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
      <th>anggota id</th>
      <th>nama lengkap</th>
      <th>email</th>
      <th><a href="tambah_anggota.php">Tambah Data</a></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1; 
    $query = $db->query("SELECT * FROM anggota");
    while ($anggota = $query->fetch_assoc()){
    ?> 
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $anggota['anggota_id'] ?></td>
      <td><?php echo $anggota['namaLengkap'] ?></td>
      <td><?php echo $anggota['email'] ?></td>
      <td align="center">
         <!-- URL ke halaman edit data dengan menggunakan parameter id pada kolom table -->
         <a href="edit_anggota.php?anggota_id=<?php echo $anggota['anggota_id'] ?>">Edit</a> 
         <!-- URL untuk menghapus data dengan menggunakan parameter id pada kolom table dan alert confirmasi hapus data-->
         <a onclick="return confirm('Anda yakin ingin menghapus data?')"
         href="hapus_anggota.php?anggota_id=<?php echo $anggota['anggota_id'] ?>">Hapus</a>
       </td>
     </tr>
     <?php
     } 
     ?>
   </tbody>
 </table>
 <!-- Menghitung jumlah baris yang ada pada table (anggota) -->
 <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>