<?php
$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM tb_penjualan WHERE id_penjualan='$id'");
if ($hapus) {
    echo "<script>alert('Data berhasil dihapus');location.href='?page=penjualan';</script>";
} else {
    echo "<script>alert('Data gagal dihapus');</script>";
}
?>