<?php
include "koneksi.php";

if (isset($_POST['nama_produk'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga_produk'];
    $stok = $_POST['stok_produk'];

    $query = mysqli_query($koneksi, "INSERT INTO tb_produk(nama_produk, harga_produk, stok_produk) VALUES('$nama','$harga','$stok')");
    if ($query) {
        echo "<script>alert('Data berhasil disimpan');window.location='index.php?page=produk';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah Produk</li>
    </ol>
    <a href="?page=produk" class="btn btn-warning">Kembali</a>
    <hr>
    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Produk</td>
                <td><input type="text" name="nama_produk" class="form-control" required></td>
            </tr>
            <tr>
                <td>Harga Produk</td>
                <td><input type="number" name="harga_produk" class="form-control" required></td>
            </tr>
            <tr>
                <td>Stok Produk</td>
                <td><input type="number" name="stok_produk" class="form-control" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="?page=produk" class="btn btn-secondary">Cancel</a>
                </td>
            </tr>
        </table>
    </form>
</div>