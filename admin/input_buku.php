<h5 class="fw-bold mb-4">
    <i class="bi bi-plus-circle"></i> Tambah Data Buku
</h5>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">

                <form method="post">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" placeholder="Masukkan judul buku" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" placeholder="Nama pengarang" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" placeholder="Nama penerbit" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" placeholder="Contoh: 2024" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="?halaman=data_buku" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                        <button type="submit" name="tombol" class="btn btn-success">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<?php  
if (isset($_POST['tombol'])) {

    $judul_buku   = $_POST['judul_buku'];
    $pengarang    = $_POST['pengarang'];
    $penerbit     = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    include '../koneksi.php';

    $query = "INSERT INTO buku 
    (judul_buku, pengarang, penerbit, tahun_terbit, status) 
    VALUES 
    ('$judul_buku','$pengarang','$penerbit','$tahun_terbit','tersedia')";

    $data = mysqli_query($koneksi, $query);

    if ($data) {
        echo "<script>
            alert('Data Berhasil Disimpan');
            window.location.assign('?halaman=data_buku');
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Disimpan');
            window.location.assign('?halaman=input_buku');
        </script>";
    }
}
?>