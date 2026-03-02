<?php  
include '../koneksi.php';
$id = $_GET['id_buku'];

$query = "DELETE FROM buku WHERE id_buku = '$id'";
$hapus = mysqli_query($koneksi, $query);

if ($hapus) {
    echo "<script>
        alert('Data Buku Berhasil Dihapus');
        window.location.assign('?halaman=data_buku');
    </script>";
} else {
    echo "<script>
        alert('Data Buku Gagal Dihapus');
        window.location.assign('?halaman=data_buku');
    </script>";
}
?>
