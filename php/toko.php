
<?php
session_start();

// inisialisasi produk jika belum ada
if (!isset($_SESSION['daftar_produk'])) {
    $_SESSION['daftar_produk'] = [];
}

// kalau mode edit
$editProduk = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    if (isset($_SESSION['daftar_produk'][$id])) {
        $editProduk = $_SESSION['daftar_produk'][$id];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Elektronik</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background: #eee; }
        img { max-width: 80px; max-height: 80px; }
    </style>
</head>
<body>
    <h2>Toko Elektronik</h2>

    <!-- form tambah/edit -->
    <h3><?= $editProduk ? "Edit Produk" : "Tambah Produk" ?></h3>
    <form method="post" enctype="multipart/form-data" action="proses.php">
        <input type="hidden" name="id" value="<?= $editProduk ? $_GET['edit'] : '' ?>">
        Nama: <input type="text" name="nama" value="<?= $editProduk['nama'] ?? '' ?>" required><br><br>
        Harga: <input type="number" name="harga" value="<?= $editProduk['harga'] ?? '' ?>" required><br><br>
        Tipe: <input type="text" name="tipe" value="<?= $editProduk['tipe'] ?? '' ?>" required><br><br>
        Stok: <input type="number" name="stok" value="<?= $editProduk['stok'] ?? '' ?>" required><br><br>
        Watt: <input type="number" name="watt" value="<?= $editProduk['watt'] ?? '' ?>" required><br><br>
        Gambar: <input type="file" name="gambar"><br>
        <?php if ($editProduk && !empty($editProduk['gambar'])): ?>
            <img src="uploads/<?= htmlspecialchars($editProduk['gambar']) ?>" width="100"><br>
        <?php endif; ?>
        <br>
        <button type="submit" name="<?= $editProduk ? 'update' : 'tambah' ?>">
            <?= $editProduk ? 'Update' : 'Simpan' ?>
        </button>
    </form>

    <!-- daftar produk -->
    <h3>Daftar Produk</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tipe</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Watt</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php if (empty($_SESSION['daftar_produk'])): ?>
            <tr><td colspan="8">Belum ada produk.</td></tr>
        <?php else: ?>
            <?php foreach ($_SESSION['daftar_produk'] as $i => $p): ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= htmlspecialchars($p['nama']) ?></td>
                    <td><?= htmlspecialchars($p['tipe']) ?></td>
                    <td>Rp<?= number_format($p['harga'],0,',','.') ?></td>
                    <td><?= $p['stok'] ?></td>
                    <td><?= $p['watt'] ?> W</td>
                    <td>
                        <?php if (!empty($p['gambar'])): ?>
                            <img src="uploads/<?= htmlspecialchars($p['gambar']) ?>" alt="">
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="toko.php?edit=<?= $i ?>">Edit</a> |
                        <a href="proses.php?hapus=<?= $i ?>" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>
