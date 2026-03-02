<?php  
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $data = mysqli_fetch_array($query);
        $_SESSION['id_anggota'] = $data['id_anggota'];
        $_SESSION['nama_anggota'] = $data['nama_anggota'];
        $_SESSION['nis'] = $data['nis'];

        echo "<script>
            alert('Login Berhasil! Selamat Datang $data[nama_anggota]');
            window.location.assign('anggota/dashboard.php');
        </script>";
    } else {
        echo "<script>
            alert('Login Gagal! Username atau Password Salah');
            window.location.assign('login-anggota.php');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Anggota | Perpustakaan Sekolah Digital</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f4f7f6; min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Segoe UI', sans-serif; }
        .login-card { border: none; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.05); background: #ffffff; }
        .btn-login { background: #198754; color: white; padding: 12px; border-radius: 12px; font-weight: 600; width: 100%; transition: 0.3s; border: none; }
        .btn-login:hover { background: #157347; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(25, 135, 84, 0.2); }
        .form-control { border-radius: 10px; padding: 12px; background: #f8f9fa; border: 1px solid #e9ecef; }
        .form-control:focus { background: #ffffff; box-shadow: none; border-color: #198754; }
        .input-group-text { border-radius: 10px; background: #f8f9fa; border: 1px solid #e9ecef; color: #198754; }
        .logo-img { max-width: 80px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card login-card p-4 p-md-5">
                <div class="text-center mb-4">
                    <img src="asset/img/logo-smk.png" alt="Logo SMK" class="logo-img">
                    <h4 class="fw-bold text-dark">Login Anggota</h4>
                    <p class="text-muted small">Masuk ke ruang baca digital Anda</p>
                </div>

                <form method="post">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">USERNAME / NIS</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">PASSWORD</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                    </div>

                    <button type="submit" name="login" class="btn btn-login mb-4">Masuk Sekarang</button>
                    
                    <div class="text-center mb-3">
                        <p class="small text-muted mb-1">Belum punya akun?</p>
                        <a href="daftar-anggota.php" class="btn btn-outline-success btn-sm w-100 py-2 fw-bold" style="border-radius: 10px;">Daftar Sekarang</a>
                    </div>
                    
                    <div class="text-center pt-2">
                        <a href="index.php" class="text-decoration-none small text-muted"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
