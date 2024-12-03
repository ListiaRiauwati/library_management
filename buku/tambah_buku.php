<!DOCTYPE html>
<html>
<head>
    <title> buku </title>
</head>
<body>
    <h3> Tambah buku</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>judul buku</td>
                <td><input type="text" name="judulBuku" required></td>
            </tr>
            <tr>
                <td>penulis</td>
                <td><input type="text" name="penulis" required></td>
            </tr>
            <tr>
                <td>tahun publikasi</td>
                <td><input type="text" name="tahun_publikasi" required></td>
            </tr>
            <tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>