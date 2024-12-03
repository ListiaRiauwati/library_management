<!DOCTYPE html>
<html>
<head>
    <title> anggota </title>
</head>
<body>
    <h3> Tambah anggota</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>anggota_id</td>
                <td><input type="text" name="anggota_id" required></td>
            </tr>
            <tr>
                <td>namaLengkap</td>
                <td><input type="text" name="namaLengkap" required></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" name="email" required></td>
            </tr>
            <tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>