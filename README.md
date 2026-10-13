# SIP-KUNCI (Sistem Informasi Peminjaman Kunci Ruangan Kampus)

Proyek Analisis & Perancangan Rekayasa Perangkat Lunak (RPL)  
Program Studi D3 Teknik Komputer — Universitas Duta Bangsa Surakarta

## Identitas Pengembang
- **Nama:** Muhammad Rasya Robi Ahnaf Sandjoyo
- **NIM:** 240104008
- **Kelas:** 24A1 / Semester 3

## Deskripsi Singkat
SIP-KUNCI adalah platform digital manajemen peminjaman kunci ruang kelas, laboratorium komputer, dan ruang pertemuan kampus yang terintegrasi antara peminjam (mahasiswa/dosen) dan meja Front Office. Sistem ini menggantikan buku ekspedisi fisik manual guna mengeliminasi bentrok jadwal, kunci hilang, dan keterlambatan pengembalian.

## Alur Logika Sistem (Business Logic)
1. **Validasi Anti-Bentrok:** Ruangan dengan status  tidak dapat dipilih untuk reservasi sesi baru hingga kunci diserahkan kembali ke Front Office.
2. **Pembatasan Durasi:** Mahasiswa dibatasi durasi peminjaman maksimal 4 jam per reservasi guna mencegah monopoli fasilitas lab.
3. **Penerbitan Tiket Token:** Sistem menghasilkan token alfanumerik unik (misal ) sebagai tanda bukti verifikasi fisik di meja Front Office.
4. **Kalkulator Overdue:** Keterlambatan pengembalian melebihi toleransi 15 menit otomatis memicu denda Rp5.000 / 30 menit.

## Kebijakan Sanksi Overdue (Branch Main)
- Tarif denda diatur progresif Rp 5.000 per 30 menit keterlambatan.
