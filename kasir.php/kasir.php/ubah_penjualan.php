<?php 
$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * FROM tb_penjualan WHERE id_penjualan='$id'");
$data = mysqli_fetch_array($q);

if (isset($_POST['ubah'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $total_harga = $_POST['total_harga'];

    $update = mysqli_query($koneksi, "UPDATE tb_penjualan SET id_pelanggan='$id_pelanggan', total_harga='$total_harga' WHERE id_penjualan='$id'");
    if ($update) {
        echo "<script>alert('Data berhasil diubah');location.href='?page=penjualan';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data');</script>";
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Ubah Penjualan</h1>
    <a href="?page=penjualan" class="btn btn-warning mb-3">Kembali</a>

    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td>Pelanggan</td>
                <td>
                    <select name="id_pelanggan" class="form-control" required>
                        <?php
                        $pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
                        while ($p = mysqli_fetch_array($pelanggan)) {
                            $selected = $p['id_pelanggan'] == $data['id_pelanggan'] ? 'selected' : '';
                            echo "<option value='$p[id_pelanggan]' $selected>$p[nama_pelanggan]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><input type="number" name="total_harga" value="<?= $data['total_harga']; ?>" class="form-control" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="ubah" class="btn btn-success">Simpan Perubahan</button></td>
            </tr>
        </table>
    </form>
</div>