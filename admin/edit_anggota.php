<?php  
include '../koneksi.php';
$id = $_GET['id_anggota'];
$query = "SELECT * FROM anggota WHERE id_anggota = '$id'";
$data = mysqli_query($koneksi, $query);
$anggota = mysqli_fetch_array($data);
?>

<h5 class="fw-bold mb-4">
    <i class="bi bi-pencil-square"></i> Edit Data Anggota
</h5>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">

                <form method="post">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">NIS</label>
                        <input type="text" name="nis" class="form-control" value="<?= $anggota['nis'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Anggota</label>
                        <input type="text" name="nama_anggota" class="form-control" value="<?= $anggota['nama_anggota'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Username</label>
                        <input type="text" name="username_anggota" class="form-control" value="<?= $anggota['username'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password_anggota" class="form-control" value="<?= $anggota['password'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kelas</label>
                        <input type="text" name="kelas" class="form-control" value="<?= $anggota['kelas'] ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="?halaman=data_anggota" class="btn btn-secondary">
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
    $nis = $_POST['nis'];
    $nama = $_POST['nama_anggota'];
    $user = $_POST['username_anggota'];
    $pass = $_POST['password_anggota'];
    $kelas = $_POST['kelas'];

    $query = "UPDATE anggota SET nis='$nis', nama_anggota='$nama', username='$user', password='$pass', kelas='$kelas' WHERE id_anggota='$id'";
    $update = mysqli_query($koneksi, $query);

    if ($update) {
        echo "<script>
            alert('Data Anggota Berhasil Diupdate');
            window.location.assign('?halaman=data_anggota');
        </script>";
    } else {
        echo "<script>
            alert('Data Anggota Gagal Diupdate');
            window.location.assign('?halaman=edit_anggota&id_anggota=$id');
        </script>";
    }
}
?>
