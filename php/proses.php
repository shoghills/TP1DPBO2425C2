<?php
session_start();

// Tambah produk
if (isset($_POST['tambah'])) {
    $namaGambar = "";
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir);
        $namaGambar = time() . "_" . basename($_FILES['gambar']['name']);
        $targetFile = $targetDir . $namaGambar;
        move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile);
    }

    $_SESSION['daftar_produk'][] = [
        'nama' => $_POST['nama'],
        'harga' => $_POST['harga'],
        'tipe' => $_POST['tipe'],
        'stok' => $_POST['stok'],
        'watt' => $_POST['watt'],
        'gambar' => $namaGambar
    ];
    header("Location: toko.php");
    exit;
}

// Update produk
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $produk = $_SESSION['daftar_produk'][$id];
    $namaGambar = $produk['gambar'];

    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "uploads/";
        $namaGambar = time() . "_" . basename($_FILES['gambar']['name']);
        $targetFile = $targetDir . $namaGambar;
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            if (!empty($produk['gambar']) && file_exists("uploads/" . $produk['gambar'])) {
                unlink("uploads/" . $produk['gambar']);
            }
        }
    }

    $_SESSION['daftar_produk'][$id] = [
        'nama' => $_POST['nama'],
        'harga' => $_POST['harga'],
        'tipe' => $_POST['tipe'],
        'stok' => $_POST['stok'],
        'watt' => $_POST['watt'],
        'gambar' => $namaGambar
    ];
    header("Location: toko.php");
    exit;
}

// Hapus produk
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $produk = $_SESSION['daftar_produk'][$id];
    if (!empty($produk['gambar']) && file_exists("uploads/" . $produk['gambar'])) {
        unlink("uploads/" . $produk['gambar']);
    }
    array_splice($_SESSION['daftar_produk'], $id, 1);
    header("Location: toko.php");
    exit;
}
