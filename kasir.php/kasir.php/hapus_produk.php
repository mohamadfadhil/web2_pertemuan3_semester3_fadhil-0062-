<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    echo "<script>alert('ID produk tidak ditemukan');window.location='index.php?page=produk';</script>";
    exit;
}

$id = (int) $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM tb_produk WHERE id_produk='$id'");
if ($query) {
    echo "<script>alert('Data berhasil dihapus');window.location='index.php?page=produk';</script>";
} else {
    echo "<script>alert('Gagal menghapus: " . mysqli_error($koneksi) . "');window.location='index.php?page=produk';</script>";
}
?>