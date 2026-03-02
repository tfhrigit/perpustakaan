<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">
        <i class="bi bi-people text-success me-2"></i> Manajemen Anggota
    </h5>
    <a href="?halaman=input_anggota" class="btn btn-success px-4 py-2 fw-bold rounded-3 shadow-sm">
        <i class="bi bi-person-plus-fill me-1"></i> Tambah Anggota
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover align-middle border-0">
        <thead>
            <tr class="text-muted small text-uppercase">
                <th class="border-0 pb-3" width="5%">No</th>
                <th class="border-0 pb-3">Informasi Anggota</th>
                <th class="border-0 pb-3">Akses Akun</th>
                <th class="border-0 pb-3">Kelas</th>
                <th class="border-0 pb-3 text-center" width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  
            include '../koneksi.php';
            $no = 1;
            $query = "SELECT * FROM anggota ORDER BY id_anggota DESC";
            $data = mysqli_query($koneksi, $query);

            foreach ($data as $anggota) {
            ?>
            <tr>
                <td><span class="text-muted fw-medium"><?= $no++ ?></span></td>
                <td>
                    <div class="fw-bold text-dark"><?= $anggota['nama_anggota'] ?></div>
                    <div class="small text-muted">NIS: <?= $anggota['nis'] ?></div>
                </td>
                <td>
                    <div class="badge bg-light text-dark border fw-medium px-3 py-2 rounded-3">
                        <i class="bi bi-person-circle me-1 text-success"></i> <?= $anggota['username'] ?>
                    </div>
                </td>
                <td>
                    <span class="fw-bold text-success"><?= $anggota['kelas'] ?></span>
                </td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <a href="?halaman=edit_anggota&id_anggota=<?= $anggota['id_anggota']; ?>" class="btn btn-outline-warning btn-sm border-2 rounded-3 px-2 py-1" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="?halaman=hapus_anggota&id_anggota=<?= $anggota['id_anggota']; ?>" class="btn btn-outline-danger btn-sm border-2 rounded-3 px-2 py-1" onclick="return confirm('Yakin ingin menghapus data anggota ini?')" title="Hapus">
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
    .btn-outline-warning:hover { color: #fff !important; }
</style>
