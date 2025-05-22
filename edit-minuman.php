<?php
require_once 'Minuman.php';

$minuman = new Minuman();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$data = $minuman->getMinumanById($id);

if (!$data) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit Minuman</title>
</head>
<body>
    <h2>Edit Minuman</h2>
    <form action="proses-edit-data.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($data['id_minuman']) ?>">

        <label for="nama-minuman">Nama Minuman</label>
        <input type="text" name="nama_minuman" required 
               value="<?= htmlspecialchars($data['nama_minuman']) ?>">
        <br>

        <label for="harga-minuman">Harga Minuman</label>
        <input type="number" step="0.01" name="harga_minuman" required 
               value="<?= htmlspecialchars($data['harga_minuman']) ?>">
        <br>

        <button type="submit" name="edit_data">Edit Data</button>
    </form>
</body>
</html>