<?php
/**
 * proses.php
 * Menerima data dari formulir (index.php) lalu menyimpannya ke tabel buku_tamu.
 */
require_once "koneksi.php";

// Pastikan hanya menerima request POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Ambil & bersihkan data dari form
    $nama     = trim($_POST["nama"]);
    $instansi = trim($_POST["instansi"]);
    $tujuan   = trim($_POST["tujuan"]);

    // Tanggal & waktu diisi otomatis oleh sistem
    $tanggal = date("Y-m-d");   // format DATE  -> 2026-06-13
    $waktu   = date("H:i:s");   // format TIME  -> 14:30:05

    // Gunakan prepared statement untuk mencegah SQL Injection
    $query = "INSERT INTO buku_tamu (nama, instansi, tujuan, tanggal, waktu)
              VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $nama, $instansi, $tujuan, $tanggal, $waktu);

    if (mysqli_stmt_execute($stmt)) {
        // Berhasil -> arahkan ke halaman daftar tamu
        header("Location: daftar.php?status=sukses");
    } else {
        // Gagal -> kembali ke form
        header("Location: index.php?status=gagal");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    exit;

} else {
    // Jika diakses langsung tanpa submit form
    header("Location: index.php");
    exit;
}
