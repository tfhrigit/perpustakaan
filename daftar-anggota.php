<?php  
include 'koneksi.php';

if (isset($_POST['daftar'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM anggota WHERE nis='$nis' OR username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('NIS atau Username sudah terdaftar!'); window.location.assign('daftar-anggota.php');</script>";
    } else {
        $query = mysqli_query($koneksi, "INSERT INTO anggota (nis, nama_anggota, username, password, kelas) VALUES ('$nis', '$nama', '$username', '$password', '$kelas')");
        if ($query) {
            echo "<script>alert('Pendaftaran Berhasil! Silahkan Login'); window.location.assign('login-anggota.php');</script>";
        } else {
            echo "<script>alert('Pendaftaran Gagal!'); window.location.assign('daftar-anggota.php');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Anggota | Perpustakaan Sekolah Digital</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f4f7f6; min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Segoe UI', sans-serif; }
        .register-card { border: none; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.05); background: #ffffff; }
        .btn-register { background: #198754; color: white; padding: 12px; border-radius: 12px; font-weight: 600; width: 100%; transition: 0.3s; border: none; }
        .btn-register:hover { background: #157347; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(25, 135, 84, 0.2); }
        .form-control { border-radius: 10px; padding: 10px 15px; background: #f8f9fa; border: 1px solid #e9ecef; }
        .form-control:focus { background: #ffffff; box-shadow: none; border-color: #198754; }
        .logo-img { max-width: 60px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card register-card p-4 p-md-5">
                <div class="text-center mb-4">
                    <img src="asset/img/logo-smk.png" alt="Logo SMK" class="logo-img">
                    <h4 class="fw-bold text-dark">Pendaftaran Anggota</h4>
                    <p class="text-muted small">Buat akun untuk mengakses koleksi digital</p>
                </div>

                <form method="post">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">NIS (Nomor Induk Siswa)</label>
                        <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS Anda" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">NAMA LENGKAP</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">KELAS</label>
                        <input type="text" name="kelas" class="form-control" placeholder="Contoh: XII RPL 1" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">USERNAME</label>
                        <input type="text" name="username" class="form-control" placeholder="Pilih username" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">PASSWORD</label>
                        <input type="password" name="password" class="form-control" placeholder="Buat password" required>
                    </div>

                    <button type="submit" name="daftar" class="btn btn-register mb-4">Daftar Sekarang</button>
                    
                    <div class="text-center pt-2">
                        <p class="small text-muted">Sudah punya akun? <a href="login-anggota.php" class="text-success fw-bold text-decoration-none">Login di sini</a></p>
                        <hr class="opacity-5 my-4">
                        <a href="index.php" class="text-decoration-none small text-muted"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
