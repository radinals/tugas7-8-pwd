<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="proses-tambah-data.php" method="POST">
        <label for="nama-minuman">Nama Minuman</label>
        <input type="text" name="nama_minuman" required>
        <br>
        <label for="harga-minuman">Harga Minuman</label>
        <input type="number" name="harga_minuman" required>
        <br>
        <button type="submit" name="tambah_data">Tambahkan Data</button>
    </form>
</body>

</html>