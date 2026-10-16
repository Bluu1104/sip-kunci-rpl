# SIP-KUNCI (Sistem Informasi Peminjaman Kunci Ruangan Kampus)

Proyek Analisis & Perancangan Rekayasa Perangkat Lunak (RPL)  
Program Studi D3 Teknik Komputer — Universitas Duta Bangsa Surakarta

## Identitas Pengembang
- **Nama:** Muhammad Rasya Robi Ahnaf Sandjoyo
- **NIM:** 240104008
- **Kelas:** 24A1 / Semester 5

## Deskripsi Singkat
SIP-KUNCI adalah platform digital manajemen peminjaman kunci fisik ruang kelas teori (Ruang 1 s.d. Ruang 13) di lingkungan kampus Universitas Duta Bangsa (UDB) Surakarta yang terintegrasi antara peminjam (mahasiswa/dosen) dan meja Front Office. Sistem ini menggantikan buku ekspedisi fisik manual guna mengeliminasi bentrok jadwal perkuliahan, kunci hilang/terbawa pulang, dan keterlambatan pengembalian.

## Alur Logika Sistem (Business Logic)
1. **Validasi Anti-Bentrok:** Ruang kelas dengan status DIPINJAM tidak dapat dipilih untuk reservasi sesi baru hingga kunci fisik diserahkan kembali ke meja Front Office.
2. **Pembatasan Durasi:** Mahasiswa dibatasi durasi peminjaman maksimal 4 jam per reservasi guna mencegah monopoli fasilitas ruang kuliah.
3. **Penerbitan Tiket Token:** Sistem menghasilkan token alfanumerik unik (misal TKT-XXXXXX) sebagai tanda bukti verifikasi fisik di meja Front Office.
4. **Kalkulator Overdue:** Keterlambatan pengembalian melebihi toleransi 15 menit otomatis memicu denda Rp5.000 / 30 menit.

## Cakupan Ruangan Studi Kampus UDB
Sistem mengelola sirkulasi kunci untuk 13 unit ruang kelas perkuliahan teori:
- **Lantai 1:** Ruang 1, Ruang 2, Ruang 3, Ruang 4
- **Lantai 2:** Ruang 5, Ruang 6, Ruang 7, Ruang 8
- **Lantai 3:** Ruang 9, Ruang 10, Ruang 11, Ruang 12, Ruang 13

## Kebijakan Sanksi Overdue (Hasil Resolusi)
- Tarif denda disepakati progresif: toleransi 15 menit, selanjutnya Rp 5.000 per 30 menit keterlambatan.
