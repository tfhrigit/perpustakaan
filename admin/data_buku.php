<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">
        <i class="bi bi-book text-success me-2"></i> Daftar Koleksi Buku
    </h5>
    <a href="?halaman=input_buku" class="btn btn-success px-4 py-2 fw-bold rounded-3 shadow-sm">
        <i class="bi bi-plus-lg me-1"></i> Tambah Buku
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover align-middle border-0">
        <thead>
            <tr class="text-muted small text-uppercase">
                <th class="border-0 pb-3" width="5%">No</th>
                <th class="border-0 pb-3">Informasi Buku</th>
                <th class="border-0 pb-3">Penerbit & Tahun</th>
                <th class="border-0 pb-3">Status</th>
                <th class="border-0 pb-3 text-center" width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  
            include '../koneksi.php';
            $no = 1;
            $query = "SELECT * FROM buku ORDER BY id_buku DESC";
            $data = mysqli_query($koneksi, $query);

            foreach ($data as $buku) {
            ?>
            <tr>
                <td><span class="text-muted fw-medium"><?= $no++ ?></span></td>
                <td>
                    <div class="fw-bold text-dark"><?= $buku['judul_buku'] ?></div>
                    <div class="small text-muted"><?= $buku['pengarang'] ?></div>
                </td>
                <td>
                    <div class="small fw-medium text-dark"><?= $buku['penerbit'] ?></div>
                    <div class="small text-muted"><?= $buku['tahun_terbit'] ?></div>
                </td>
                <td>
                    <?php if($buku['status'] == 'Tersedia'): ?>
                        <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill border-0">
                            <i class="bi bi-check-circle-fill me-1"></i> Tersedia
                        </span>
                    <?php else: ?>
                        <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill border-0">
                            <i class="bi bi-x-circle-fill me-1"></i> Dipinjam
                        </span>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <a href="?halaman=edit_buku&id_buku=<?= $buku['id_buku']; ?>" class="btn btn-outline-warning btn-sm border-2 rounded-3 px-2 py-1" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="?halaman=hapus_buku&id_buku=<?= $buku['id_buku']; ?>" class="btn btn-outline-danger btn-sm border-2 rounded-3 px-2 py-1" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<style>
    .table thead th { font-weight: 700; letter-spacing: 0.5px; }
    .table tbody tr { transition: all 0.2s; border-bottom: 1px solid #f8f9fa; }
    .table tbody tr:hover { background-color: #fcfdfd; }
    .bg-success-subtle { background-color: #e9f5ee !important; }
    .bg-secondary-subtle { background-color: #f8f9fa !important; }
    .btn-outline-warning:hover { color: #fff !important; }
</style>