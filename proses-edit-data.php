<?php
if (isset($_POST['edit_data'])) {
    require_once 'Minuman.php';
    $id_minuman = $_POST['id'];
    $nama_minuman = $_POST['nama_minuman'];
    $harga_minuman = $_POST['harga_minuman'];
    $minuman = new Minuman();
    $minuman->editMinuman($id_minuman, $nama_minuman, $harga_minuman);
}

header('Location: index.php');

?>