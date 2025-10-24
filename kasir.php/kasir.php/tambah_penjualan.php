<?php 
if (isset($_POST['simpan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $total_harga = $_POST['total_harga'];

    $query = mysqli_query($koneksi, "INSERT INTO tb_penjualan (id_pelanggan, total_harga) VALUES ('$id_pelanggan', '$total_harga')");
    if ($query) {
        echo "<script>alert('Data penjualan berhasil disimpan');location.href='?page=penjualan';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Penjualan</h1>
    <a href="?page=penjualan" class="btn btn-warning mb-3">Kembali</a>
    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Pelanggan</td>
                <td>
                    <select name="id_pelanggan" class="form-control" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        <?php
                        $pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
                        while ($p = mysqli_fetch_array($pelanggan)) {
                            echo "<option value='$p[id_pelanggan]'>$p[nama_pelanggan]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><input type="number" name="total_harga" class="form-control" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="simpan" class="btn btn-primary">Simpan</button></td>
            </tr>
        </table>
    </form>
</div>