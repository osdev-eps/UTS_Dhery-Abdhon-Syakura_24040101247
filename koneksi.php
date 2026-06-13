<?php
/**
 * koneksi.php
 * Konfigurasi koneksi database menggunakan ekstensi mysqli.
 * File ini dipisah agar bisa di-include di file lain (index, proses, daftar).
 */

// ---- Konfigurasi database ----
$host = "localhost";       // server database (XAMPP/Laragon = localhost)
$user = "root";            // username default MySQL di XAMPP
$pass = "";                // password default XAMPP kosong
$nama_db = "db_bukutamu";  // nama database

// ---- Membuat koneksi ----
$koneksi = mysqli_connect($host, $user, $pass, $nama_db);

// ---- Cek koneksi ----
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// ---- Atur zona waktu agar tanggal & waktu sesuai WIB ----
date_default_timezone_set("Asia/Jakarta");
