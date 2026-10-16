-- ========================================================
-- DDL Schema Basis Data SIP-KUNCI
-- Pengembang: Muhammad Rasya Robi Ahnaf Sandjoyo (240104008)
-- ========================================================

CREATE DATABASE IF NOT EXISTS db_sip_kunci;
USE db_sip_kunci;

-- 1. Tabel Users / Pengguna Sistem
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomor_induk VARCHAR(30) UNIQUE NOT NULL, -- NIM atau NIP
    nama_lengkap VARCHAR(100) NOT NULL,
    peran ENUM('MAHASISWA', 'DOSEN', 'PETUGAS_FO', 'ADMIN_SARPRAS') NOT NULL,
    no_telepon VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Tabel Ruang Kelas (Ruang 1 - Ruang 13)
CREATE TABLE IF NOT EXISTS ruangan (
    id VARCHAR(20) PRIMARY KEY, -- R-01 s.d. R-13
    nama_ruangan VARCHAR(100) NOT NULL,
    gedung VARCHAR(50) NOT NULL,
    lantai INT NOT NULL,
    kapasitas VARCHAR(50) NOT NULL,
    status_ruangan ENUM('AKTIF', 'MAINTENANCE') DEFAULT 'AKTIF'
);

-- 3. Tabel Kunci Fisik Ruangan
CREATE TABLE IF NOT EXISTS kunci (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ruangan_id VARCHAR(20) NOT NULL,
    slot_loker_fo VARCHAR(20) NOT NULL, -- Posisi slot di meja depan
    tag_rfid VARCHAR(50) UNIQUE,        -- Sensor smart cabinet
    status_kunci ENUM('TERSEDIA', 'DIPINJAM', 'HILANG') DEFAULT 'TERSEDIA',
    FOREIGN KEY (ruangan_id) REFERENCES ruangan(id) ON DELETE CASCADE
);

-- 4. Tabel Transaksi Peminjaman
CREATE TABLE IF NOT EXISTS peminjaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    token_tiket VARCHAR(20) UNIQUE NOT NULL,
    user_id INT NOT NULL,
    kunci_id INT NOT NULL,
    jam_pinjam TIME NOT NULL,
    jam_rencana_kembali TIME NOT NULL,
    jam_realisasi_kembali TIME NULL,
    keperluan TEXT NOT NULL,
    status_transaksi ENUM('PENDING', 'AKTIF', 'SELESAI', 'TERLAMBAT') DEFAULT 'PENDING',
    denda_keterlambatan DECIMAL(10,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (kunci_id) REFERENCES kunci(id)
);

-- 5. Tabel Log Audit Aktivitas
CREATE TABLE IF NOT EXISTS log_aktivitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaksi_id INT NULL,
    aksi VARCHAR(100) NOT NULL,
    deskripsi TEXT NOT NULL,
    waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (transaksi_id) REFERENCES peminjaman(id) ON DELETE SET NULL
);
