<h5 class="fw-bold mb-4">
    <i class="bi bi-plus-circle"></i> Tambah Transaksi Peminjaman
</h5>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">

                <form method="post">
                    <?php include '../koneksi.php'; ?>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilih Anggota</label>
                        <select name="id_anggota" class="form-select" required>
                            <option value="">-- Pilih Anggota --</option>
                            <?php 
                            $anggota = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY nama_anggota ASC");
                            while($a = mysqli_fetch_array($anggota)): ?>
                                <option value="<?= $a['id_anggota'] ?>"><?= $a['nis'] ?> - <?= $a['nama_anggota'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilih Buku</label>
                        <select name="id_buku" class="form-select" required>
                            <option value="">-- Pilih Buku (Tersedia) --</option>
                            <?php 
                            $buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE status='Tersedia' ORDER BY judul_buku ASC");
                            while($b = mysqli_fetch_array($buku)): ?>
                                <option value="<?= $b['id_buku'] ?>"><?= $b['judul_buku'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control" value="<?= date('Y-m-d') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control" value="<?= date('Y-m-d', strtotime('+7 days')) ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="?halaman=data_peminjaman" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                        <button type="submit" name="simpan" class="btn btn-success">
                            <i class="bi bi-save"></i> Simpan Transaksi
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php  
if (isset($_POST['simpan'])) {
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $query = "INSERT INTO transaksi (id_anggota, id_buku, tgl_pinjam, tgl_kembali, status_transaksi) 
              VALUES ('$id_anggota', '$id_buku', '$tgl_pinjam', '$tgl_kembali', 'Peminjaman')";
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        mysqli_query($koneksi, "UPDATE buku SET status='Tidak' WHERE id_buku='$id_buku'");

        echo "<script>
            alert('Transaksi Peminjaman Berhasil');
            window.location.assign('?halaman=data_peminjaman');
        </script>";
    } else {
        echo "<script>
            alert('Transaksi Gagal');
            window.location.assign('?halaman=input_peminjaman');
        </script>";
    }
}
?>
