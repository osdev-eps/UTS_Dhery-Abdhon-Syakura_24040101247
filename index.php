<?php
// index.php — Halaman Formulir Tamu
require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital - Formulir Tamu</title>
    <!-- Bootstrap 5 via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="bi bi-journal-text"></i> Buku Tamu Digital
            </a>
            <div class="d-flex gap-2">
                <a href="index.php" class="btn btn-light btn-sm">
                    <i class="bi bi-pencil-square"></i> Isi Tamu
                </a>
                <a href="daftar.php" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-list-ul"></i> Daftar Tamu
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">

                <?php if (isset($_GET['status']) && $_GET['status'] == 'gagal') : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-x-circle"></i> Maaf, data gagal disimpan. Silakan coba lagi.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="card shadow border-0">
                    <div class="card-header bg-white border-bottom py-3">
                        <h4 class="mb-0 text-primary fw-bold">
                            <i class="bi bi-person-plus"></i> Formulir Tamu
                        </h4>
                        <small class="text-muted">Silakan isi data kunjungan Anda</small>
                    </div>
                    <div class="card-body p-4">
                        <!-- Form dikirim ke proses.php menggunakan metode POST -->
                        <form action="proses.php" method="POST">

                            <div class="mb-3">
                                <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                       placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="mb-3">
                                <label for="instansi" class="form-label fw-semibold">Instansi / Asal</label>
                                <input type="text" class="form-control" id="instansi" name="instansi"
                                       placeholder="Contoh: SMA Negeri 1 Jakarta" required>
                            </div>

                            <div class="mb-3">
                                <label for="tujuan" class="form-label fw-semibold">Tujuan Kedatangan</label>
                                <textarea class="form-control" id="tujuan" name="tujuan" rows="3"
                                          placeholder="Jelaskan tujuan kedatangan Anda" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tanggal &amp; Waktu Kedatangan</label>
                                <input type="text" class="form-control"
                                       value="<?= date('d-m-Y H:i:s') ?> WIB" disabled>
                                <small class="text-muted">
                                    <i class="bi bi-info-circle"></i> Diisi otomatis oleh sistem saat data disimpan.
                                </small>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-send"></i> Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-3 small">
                    &copy; <?= date('Y') ?> Buku Tamu Digital Sekolah
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
