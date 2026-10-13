<?php
/**
 * Konfigurasi Koneksi Basis Data SIP-KUNCI
 * Mendukung MySQL / MariaDB lokal (Laragon/XAMPP)
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_sip_kunci');

function getDbConnection() {
    try {
         = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
         = new PDO(, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        return ;
    } catch (PDOException ) {
        // Fallback gracefully jika database belum di-import
        return null;
    }
}
