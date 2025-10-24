<?php
include "koneksi.php";
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <a href="?page=tambah_produk" class="btn btn-primary mb-3">+ Tambah Produk</a>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
 <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM tb_produk");
        while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($data['nama_produk']); ?></td>
            <td>Rp <?php echo number_format($data['harga_produk'], 0, ',', '.'); ?></td>
            <td><?php echo htmlspecialchars($data['stok_produk']); ?></td>
            <td>
                <a href="?page=ubah_produk&id=<?php echo $data['id_produk']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                <a href="?page=hapus_produk&id=<?php echo $data['id_produk']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>