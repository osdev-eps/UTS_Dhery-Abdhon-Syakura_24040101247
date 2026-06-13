# Buku Tamu Digital Sekolah

Aplikasi web sederhana untuk mencatat tamu yang datang ke sekolah.
Dibangun menggunakan **PHP**, **MySQL (mysqli)**, dan **Bootstrap 5**.

---

## ✨ Fitur
- Formulir pengisian tamu (Nama, Instansi, Tujuan, Tanggal & Waktu otomatis)
- Penyimpanan data ke database MySQL
- Halaman daftar tamu dengan tabel Bootstrap (`table-striped`, `table-hover`)
- Fitur pencarian berdasarkan nama atau instansi
- Tampilan responsif dan rapi

---

## 📁 Struktur File
```
buku-tamu-digital/
├── koneksi.php        # Konfigurasi koneksi database (mysqli)
├── index.php          # Halaman formulir tamu
├── proses.php         # Memproses & menyimpan data ke database
├── daftar.php         # Halaman daftar tamu + pencarian
├── db_bukutamu.sql    # Struktur database & tabel + data contoh
└── README.md          # Petunjuk penggunaan
```

---

## 🗄️ Struktur Database
**Database:** `db_bukutamu`
**Tabel:** `buku_tamu`

| Kolom    | Tipe Data    | Keterangan                |
|----------|--------------|---------------------------|
| id       | INT          | Primary key, AUTO_INCREMENT |
| nama     | VARCHAR(100) | Nama lengkap tamu         |
| instansi | VARCHAR(100) | Asal instansi             |
| tujuan   | TEXT         | Tujuan kedatangan         |
| tanggal  | DATE         | Tanggal datang (otomatis) |
| waktu    | TIME         | Jam datang (otomatis)     |

---

## 🚀 Cara Menjalankan (XAMPP)

1. **Pasang & jalankan XAMPP**, aktifkan modul **Apache** dan **MySQL**.
2. **Salin folder** `buku-tamu-digital` ke dalam folder `htdocs`
   (biasanya: `C:\xampp\htdocs\buku-tamu-digital`).
3. **Buat database:**
   - Buka `http://localhost/phpmyadmin`
   - Klik tab **Import** → pilih file `db_bukutamu.sql` → klik **Go**
   - (Database `db_bukutamu` dan tabel `buku_tamu` akan otomatis dibuat)
4. **Buka aplikasi** di browser:
   - Formulir tamu : `http://localhost/buku-tamu-digital/index.php`
   - Daftar tamu   : `http://localhost/buku-tamu-digital/daftar.php`

> Jika password MySQL Anda tidak kosong, ubah variabel `$pass` di file `koneksi.php`.

---

## 🔐 Catatan Keamanan
Penyimpanan dan pencarian data menggunakan **prepared statement** (`mysqli_prepare`)
untuk mencegah SQL Injection, dan output ditampilkan dengan `htmlspecialchars()`
untuk mencegah XSS.
