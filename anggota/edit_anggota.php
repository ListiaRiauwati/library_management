<?php
include("../koneksi.php");

$id = $_GET['anggota_id'];

// Pastikan Anda menggunakan variabel $id dalam query
$query = $db->query("SELECT * FROM anggota WHERE anggota_id = '$id'");
$anggota = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit anggota</title>
</head>
<body>
    <h3>Edit anggota</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="id" value="<?php echo $anggota_id['anggota_id']; ?>">
          <table border="0">
            <tr>
               <td>Id anggota</td>
               <td>
                <input type="text" name="anggota_id"
                value="<?php echo $anggota['anggota_id']; ?>" required>
               </td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td>
                  <input type="text" name="namaLengkap"
                   value="<?php echo $anggota['namaLengkap']; ?>" required>
                </td>
               </tr>
               <tr>
               <td>Email</td>
                <td>
                  <input type="email" name="email"
                   value="<?php echo $anggota['email']; ?>" required>
                </td>
               </tr>
            </table>
            <button type="sumbit" name="simpan">Simpan</button>
          </form>
</body>
</html>