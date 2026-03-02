<?php  
include '../koneksi.php';

if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];
    $id_anggota = $_SESSION['id_anggota'];
    $tgl_pinjam = date('Y-m-d');
    $tgl_kembali = date('Y-m-d', strtotime('+5 days'));

    $cek_buku = mysqli_query($koneksi, "SELECT status FROM buku WHERE id_buku = '$id_buku'");
    $b = mysqli_fetch_array($cek_buku);

    if ($b['status'] == 'Tersedia') {
        $query = "INSERT INTO transaksi (id_anggota, id_buku, tgl_pinjam, tgl_kembali, status_transaksi) 
                  VALUES ('$id_anggota', '$id_buku', '$tgl_pinjam', '$tgl_kembali', 'Peminjaman')";
        $simpan = mysqli_query($koneksi, $query);

        if ($simpan) {

            mysqli_query($koneksi, "UPDATE buku SET status='Tidak' WHERE id_buku='$id_buku'");

            echo "<script>
                alert('Berhasil meminjam buku! Silahkan ambil buku di perpustakaan.');
                window.location.assign('?halaman=history_peminjaman');
            </script>";
        } else {
            echo "<script>
                alert('Gagal melakukan peminjaman. Silahkan coba lagi.');
                window.location.assign('?halaman=data_buku');
            </script>";
        }
    } else {
        echo "<script>
            alert('Maaf, buku ini baru saja dipinjam oleh orang lain.');
            window.location.assign('?halaman=data_buku');
        </script>";
    }
} else {
    header("location:?halaman=data_buku");
}
?>
