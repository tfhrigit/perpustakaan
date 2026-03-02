<?php  
session_start();
if (empty($_SESSION['id_anggota'])) {
    header("location:../login-anggota.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Dashboard | Perpustakaan Digital</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #198754;
            --secondary-color: #f4f7f6;
            --sidebar-width: 280px;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            background-color: var(--secondary-color);
            font-family: 'Segoe UI', Roboto, sans-serif;
            overflow-x: hidden;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #ffffff;
            border-right: 1px solid rgba(0,0,0,0.05);
            z-index: 1000;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 2rem;
            text-align: center;
        }

        .sidebar-header img {
            max-width: 60px;
            margin-bottom: 1rem;
        }

        .nav-menu {
            padding: 0 1.5rem;
            flex-grow: 1;
        }

        .nav-item {
            margin-bottom: 0.5rem;
            list-style: none;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.8rem 1.2rem;
            color: #6c757d;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-link i {
            font-size: 1.2rem;
            margin-right: 1rem;
        }

        .nav-link:hover, .nav-link.active {
            background: #e9f5ee;
            color: var(--primary-color);
        }

        .nav-link.active {
            background: var(--primary-color);
            color: #ffffff;
        }

        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            min-height: 100vh;
            transition: var(--transition);
        }

        .header-content {
            background: #ffffff;
            padding: 1.2rem 2rem;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--card-shadow);
            border: none;
            min-height: 400px;
        }

        @media (max-width: 992px) {
            .sidebar { left: -100%; }
            .main-content { margin-left: 0; }
            .sidebar.active { left: 0; }
        }
    </style>
</head>
<body>
    <?php
    $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : "";
    ?>

    <div class="sidebar">
        <div class="sidebar-header">
            <img src="../asset/img/logo-smk.png" alt="Logo">
            <h6 class="fw-bold mb-0">Panel Anggota</h6>
            <small class="text-muted">Perpustakaan Digital</small>
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link <?= empty($halaman) ? 'active' : '' ?>">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="?halaman=data_buku" class="nav-link <?= $halaman == 'data_buku' ? 'active' : '' ?>">
                    <i class="bi bi-book-fill"></i>
                    <span>Daftar Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="?halaman=history_peminjaman" class="nav-link <?= $halaman == 'history_peminjaman' ? 'active' : '' ?>">
                    <i class="bi bi-clock-history"></i>
                    <span>Riwayat Pinjam</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <a href="logout.php" class="nav-link text-danger">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="header-content">
            <h5 class="fw-bold mb-0 text-dark">
                <?php
                if(empty($halaman)) echo "Beranda Anggota";
                else if($halaman == 'data_buku') echo "Koleksi Buku";
                else if($halaman == 'history_peminjaman') echo "Riwayat Peminjaman";
                else echo "Panel Anggota";
                ?>
            </h5>
            <div class="d-flex align-items-center">
                <span class="me-3 text-muted small fw-medium"><?= $_SESSION['nama_anggota']; ?></span>
                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="bi bi-person-fill text-white"></i>
                </div>
            </div>
        </div>

        <div class="content-card shadow-sm">
            <?php
            if (file_exists($halaman.".php")) {
                include $halaman.".php";
            } else { 
                include "home.php";
            } ?>
        </div>
    </div>
</body>
</html>
