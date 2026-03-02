<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">
        <i class="bi bi-clock-history text-success me-2"></i> Riwayat Peminjaman Saya
    </h5>
</div>

<div class="table-responsive">
    <table class="table table-hover align-middle border-0">
        <thead>
            <tr class="text-muted small text-uppercase">
                <th class="border-0 pb-3" width="5%">No</th>
                <th class="border-0 pb-3">Informasi Buku</th>
                <th class="border-0 pb-3 text-center">Tgl Pinjam</th>
                <th class="border-0 pb-3 text-center">Batas Kembali</th>
                <th class="border-0 pb-3 text-center">Status</th>
                <th class="border-0 pb-3 text-center" width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  
            include '../koneksi.php';
            $id_anggota = $_SESSION['id_anggota'];
            $no = 1;
            $query = "SELECT * FROM transaksi 
                      JOIN buku ON transaksi.id_buku = buku.id_buku 
                      WHERE id_anggota = '$id_anggota'
                      ORDER BY id_trasnsaksi DESC";
            $data = mysqli_query($koneksi, $query);

            if(mysqli_num_rows($data) > 0) {
                foreach ($data as $t) {
                ?>
                <tr>
                    <td><span class="text-muted fw-medium"><?= $no++ ?></span></td>
                    <td>
                        <div class="fw-bold text-dark"><?= $t['judul_buku'] ?></div>
                        <div class="small text-muted"><?= $t['pengarang'] ?></div>
                    </td>
                    <td class="text-center">
                        <div class="small fw-medium text-dark"><?= date('d M Y', strtotime($t['tgl_pinjam'])) ?></div>
                    </td>
                    <td class="text-center">
                        <div class="small fw-medium text-dark"><?= date('d M Y', strtotime($t['tgl_kembali'])) ?></div>
                    </td>
                    <td class="text-center">
                        <?php if($t['status_transaksi'] == 'Peminjaman'): ?>
                            <span class="badge bg-warning-subtle text-warning-emphasis px-3 py-2 rounded-pill border-0">
                                <i class="bi bi-clock-history me-1"></i> Sedang Dipinjam
                            </span>
                        <?php else: ?>
                            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill border-0">
                                <i class="bi bi-check-all me-1"></i> Sudah Kembali
                            </span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="?halaman=hapus_peminjaman&id_transaksi=<?= $t['id_trasnsaksi']; ?>" class="btn btn-outline-danger btn-sm border-0 rounded-3 px-2 py-1" onclick="return confirm('Hapus riwayat peminjaman ini?')" title="Hapus Riwayat">
                            <i class="bi bi-trash3"></i>
                        </a>
                    </td>
                </tr>
                <?php 
                } 
            } else {
                echo "<tr><td colspan='6' class='text-center text-muted py-5 fw-medium italic'>Belum ada riwayat peminjaman</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<style>
    .table thead th { font-weight: 700; letter-spacing: 0.5px; }
    .table tbody tr { transition: all 0.2s; border-bottom: 1px solid #f8f9fa; }
    .table tbody tr:hover { background-color: #fcfdfd; }
    .bg-warning-subtle { background-color: #fff9db !important; }
    .text-warning-emphasis { color: #856404 !important; }
    .bg-success-subtle { background-color: #e9f5ee !important; }
</style>
