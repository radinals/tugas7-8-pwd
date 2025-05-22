<?php

if (isset($_POST['tambah-data'])) {
    header('Location: tambah-minuman.php');
    exit;
} elseif (isset($_POST['edit-data'])) {
    $id = $_POST['id'];
    header("Location: edit-minuman.php?id=$id");
    exit;
} elseif (isset($_POST['hapus-data'])) {
    require_once 'Minuman.php';

    $minuman = new Minuman();
    $id_minuman = $_POST['id'];

    if ($minuman->hapusMinuman($id_minuman)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Gagal menghapus data minuman.";
    }
}
