<?php  
session_start();
include '../koneksi.php';

if (empty($_SESSION['id_anggota'])) {
    header("location:../login-anggota.php");
    exit;
}

if (isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];
    $id_anggota = $_SESSION['id_anggota'];
    $query_cek = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_trasnsaksi = '$id_transaksi' AND id_anggota = '$id_anggota'");
    
    if (mysqli_num_rows($query_cek) > 0) {
        $t = mysqli_fetch_array($query_cek);
        $id_buku = $t['id_buku'];
        $status = $t['status_transaksi'];

        $hapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_trasnsaksi = '$id_transaksi'");

        if ($hapus) {
            if ($status == 'Peminjaman') {
                mysqli_query($koneksi, "UPDATE buku SET status = 'Tersedia' WHERE id_buku = '$id_buku'");
            }

            echo "<script>
                alert('Riwayat Berhasil Dihapus');
                window.location.assign('?halaman=history_peminjaman');
            </script>";
        } else {
            echo "<script>
                alert('Gagal menghapus riwayat');
                window.location.assign('?halaman=history_peminjaman');
            </script>";
        }
    } else {
        header("location:?halaman=history_peminjaman");
    }
} else {
    header("location:?halaman=history_peminjaman");
}
?>
