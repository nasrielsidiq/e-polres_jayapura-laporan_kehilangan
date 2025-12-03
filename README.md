# Sistem Laporan Kehilangan (e-Polres)

Aplikasi web untuk melaporkan dan mengelola laporan kehilangan barang berbasis Laravel dengan sistem autentikasi menggunakan nomor HP.

## Tentang Aplikasi

Sistem Laporan Kehilangan adalah platform digital yang memungkinkan masyarakat untuk melaporkan kehilangan barang secara online dan memudahkan petugas kepolisian dalam mengelola laporan tersebut.

## Fitur Utama

### 🔐 Autentikasi
- Login menggunakan nomor HP dan password
- Registrasi dengan nomor HP (wajib) dan email (opsional)
- Multi-role: Admin, Petugas, Pelapor

### 📋 Manajemen Laporan
- **Pelapor**: Buat laporan kehilangan, upload lampiran, cek status
- **Admin/Petugas**: Verifikasi laporan, update status, cetak surat
- Status laporan: Submitted → Verified → Processing → Done/Rejected

### 🏷️ Kategori Barang
- Manajemen kategori barang hilang
- Klasifikasi laporan berdasarkan jenis barang

### 👥 Manajemen User
- CRUD pelapor dan petugas
- Role-based access control
- Status aktif/blokir user

### 📊 Dashboard & Laporan
- Dashboard statistik untuk admin
- Riwayat laporan untuk pelapor
- Arsip laporan yang sudah selesai

### 🖨️ Cetak Dokumen
- Cetak surat keterangan kehilangan
- Export laporan dalam format PDF

## Instalasi

### Persyaratan Sistem
- PHP >= 8.1
- Composer
- MySQL/PostgreSQL
- Node.js & NPM

### Langkah Instalasi

1. **Clone Repository**
```bash
git clone <repository-url>
cd LaporanKehilangan
```

2. **Install Dependencies**
```bash
composer install
npm install
```

3. **Environment Setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Database Configuration**
Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laporan_kehilangan
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. **Database Migration & Seeding**
```bash
php artisan migrate
php artisan db:seed
```

6. **Build Assets**
```bash
npm run build
```

7. **Storage Link**
```bash
php artisan storage:link
```

8. **Run Application**
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## Default Users

Setelah seeding, gunakan akun berikut untuk login:

| Role | Nomor HP | Password | Email |
|------|----------|----------|-------|
| Admin | 081234567890 | password | admin@example.com |
| Petugas | 081234567891 | password | petugas@example.com |
| Pelapor | 081234567892 | password | pelapor@example.com |

## Struktur Database

### Tabel Utama
- `users` - Data pengguna dengan autentikasi nomor HP
- `laporan_kehilangans` - Data laporan kehilangan
- `kategori_barangs` - Kategori barang hilang
- `riwayat_proses` - Log perubahan status laporan
- `media` - File lampiran laporan

## Teknologi

- **Backend**: Laravel 10
- **Frontend**: Blade Templates, Tailwind CSS
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Breeze (modified for phone-based auth)
- **Authorization**: Spatie Laravel Permission
- **File Upload**: Spatie Laravel Media Library
- **PDF Generation**: DomPDF

## Kontribusi

1. Fork repository
2. Buat branch fitur (`git checkout -b feature/nama-fitur`)
3. Commit perubahan (`git commit -am 'Tambah fitur'`)
4. Push ke branch (`git push origin feature/nama-fitur`)
5. Buat Pull Request

## Lisensi

Aplikasi ini menggunakan lisensi MIT. Lihat file [LICENSE](LICENSE) untuk detail.

## Support

Untuk bantuan atau pertanyaan, silakan buat issue di repository ini atau hubungi tim pengembang.