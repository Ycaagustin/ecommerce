<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php'; // pastikan koneksi mysqli

if (isset($_GET['idk'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_kategori WHERE kategori_id = '" . $_GET['idk'] . "' ");
    if (!$delete) {
        echo "Gagal hapus kategori: " . mysqli_error($conn);
    } else {
        echo '<script>window.location="data-kategori.php"</script>';
    }
}

if (isset($_GET['id'])) {
    $produk = mysqli_query($conn, "SELECT produk_foto FROM tb_produk WHERE produk_id = '" . $_GET['id'] . "'");
    $p = mysqli_fetch_object($produk);

    if ($p && file_exists('./produk/' . $p->produk_foto)) {
        unlink('./produk/' . $p->produk_foto);
    }

    $delete = mysqli_query($conn, "DELETE FROM tb_produk WHERE produk_id = '" . $_GET['id'] . "' ");
    if (!$delete) {
        echo "Gagal hapus produk: " . mysqli_error($conn);
    } else {
        echo '<script>window.location="data-produk.php"</script>';
    }
}
?>
