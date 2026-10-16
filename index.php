<?php
/**
 * ============================================================================
 * SIP-KUNCI: Sistem Informasi Peminjaman Kunci Ruangan Kampus UDB
 * Studi Kasus Rekayasa Perangkat Lunak (RPL) - D3 Teknik Komputer UDB
 * Pengembang : Muhammad Rasya Robi Ahnaf Sandjoyo (NIM: 240104008)
 * ============================================================================
 */

session_start();

// Inisialisasi Data Master Ruang Kelas 1 - 13 Kampus UDB (State Sesi)
if (!isset($_SESSION['rooms']) || count($_SESSION['rooms']) !== 13) {
    $_SESSION['rooms'] = [
        'R-01' => ['id' => 'R-01', 'nama' => 'Ruang 1', 'gedung' => 'Gedung Utama - Lantai 1', 'kapasitas' => '40 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'TERSEDIA', 'peminjam' => null, 'jam_pinjam' => null, 'jam_kembali' => null, 'keperluan' => null, 'token' => null],
        'R-02' => ['id' => 'R-02', 'nama' => 'Ruang 2', 'gedung' => 'Gedung Utama - Lantai 1', 'kapasitas' => '40 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'DIPINJAM', 'peminjam' => 'Doni Kurniawan (240104015)', 'jam_pinjam' => '08:00', 'jam_kembali' => '10:00', 'keperluan' => 'Kuliah Pengganti Matematika Diskrit', 'token' => 'TKT-82914'],
        'R-03' => ['id' => 'R-03', 'nama' => 'Ruang 3', 'gedung' => 'Gedung Utama - Lantai 1', 'kapasitas' => '45 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'TERSEDIA', 'peminjam' => null, 'jam_pinjam' => null, 'jam_kembali' => null, 'keperluan' => null, 'token' => null],
        'R-04' => ['id' => 'R-04', 'nama' => 'Ruang 4', 'gedung' => 'Gedung Utama - Lantai 1', 'kapasitas' => '45 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'TERSEDIA', 'peminjam' => null, 'jam_pinjam' => null, 'jam_kembali' => null, 'keperluan' => null, 'token' => null],
        'R-05' => ['id' => 'R-05', 'nama' => 'Ruang 5', 'gedung' => 'Gedung Utama - Lantai 2', 'kapasitas' => '40 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'TERSEDIA', 'peminjam' => null, 'jam_pinjam' => null, 'jam_kembali' => null, 'keperluan' => null, 'token' => null],
        'R-06' => ['id' => 'R-06', 'nama' => 'Ruang 6', 'gedung' => 'Gedung Utama - Lantai 2', 'kapasitas' => '40 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'TERSEDIA', 'peminjam' => null, 'jam_pinjam' => null, 'jam_kembali' => null, 'keperluan' => null, 'token' => null],
        'R-07' => ['id' => 'R-07', 'nama' => 'Ruang 7', 'gedung' => 'Gedung Utama - Lantai 2', 'kapasitas' => '40 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'DIPINJAM', 'peminjam' => 'Rian Hidayat (240104022)', 'jam_pinjam' => '09:30', 'jam_kembali' => '12:00', 'keperluan' => 'Diskusi Kelompok Pemrograman Jaringan', 'token' => 'TKT-91044'],
        'R-08' => ['id' => 'R-08', 'nama' => 'Ruang 8', 'gedung' => 'Gedung Utama - Lantai 2', 'kapasitas' => '50 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'TERSEDIA', 'peminjam' => null, 'jam_pinjam' => null, 'jam_kembali' => null, 'keperluan' => null, 'token' => null],
        'R-09' => ['id' => 'R-09', 'nama' => 'Ruang 9', 'gedung' => 'Gedung Utama - Lantai 3', 'kapasitas' => '40 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'TERSEDIA', 'peminjam' => null, 'jam_pinjam' => null, 'jam_kembali' => null, 'keperluan' => null, 'token' => null],
        'R-10' => ['id' => 'R-10', 'nama' => 'Ruang 10', 'gedung' => 'Gedung Utama - Lantai 3', 'kapasitas' => '40 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'TERSEDIA', 'peminjam' => null, 'jam_pinjam' => null, 'jam_kembali' => null, 'keperluan' => null, 'token' => null],
        'R-11' => ['id' => 'R-11', 'nama' => 'Ruang 11', 'gedung' => 'Gedung Utama - Lantai 3', 'kapasitas' => '45 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'TERSEDIA', 'peminjam' => null, 'jam_pinjam' => null, 'jam_kembali' => null, 'keperluan' => null, 'token' => null],
        'R-12' => ['id' => 'R-12', 'nama' => 'Ruang 12', 'gedung' => 'Gedung Utama - Lantai 3', 'kapasitas' => '45 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'TERSEDIA', 'peminjam' => null, 'jam_pinjam' => null, 'jam_kembali' => null, 'keperluan' => null, 'token' => null],
        'R-13' => ['id' => 'R-13', 'nama' => 'Ruang 13', 'gedung' => 'Gedung Utama - Lantai 3', 'kapasitas' => '50 Kursi &bull; AC &bull; LCD Proyektor', 'status' => 'TERSEDIA', 'peminjam' => null, 'jam_pinjam' => null, 'jam_kembali' => null, 'keperluan' => null, 'token' => null],
    ];
}

$alert = null;
$alert_type = 'info';
$active_ticket = null;

// Handle Form Submission: Peminjaman Kunci
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'pinjam') {
    $nim = trim($_POST['nim'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $ruangan_id = $_POST['ruangan_id'] ?? '';
    $jam_pinjam = $_POST['jam_pinjam'] ?? '';
    $jam_kembali = $_POST['jam_kembali'] ?? '';
    $keperluan = trim($_POST['keperluan'] ?? '');

    // Validasi Kelengkapan Data
    if (empty($nim) || empty($nama) || empty($ruangan_id) || empty($jam_pinjam) || empty($jam_kembali)) {
        $alert = 'Semua field formulir peminjaman wajib diisi lengkap.';
        $alert_type = 'error';
    } elseif (!isset($_SESSION['rooms'][$ruangan_id])) {
        $alert = 'Ruangan tidak valid atau tidak terdaftar.';
        $alert_type = 'error';
    } elseif ($_SESSION['rooms'][$ruangan_id]['status'] !== 'TERSEDIA') {
        // Logika 1: Validasi Bentrok Status Kunci Fisik
        $cur = $_SESSION['rooms'][$ruangan_id];
        $alert = "Gagal meminjam: Kunci {$cur['nama']} sedang DIPINJAM oleh {$cur['peminjam']} hingga pukul {$cur['jam_kembali']}.";
        $alert_type = 'error';
    } else {
        // Logika 2: Validasi Durasi & Hak Akses
        $t1 = strtotime("2026-10-13 {$jam_pinjam}");
        $t2 = strtotime("2026-10-13 {$jam_kembali}");
        $durasi_jam = ($t2 - $t1) / 3600;

        if ($durasi_jam <= 0) {
            $alert = 'Jam rencana pengembalian harus lebih besar dari jam peminjaman.';
            $alert_type = 'error';
        } elseif ($durasi_jam > 4) {
            $alert = 'Durasi peminjaman melebihi batas reguler mahasiswa (maksimal 4 jam per sesi).';
            $alert_type = 'error';
        } else {
            // Sukses: Terbitkan Tiket & Kunci Status Ruangan
            $token = 'TKT-' . strtoupper(substr(md5(uniqid($nim, true)), 0, 6));
            $_SESSION['rooms'][$ruangan_id]['status'] = 'DIPINJAM';
            $_SESSION['rooms'][$ruangan_id]['peminjam'] = "{$nama} ({$nim})";
            $_SESSION['rooms'][$ruangan_id]['jam_pinjam'] = $jam_pinjam;
            $_SESSION['rooms'][$ruangan_id]['jam_kembali'] = $jam_kembali;
            $_SESSION['rooms'][$ruangan_id]['keperluan'] = $keperluan;
            $_SESSION['rooms'][$ruangan_id]['token'] = $token;

            $active_ticket = [
                'token' => $token,
                'peminjam' => $nama,
                'nim' => $nim,
                'ruangan' => $_SESSION['rooms'][$ruangan_id]['nama'],
                'gedung' => $_SESSION['rooms'][$ruangan_id]['gedung'],
                'durasi' => "{$jam_pinjam} - {$jam_kembali} WIB",
                'keperluan' => $keperluan
            ];

            $alert = "Peminjaman berhasil diajukan! Tiket digital resmi diterbitkan dengan kode token [{$token}]. Silakan ambil kunci fisik di meja Front Office.";
            $alert_type = 'success';
        }
    }
}

// Handle Action: Pengembalian Kunci oleh Petugas Front Office
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'kembali') {
    $ruangan_id = $_POST['ruangan_id'] ?? '';
    if (isset($_SESSION['rooms'][$ruangan_id]) && $_SESSION['rooms'][$ruangan_id]['status'] === 'DIPINJAM') {
        $nama_r = $_SESSION['rooms'][$ruangan_id]['nama'];
        $pem = $_SESSION['rooms'][$ruangan_id]['peminjam'];
        $jam_plan = $_SESSION['rooms'][$ruangan_id]['jam_kembali'];
        
        // Logika 3: Perhitungan Keterlambatan & Sanksi Administratif
        $cur_time = date('H:i'); // Simulasi waktu serah terima
        $t_plan = strtotime("2026-10-13 {$jam_plan}");
        $t_real = strtotime("2026-10-13 11:30"); // Simulasi waktu serah kunci diuji
        $late_min = max(0, round(($t_real - $t_plan) / 60));
        
        $penalty_text = "";
        if ($late_min > 15) {
            $denda = ceil($late_min / 30) * 5000;
            $penalty_text = " Terlambat {$late_min} menit. Dikenakan sanksi denda pemeliharaan fasilitas sebesar Rp " . number_format($denda, 0, ',', '.') . ".";
        }

        $_SESSION['rooms'][$ruangan_id]['status'] = 'TERSEDIA';
        $_SESSION['rooms'][$ruangan_id]['peminjam'] = null;
        $_SESSION['rooms'][$ruangan_id]['jam_pinjam'] = null;
        $_SESSION['rooms'][$ruangan_id]['jam_kembali'] = null;
        $_SESSION['rooms'][$ruangan_id]['keperluan'] = null;
        $_SESSION['rooms'][$ruangan_id]['token'] = null;

        $alert = "Kunci {$nama_r} berhasil diserahkan kembali oleh {$pem}. Status loker kembali TERSEDIA.{$penalty_text}";
        $alert_type = 'success';
    }
}

// Hitung Statistik Dashboard
$total_rooms = count($_SESSION['rooms']);
$available_count = 0;
$borrowed_count = 0;
foreach ($_SESSION['rooms'] as $r) {
    if ($r['status'] === 'TERSEDIA') $available_count++;
    else $borrowed_count++;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIP-KUNCI | Sistem Peminjaman Kunci Ruang Kelas Kampus UDB</title>
    <style>
        :root {
            --bg-base: #090d16;
            --bg-card: #0f172a;
            --bg-card-sub: #1e293b;
            --border-dim: #1e293b;
            --border-glow: #334155;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --accent-green: #10b981;
            --accent-blue: #38bdf8;
            --accent-rose: #f43f5e;
            --accent-amber: #f59e0b;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
        body { background: var(--bg-base); color: var(--text-main); line-height: 1.5; padding: 24px 20px; }
        .container { max-width: 1100px; margin: 0 auto; }

        /* Top Header & Breadcrumbs */
        .topbar {
            background: var(--bg-card);
            border: 1px solid var(--border-dim);
            border-radius: 16px;
            padding: 20px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 24px;
        }
        .brand-title h1 { font-size: 20px; font-weight: 800; letter-spacing: -0.02em; color: #fff; }
        .brand-title p { font-size: 13px; color: var(--text-muted); }
        .author-badge {
            background: rgba(56, 189, 248, 0.1);
            border: 1px solid rgba(56, 189, 248, 0.3);
            border-radius: 10px;
            padding: 8px 14px;
            font-size: 12px;
            text-align: right;
        }
        .author-badge strong { color: var(--accent-blue); display: block; font-size: 13px; }

        /* Bento Stat Cards */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border-dim);
            border-radius: 14px;
            padding: 18px 20px;
        }
        .stat-card .label { font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--text-muted); letter-spacing: 0.5px; }
        .stat-card .value { font-size: 28px; font-weight: 800; margin-top: 4px; font-variant-numeric: tabular-nums; }
        .stat-card.green .value { color: var(--accent-green); }
        .stat-card.rose .value { color: var(--accent-rose); }
        .stat-card.blue .value { color: var(--accent-blue); }

        /* Alert Box */
        .alert {
            padding: 14px 18px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert.success { background: rgba(16, 185, 129, 0.15); border: 1px solid var(--accent-green); color: #34d399; }
        .alert.error { background: rgba(244, 63, 94, 0.15); border: 1px solid var(--accent-rose); color: #fb7185; }

        /* Main Content Grid */
        .main-grid {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }
        @media (max-width: 880px) {
            .main-grid { grid-template-columns: 1fr; }
        }

        /* Form Card */
        .form-card {
            background: var(--bg-card);
            border: 1px solid var(--border-dim);
            border-radius: 16px;
            padding: 22px;
        }
        .form-card h2 { font-size: 16px; font-weight: 700; margin-bottom: 16px; border-bottom: 1px solid var(--border-dim); padding-bottom: 10px; }
        .form-group { margin-bottom: 14px; }
        .form-group label { display: block; font-size: 12px; font-weight: 600; color: var(--text-muted); margin-bottom: 6px; }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 9px 12px;
            background: var(--bg-card-sub);
            border: 1px solid var(--border-dim);
            border-radius: 8px;
            color: var(--text-main);
            font-size: 13px;
            outline: none;
            transition: border 0.2s;
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: var(--accent-blue); }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        .btn-submit {
            width: 100%;
            background: var(--accent-blue);
            color: #04243a;
            border: none;
            padding: 11px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s;
            margin-top: 6px;
        }
        .btn-submit:hover { opacity: 0.9; }

        /* Table Card */
        .table-card {
            background: var(--bg-card);
            border: 1px solid var(--border-dim);
            border-radius: 16px;
            padding: 22px;
            overflow-x: auto;
        }
        .table-card h2 { font-size: 16px; font-weight: 700; margin-bottom: 16px; border-bottom: 1px solid var(--border-dim); padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th { text-align: left; padding: 10px 12px; background: var(--bg-card-sub); color: var(--text-muted); font-weight: 700; text-transform: uppercase; font-size: 11px; }
        td { padding: 12px; border-bottom: 1px solid var(--border-dim); color: #e2e8f0; }
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .badge.available { background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16,185,129,0.3); }
        .badge.borrowed { background: rgba(244, 63, 94, 0.15); color: #fb7185; border: 1px solid rgba(244,63,94,0.3); }
        .btn-return {
            background: rgba(244, 63, 94, 0.2);
            color: #fb7185;
            border: 1px solid var(--accent-rose);
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
        }
        .btn-return:hover { background: var(--accent-rose); color: #fff; }

        /* Ticket Box */
        .ticket-box {
            background: linear-gradient(135deg, rgba(6, 78, 59, 0.5) 0%, rgba(2, 44, 34, 0.7) 100%);
            border: 1px solid var(--accent-green);
            border-radius: 14px;
            padding: 16px;
            margin-top: 16px;
            text-align: center;
        }
        .ticket-code { font-family: monospace; font-size: 20px; font-weight: 800; color: #6ee7b7; letter-spacing: 2px; }

        footer { text-align: center; font-size: 12px; color: var(--text-muted); margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--border-dim); }
    </style>
</head>
<body>

<div class="container">
    <!-- Header Institusi & Author -->
    <header class="topbar">
        <div class="brand-title">
            <h1>🔑 SIP-KUNCI &bull; Console Sistem Kampus UDB</h1>
            <p>Sistem Informasi Manajemen Peminjaman Kunci Fisik Ruang Kelas Teori (Ruang 1 &ndash; Ruang 13)</p>
        </div>
        <div class="author-badge">
            Mahasiswa / Praktikan:
            <strong>M. Rasya Robi A. S. (240104008)</strong>
            <span>D3 Teknik Komputer &bull; RPL 2026 (Semester 5)</span>
        </div>
    </header>

    <!-- Stat Counter -->
    <section class="stat-grid">
        <div class="stat-card blue">
            <div class="label">Total Ruangan Terdata</div>
            <div class="value"><?= $total_rooms ?> Unit</div>
        </div>
        <div class="stat-card green">
            <div class="label">Kunci Tersedia di Front Office</div>
            <div class="value"><?= $available_count ?> Kunci</div>
        </div>
        <div class="stat-card rose">
            <div class="label">Kunci Sedang Dipinjam</div>
            <div class="value"><?= $borrowed_count ?> Kunci</div>
        </div>
    </section>

    <!-- Notification Alert -->
    <?php if ($alert): ?>
        <div class="alert <?= $alert_type ?>">
            <span><?= $alert_type === 'success' ? '✓' : '⚠' ?></span>
            <div><?= htmlspecialchars($alert) ?></div>
        </div>
    <?php endif; ?>

    <!-- Main Workspace -->
    <div class="main-grid">
        <!-- Panel Form Peminjaman -->
        <section class="form-card">
            <h2>📝 Form Reservasi Kunci Ruangan</h2>
            <form method="POST" action="">
                <input type="hidden" name="action" value="pinjam">

                <div class="form-group">
                    <label>NIM Mahasiswa / NIP Dosen</label>
                    <input type="text" name="nim" placeholder="Contoh: 240104008" required value="240104008">
                </div>

                <div class="form-group">
                    <label>Nama Lengkap Peminjam</label>
                    <input type="text" name="nama" placeholder="Contoh: M. Rasya Robi" required value="M. Rasya Robi A. S.">
                </div>

                <div class="form-group">
                    <label>Pilih Ruang Kelas (Ruang 1 &ndash; 13)</label>
                    <select name="ruangan_id" required>
                        <option value="">-- Pilih Ruang Kelas --</option>
                        <?php foreach ($_SESSION['rooms'] as $id => $r): ?>
                            <option value="<?= $id ?>" <?= $r['status'] !== 'TERSEDIA' ? 'disabled' : '' ?>>
                                <?= $r['id'] ?> - <?= $r['nama'] ?> (<?= $r['status'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Jam Pinjam</label>
                        <input type="time" name="jam_pinjam" value="09:00" required>
                    </div>
                    <div class="form-group">
                        <label>Rencana Kembali</label>
                        <input type="time" name="jam_kembali" value="11:30" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Keperluan Pemakaian Ruangan</label>
                    <textarea name="keperluan" rows="2" placeholder="Contoh: Rapat Kerja Pengurus HMPTK" required>Rapat Kerja Koordinasi Pengurus HMPTK</textarea>
                </div>

                <button type="submit" class="btn-submit">🚀 Ajukan Peminjaman Kunci</button>
            </form>

            <?php if ($active_ticket): ?>
                <div class="ticket-box">
                    <div style="font-size: 11px; text-transform: uppercase; color: #a7f3d0; font-weight: 700;">Tiket Serah Terima Front Office</div>
                    <div class="ticket-code"><?= $active_ticket['token'] ?></div>
                    <div style="font-size: 12px; margin-top: 4px;"><?= htmlspecialchars($active_ticket['ruangan']) ?></div>
                    <div style="font-size: 11px; color: #94a3b8;"><?= htmlspecialchars($active_ticket['durasi']) ?></div>
                </div>
            <?php endif; ?>
        </section>

        <!-- Panel Tabel Monitoring Kunci -->
        <section class="table-card">
            <h2>📊 Monitoring Status Kunci & Front Office Handover</h2>
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Ruangan & Fasilitas</th>
                        <th>Status</th>
                        <th>Peminjam Aktif</th>
                        <th>Jadwal Pinjam</th>
                        <th>Aksi FO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['rooms'] as $id => $r): ?>
                        <tr>
                            <td><strong><?= $r['id'] ?></strong></td>
                            <td>
                                <div><strong><?= htmlspecialchars($r['nama']) ?></strong></div>
                                <div style="font-size: 11px; color: var(--text-muted);"><?= htmlspecialchars($r['gedung']) ?> &bull; <?= htmlspecialchars($r['kapasitas']) ?></div>
                            </td>
                            <td>
                                <span class="badge <?= $r['status'] === 'TERSEDIA' ? 'available' : 'borrowed' ?>">
                                    <?= $r['status'] ?>
                                </span>
                            </td>
                            <td>
                                <?= $r['peminjam'] ? htmlspecialchars($r['peminjam']) : '<span style="color:#64748b">-</span>' ?>
                                <?php if ($r['keperluan']): ?>
                                    <div style="font-size: 10px; color: #94a3b8;"><?= htmlspecialchars($r['keperluan']) ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= $r['jam_pinjam'] ? htmlspecialchars($r['jam_pinjam'] . ' - ' . $r['jam_kembali']) : '<span style="color:#64748b">-</span>' ?>
                                <?php if ($r['token']): ?>
                                    <div style="font-size: 10px; color: #38bdf8; font-family: monospace;"><?= $r['token'] ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($r['status'] === 'DIPINJAM'): ?>
                                    <form method="POST" action="" style="display:inline;">
                                        <input type="hidden" name="action" value="kembali">
                                        <input type="hidden" name="ruangan_id" value="<?= $id ?>">
                                        <button type="submit" class="btn-return" title="Klik saat kunci diserahkan ke meja FO">↩ Terima Kunci</button>
                                    </form>
                                <?php else: ?>
                                    <span style="font-size: 11px; color: #10b981;">Siap di Rak</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>

    <footer>
        SIP-KUNCI &bull; Dokumen Tugas Proyek Ujian Tengah Semester (UTS) Rekayasa Perangkat Lunak &bull; Universitas Duta Bangsa Surakarta
    </footer>
</div>

</body>
</html>
