<?php
include("../koneksi.php");

$id = $_GET['buku_id'];

// Pastikan Anda menggunakan variabel $id dalam query
$query = $db->query("SELECT * FROM buku WHERE buku_id = '$id'");
$buku = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit buku</title>
</head>
<body>
    <h3>Edit buku</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="id" value="<?php echo $buku['buku_id']; ?>">
          <table border="0">
            <tr>
               <td>judul buku</td>
               <td>
                <input type="text" name="judulBuku"
                value="<?php echo $buku['judulBuku']; ?>" required>
               </td>
              </tr>
              <tr>
                <td>penulis</td>
                <td>
                  <input type="text" name="penulis"
                   value="<?php echo $buku['penulis']; ?>" required>
                </td>
               </tr>
               <tr>
               <td>tahun publikasi</td>
                <td>
                  <input type="tahun_publikasi" name="tahun_publikasi"
                   value="<?php echo $buku['tahun_publikasi']; ?>" required>
                </td>
               </tr>
            </table>
            <button type="sumbit" name="simpan">Simpan</button>
          </form>
</body>
</html>