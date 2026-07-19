# Aplikasi Web Mini — CRUD Artikel & Validasi Form (CodeIgniter 4)

Aplikasi admin panel untuk mengelola artikel (CRUD) dan feedback pengguna,
dibangun dengan CodeIgniter 4, dilengkapi validasi form, SweetAlert2, dan
konfirmasi sebelum hapus data.
proyek ini dibuat untuk memenuhi mini projek tugas Web II universitas siber asia --- Angga anggieanie

## Fitur

**Halaman Admin** (`/admin`)
- Dashboard: jumlah total artikel (+ breakdown draft/published) dan jumlah feedback
- Daftar artikel (list, dengan status badge)
- Tambah & edit artikel (judul, konten, status draft/published)
- Daftar feedback dari pengguna

**Halaman Publik**
- Beranda: daftar artikel yang sudah *published*
- Detail artikel
- Form kirim feedback (nama, email, pesan)

**Validasi Form**
- Form feedback: nama, email (format valid), pesan (wajib, minimal 10 karakter)
- Form artikel: judul (wajib, minimal 5 karakter), status (wajib, harus draft/published)
- Pesan error ditampilkan per-field, input lama tetap terisi (`old()`) saat validasi gagal

**UX**
- SweetAlert2 untuk notifikasi sukses/gagal setelah simpan
- SweetAlert2 confirm dialog sebelum menghapus artikel/feedback
- Proteksi CSRF aktif di semua form (`csrf_field()`)

**Layout**
- Partial `app/Views/templates/head.php`, `side_nav.php`, `footer.php` dipakai
  di semua halaman admin agar layout konsisten
- Partial terpisah `app/Views/public/header.php` & `footer.php` untuk halaman publik

## Struktur Proyek

```
app/
  Controllers/
    Admin/Dashboard.php
    Admin/Articles.php     <- CRUD artikel + validasi
    Admin/Feedback.php     <- list & hapus feedback
    Home.php               <- halaman publik + kirim feedback
  Models/
    ArticleModel.php
    FeedbackModel.php
  Views/
    templates/head.php, side_nav.php, footer.php   <- partial admin
    admin/dashboard.php
    admin/articles/index.php, create.php, edit.php
    admin/feedback/index.php
    public/header.php, footer.php                  <- partial publik
    public/home.php, detail.php, feedback.php
  Database/Migrations/
    ..._CreateArticlesTable.php
    ..._CreateFeedbackTable.php
  Config/Routes.php
database_sql/ci_crud_artikel.sql   <- alternatif import manual via phpMyAdmin
```

## Cara Menjalankan

### 1. Persiapan
Pastikan sudah terpasang: PHP >= 8.1, Composer, dan MySQL/MariaDB (mis. via XAMPP/Laragon).

### 2. Install dependency
```bash
composer install
```

### 3. Buat database
Buat database `ci_crud_artikel` di MySQL, lalu **pilih salah satu**:

- **Opsi A — via migration (disarankan):**
  ```bash
  php spark migrate --all
  ```
- **Opsi B — import manual:** import file `database_sql/ci_crud_artikel.sql`
  lewat phpMyAdmin atau `mysql -u root ci_crud_artikel < database_sql/ci_crud_artikel.sql`

### 4. Sesuaikan konfigurasi database
File `.env` sudah disiapkan dengan default berikut (sesuaikan bila perlu):
```
database.default.hostname = localhost
database.default.database = ci_crud_artikel
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 5. Jalankan server
```bash
php spark serve
```
Buka `http://localhost:8080` untuk situs publik, dan
`http://localhost:8080/admin` untuk panel admin.

> Alternatif: taruh folder proyek di `htdocs` (XAMPP) lalu arahkan Apache
> document root ke folder `public/`, atau akses lewat
> `http://localhost/ci_crud_app/public/`.

## Rute Penting

| Method | URL                          | Keterangan                     |
|--------|-------------------------------|---------------------------------|
| GET    | `/`                            | Beranda publik (artikel published) |
| GET    | `/artikel/{id}`                | Detail artikel                  |
| GET/POST | `/feedback`                  | Form & kirim feedback           |
| GET    | `/admin/dashboard`             | Dashboard admin                 |
| GET    | `/admin/artikel`               | Daftar artikel                  |
| GET/POST | `/admin/artikel/tambah`      | Tambah artikel                  |
| GET/POST | `/admin/artikel/edit/{id}`   | Edit artikel                    |
| POST   | `/admin/artikel/hapus/{id}`    | Hapus artikel                   |
| GET    | `/admin/feedback`              | Daftar feedback                 |
| POST   | `/admin/feedback/hapus/{id}`   | Hapus feedback                  |
