-- =====================================================
--  Database  : db_bukutamu
--  Tabel     : buku_tamu
--  Cara import: phpMyAdmin > Import > pilih file ini
--               atau jalankan via terminal MySQL
-- =====================================================

-- 1. Buat database (jika belum ada)
CREATE DATABASE IF NOT EXISTS db_bukutamu;
USE db_bukutamu;

-- 2. Buat tabel buku_tamu
CREATE TABLE IF NOT EXISTS buku_tamu (
    id       INT(11)      NOT NULL AUTO_INCREMENT,
    nama     VARCHAR(100) NOT NULL,
    instansi VARCHAR(100) NOT NULL,
    tujuan   TEXT         NOT NULL,
    tanggal  DATE         NOT NULL,
    waktu    TIME         NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. (Opsional) Data contoh untuk pengujian
INSERT INTO buku_tamu (nama, instansi, tujuan, tanggal, waktu) VALUES
('Budi Santoso',   'SMA Negeri 1 Jakarta',      'Kunjungan studi banding', '2026-06-13', '09:15:00'),
('Siti Nurhaliza', 'Dinas Pendidikan Kota',     'Rapat koordinasi',        '2026-06-13', '10:30:00'),
('Ahmad Fauzi',    'PT Mitra Edukasi',          'Penawaran kerja sama',    '2026-06-13', '11:05:00'),
('Dewi Lestari',   'Universitas Siber Asia',    'Survei lokasi PKL',       '2026-06-13', '13:20:00');
