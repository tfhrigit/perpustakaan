<div class="welcome-badge" style="background: #e9f5ee; color: #198754; padding: 8px 16px; border-radius: 100px; font-weight: 600; font-size: 0.85rem; display: inline-block; margin-bottom: 1rem;">SELAMAT DATANG</div>
<h2 class="fw-bold mb-3 text-dark">Halo, <?= $_SESSION['nama_anggota']; ?>!</h2>
<p class="text-muted fs-5 mb-4" style="max-width: 600px; line-height: 1.7;">
    Selamat datang di perpustakaan digital. Silahkan jelajahi koleksi buku kami dan pantau riwayat peminjaman Anda dengan mudah.
</p>

<div class="row g-4 mt-2">
    <div class="col-md-6">
        <a href="?halaman=data_buku" class="text-decoration-none">
            <div class="p-4 rounded-4 bg-light border-0 card h-100 shadow-sm hover-card">
                <i class="bi bi-book-half text-success fs-1 mb-3"></i>
                <h5 class="fw-bold text-dark">Jelajah Buku</h5>
                <p class="small text-muted mb-0">Temukan berbagai literasi menarik yang tersedia di perpustakaan kami.</p>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="?halaman=history_peminjaman" class="text-decoration-none">
            <div class="p-4 rounded-4 bg-light border-0 card h-100 shadow-sm hover-card">
                <i class="bi bi-clock-history text-success fs-1 mb-3"></i>
                <h5 class="fw-bold text-dark">Riwayat Pinjam</h5>
                <p class="small text-muted mb-0">Cek status buku yang sedang Anda pinjam dan riwayat pengembalian.</p>
            </div>
        </a>
    </div>
</div>

<style>
    .hover-card { transition: all 0.3s ease; }
    .hover-card:hover { transform: translateY(-5px); background: #ffffff !important; border: 1px solid #e9f5ee !important; }
</style>
