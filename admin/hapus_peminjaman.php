<?php  
include '../koneksi.php';
$id_transaksi = $_GET['id_transaksi'];

$query_transaksi = mysqli_query($koneksi, "SELECT id_buku, status_transaksi FROM transaksi WHERE id_trasnsaksi = '$id_transaksi'");
$t = mysqli_fetch_array($query_transaksi);
$id_buku = $t['id_buku'];
$status = $t['status_transaksi'];

$hapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_trasnsaksi = '$id_transaksi'");

if ($hapus) {
    if ($status == 'Peminjaman') {
        mysqli_query($koneksi, "UPDATE buku SET status = 'Tersedia' WHERE id_buku = '$id_buku'");
    }

    echo "<script>
        alert('Data Transaksi Berhasil Dihapus');
        window.location.assign('?halaman=data_peminjaman');
    </script>";
} else {
    echo "<script>
        alert('Data Transaksi Gagal Dihapus');
        window.location.assign('?halaman=data_peminjaman');
    </script>";
}
?>
