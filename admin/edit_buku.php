<h5 class="fw-bold mb-4">
    <i class="bi bi-pencil-fill"></i> Edit Data Buku
</h5>

<?php  
include '../koneksi.php';
$id = $_GET['id_buku'];
$query = "SELECT * FROM buku WHERE id_buku = '$id'";
$data = mysqli_query($koneksi, $query);
$buku = mysqli_fetch_array($data);
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">

                <form method="post">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" value="<?= $buku['judul_buku'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" value="<?= $buku['pengarang'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" value="<?= $buku['penerbit'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" value="<?= $buku['tahun_terbit'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="Tersedia" <?= $buku['status'] == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                            <option value="Tidak" <?= $buku['status'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="?halaman=data_buku" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                        <button type="submit" name="update" class="btn btn-success">
                            <i class="bi bi-save"></i> Update
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php  
if (isset($_POST['update'])) {
    $judul_buku   = $_POST['judul_buku'];
    $pengarang    = $_POST['pengarang'];
    $penerbit     = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $status       = $_POST['status'];

    $query = "UPDATE buku SET 
              judul_buku='$judul_buku', 
              pengarang='$pengarang', 
              penerbit='$penerbit', 
              tahun_terbit='$tahun_terbit', 
              status='$status' 
              WHERE id_buku='$id'";

    $data = mysqli_query($koneksi, $query);

    if ($data) {
        echo "<script>
            alert('Data Berhasil Diupdate');
            window.location.assign('?halaman=data_buku');
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Diupdate');
            window.location.assign('?halaman=edit_buku&id_buku=$id');
        </script>";
    }
}
?>
