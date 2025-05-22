<?php

if (isset($_POST['tambah_data'])) {
    require_once 'Minuman.php';
    $nama_minuman = $_POST['nama_minuman'];
    $harga_minuman = $_POST['harga_minuman'];
    $minuman = new Minuman();
    $minuman->tambahMinuman($nama_minuman, $harga_minuman);
}

header('Location: index.php');
exit;
?>