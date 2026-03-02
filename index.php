<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang | Perpustakaan Sekolah Digital</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { 
            background-color: #f4f7f6;
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }
        .main-card { 
            border: none; 
            border-radius: 24px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.08); 
            background: #ffffff; 
            width: 100%;
            max-width: 650px;
            transition: all 0.3s ease;
        }
        .welcome-title { color: #2d3436; font-weight: 800; }
        .btn-option { 
            padding: 20px; 
            border-radius: 16px; 
            font-weight: 600; 
            transition: all 0.3s ease; 
            text-align: left;
            display: flex;
            align-items: center;
            border: 2px solid #f1f3f5;
            background: #f8f9fa;
            color: #495057;
        }
        .btn-option:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            border-color: #198754;
            background: #ffffff;
        }
        .btn-anggota:hover { color: #198754; }
        .btn-admin:hover { color: #198754; }
        
        .icon-box { 
            width: 55px; 
            height: 55px; 
            border-radius: 12px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            margin-right: 20px;
            font-size: 1.8rem;
            background: #e9f5ee;
            color: #198754;
        }
        .logo-img {
            max-width: 120px;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>

<div class="container p-3 d-flex justify-content-center">
    <div class="card main-card p-4 p-md-5">
        <div class="text-center mb-5">
            <img src="asset/img/logo-smk.png" alt="Logo SMK" class="logo-img">
            <h2 class="welcome-title">Perpustakaan Sekolah Digital</h2>
            <p class="text-muted">Akses Literasi Digital Smk Karya Bhakti Brebes</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <a href="login-anggota.php" class="btn btn-option btn-anggota w-100 text-decoration-none">
                    <div class="icon-box">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <div class="small text-uppercase tracking-wider opacity-75 fw-bold">Masuk Sebagai</div>
                        <div class="fs-5">ANGGOTA</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="login-admin.php" class="btn btn-option btn-admin w-100 text-decoration-none">
                    <div class="icon-box">
                        <i class="bi bi-shield-lock-fill"></i>
                    </div>
                    <div>
                        <div class="small text-uppercase tracking-wider opacity-75 fw-bold">Kelola</div>
                        <div class="fs-5">ADMIN</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="text-center mt-5">
            <hr class="mb-4 opacity-5">
            <p class="small text-muted mb-0">© 2026 RPL | SMK Karya Bhakti Brebes.</p>
        </div>
    </div>
</div>

</body>
</html>
