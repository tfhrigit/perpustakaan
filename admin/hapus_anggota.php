<?php  
include '../koneksi.php';
$id = $_GET['id_anggota'];

$query = "DELETE FROM anggota WHERE id_anggota = '$id'";
$hapus = mysqli_query($koneksi, $query);

if ($hapus) {
    echo "<script>
        alert('Data Anggota Berhasil Dihapus');
        window.location.assign('?halaman=data_anggota');
    </script>";
} else {
    echo "<script>
        alert('Data Anggota Gagal Dihapus');
        window.location.assign('?halaman=data_anggota');
    </script>";
}
?>
