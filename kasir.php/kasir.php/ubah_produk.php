<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan');window.location='index.php?page=produk';</script>";
    exit;
}

$id = (int) $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Produk tidak ditemukan');window.location='index.php?page=produk';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga_produk'];
    $stok = $_POST['stok_produk'];

    $update = mysqli_query($koneksi, "UPDATE tb_produk SET nama_produk='$nama', harga_produk='$harga', stok_produk='$stok' WHERE id_produk='$id'");
    if ($update) {
        echo "<script>alert('Data berhasil diubah');window.location='index.php?page=produk';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Ubah Produk</h1>
    <a href="?page=produk" class="btn btn-warning mb-3">Kembali</a>
    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Produk</td>
                <td><input type="text" name="nama_produk" class="form-control" value="<?php echo $data['nama_produk']; ?>" required></td>
            </tr>
            <tr>
                <td>Harga Produk</td>
                <td><input type="number" name="harga_produk" class="form-control" value="<?php echo $data['harga_produk']; ?>" required></td>
            </tr>
            <tr>
                <td>Stok Produk</td>
                <td><input type="number" name="stok_produk" class="form-control" value="<?php echo $data['stok_produk']; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>