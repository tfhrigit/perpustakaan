<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">
        <i class="bi bi-arrow-left-right text-success me-2"></i> Transaksi Peminjaman
    </h5>
    <a href="?halaman=input_peminjaman" class="btn btn-success px-4 py-2 fw-bold rounded-3 shadow-sm">
        <i class="bi bi-plus-circle-fill me-1"></i> Transaksi Pinjam
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover align-middle border-0">
        <thead>
            <tr class="text-muted small text-uppercase">
                <th class="border-0 pb-3" width="5%">No</th>
                <th class="border-0 pb-3">Peminjam & Buku</th>
                <th class="border-0 pb-3 text-center">Tgl Pinjam</th>
                <th class="border-0 pb-3 text-center">Tgl Kembali</th>
                <th class="border-0 pb-3 text-center">Status</th>
                <th class="border-0 pb-3 text-center" width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  
            include '../koneksi.php';
            $no = 1;
            $query = "SELECT * FROM transaksi 
                      JOIN anggota ON transaksi.id_anggota = anggota.id_anggota 
                      JOIN buku ON transaksi.id_buku = buku.id_buku 
                      ORDER BY id_trasnsaksi DESC";
            $data = mysqli_query($koneksi, $query);

            foreach ($data as $t) {
            ?>
            <tr>
                <td><span class="text-muted fw-medium"><?= $no++ ?></span></td>
                <td>
                    <div class="fw-bold text-dark"><?= $t['nama_anggota'] ?></div>
                    <div class="small text-success fw-medium"><i class="bi bi-book-half me-1"></i> <?= $t['judul_buku'] ?></div>
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
                            <i class="bi bi-clock-history me-1"></i> Dipinjam
                        </span>
                    <?php else: ?>
                        <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill border-0">
                            <i class="bi bi-check-all me-1"></i> Kembali
                        </span>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <?php if($t['status_transaksi'] == 'Peminjaman'): ?>
                        <a href="?halaman=kembalikan_buku&id_transaksi=<?= $t['id_trasnsaksi']; ?>" class="btn btn-outline-success btn-sm border-2 rounded-3 px-2 py-1" title="Kembalikan Buku">
                            <i class="bi bi-arrow-return-left"></i>
                        </a>
                        <?php endif; ?>
                        <a href="?halaman=hapus_peminjaman&id_transaksi=<?= $t['id_trasnsaksi']; ?>" class="btn btn-outline-danger btn-sm border-2 rounded-3 px-2 py-1" onclick="return confirm('Yakin ingin menghapus data transaksi ini?')" title="Hapus">
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
    .bg-warning-subtle { background-color: #fff9db !important; }
    .text-warning-emphasis { color: #856404 !important; }
    .bg-success-subtle { background-color: #e9f5ee !important; }
    .btn-outline-success:hover { color: #fff !important; }
</style>
