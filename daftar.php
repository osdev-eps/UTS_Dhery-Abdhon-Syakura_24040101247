<?php
// daftar.php — Halaman Daftar Tamu
require_once "koneksi.php";

// Ambil kata kunci pencarian (opsional)
$cari = isset($_GET['cari']) ? trim($_GET['cari']) : "";

if ($cari !== "") {
    // Pencarian berdasarkan nama ATAU instansi
    $query = "SELECT * FROM buku_tamu
              WHERE nama LIKE ? OR instansi LIKE ?
              ORDER BY id DESC";
    $stmt = mysqli_prepare($koneksi, $query);
    $key = "%" . $cari . "%";
    mysqli_stmt_bind_param($stmt, "ss", $key, $key);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    // Tampilkan semua data
    $result = mysqli_query($koneksi, "SELECT * FROM buku_tamu ORDER BY id DESC");
}

$jumlah = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital - Daftar Tamu</title>
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
                <a href="index.php" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-pencil-square"></i> Isi Tamu
                </a>
                <a href="daftar.php" class="btn btn-light btn-sm">
                    <i class="bi bi-list-ul"></i> Daftar Tamu
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-5">

        <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses') : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> Data tamu berhasil disimpan. Terima kasih!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow border-0">
            <div class="card-header bg-white border-bottom py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
                <h4 class="mb-0 text-primary fw-bold">
                    <i class="bi bi-people-fill"></i> Daftar Tamu
                    <span class="badge bg-primary ms-1"><?= $jumlah ?></span>
                </h4>

                <!-- Form pencarian -->
                <form class="d-flex" method="GET" action="daftar.php">
                    <input class="form-control me-2" type="search" name="cari"
                           placeholder="Cari nama / instansi..."
                           value="<?= htmlspecialchars($cari) ?>">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                    <?php if ($cari !== "") : ?>
                        <a href="daftar.php" class="btn btn-outline-secondary ms-2">Reset</a>
                    <?php endif; ?>
                </form>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Lengkap</th>
                                <th>Instansi</th>
                                <th>Tujuan Kedatangan</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($jumlah > 0) : ?>
                                <?php $no = 1; ?>
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($row['nama']) ?></td>
                                        <td><?= htmlspecialchars($row['instansi']) ?></td>
                                        <td><?= htmlspecialchars($row['tujuan']) ?></td>
                                        <td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
                                        <td><?= htmlspecialchars($row['waktu']) ?> WIB</td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox"></i>
                                        <?= $cari !== "" ? "Tidak ada data yang cocok dengan pencarian." : "Belum ada data tamu." ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <p class="text-center text-muted mt-3 small">
            &copy; <?= date('Y') ?> Buku Tamu Digital Sekolah
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php mysqli_close($koneksi); ?>
