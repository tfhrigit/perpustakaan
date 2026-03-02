<?php  
include '../koneksi.php';
$id_transaksi = $_GET['id_transaksi'];

$query_transaksi = mysqli_query($koneksi, "SELECT id_buku FROM transaksi WHERE id_trasnsaksi = '$id_transaksi'");
$t = mysqli_fetch_array($query_transaksi);
$id_buku = $t['id_buku'];

$update_transaksi = mysqli_query($koneksi, "UPDATE transaksi SET status_transaksi = 'Pengembalian' WHERE id_trasnsaksi = '$id_transaksi'");

if ($update_transaksi) {
    mysqli_query($koneksi, "UPDATE buku SET status = 'Tersedia' WHERE id_buku = '$id_buku'");

    echo "<script>
        alert('Buku Berhasil Dikembalikan');
        window.location.assign('?halaman=data_peminjaman');
    </script>";
} else {
    echo "<script>
        alert('Gagal Mengembalikan Buku');
        window.location.assign('?halaman=data_peminjaman');
    </script>";
}
?>
