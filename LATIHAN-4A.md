# DOKUMENTASI PRAKTIKUM PEMROGRAMAN WEB 2
## LATIHAN 4A: Fondasi Laravel & Konfigurasi Lingkungan Backend (MySQL)
**Studi Kasus:** Website Portofolio Mahasiswa  
**Pengembang:** Revaliano Daffa Irawan  
**Branch Git:** `Lat-4a`  

---

### 1. Deskripsi & Tujuan Latihan
Pada Latihan 4A ini, fokus utama adalah membangun **fondasi backend** dan memastikan lingkungan Laravel berjalan normal serta terhubung sempurna dengan server basis data MySQL (Laragon) sebelum melangkah ke Latihan 4B (*Database Migration & Seeder*) dan Latihan 5 (*RESTful API*).

Struktur tabel dan basis data yang telah ada tetap dipertahankan 100% tanpa perubahan skema.

```
Lat-1 (HTML) → Lat-2 (CSS+JS) → Lat-3 (Tailwind Landing Page) ✅
                                           ↓
                      Lat-4a (Setup Laravel & MySQL) ← (LATIHAN INI)
                                           ↓
                      Lat-4b (Database Migration & Seeder)
                                           ↓
                      Lat-5 (RESTful API) → Lat-6 (Integrasi Fetch)
```

---

### 2. Konfigurasi Lingkungan Backend

Konfigurasi koneksi MySQL diatur pada berkas `.env` (dan dicantumkan standarnya pada `.env.example`):

```env
APP_NAME="Portofolio Mahasiswa"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_porto_laravel
DB_USERNAME=root
DB_PASSWORD=
```

---

### 3. Implementasi Fitur pada Branch `Lat-4a`

Untuk memenuhi kompetensi praktikum mengenai **MVC (Model-View-Controller)** dan **Artisan**, berikut komponen yang ditambahkan:

1. **Custom Artisan Command (`app:check-backend`)**
   - **Berkas:** `app/Console/Commands/CheckBackendCommand.php`
   - **Fungsi:** Menyediakan perintah CLI interaktif untuk memeriksa spesifikasi runtime (PHP, framework Laravel) serta memverifikasi status koneksi PDO MySQL secara instan.
   - **Cara Menjalankan:**
     ```bash
     php artisan app:check-backend
     ```

2. **Endpoint Verifikasi Koneksi Database (`/cek-koneksi`)**
   - **Berkas:** `routes/web.php`
   - **Fungsi:** Menyediakan respons JSON berformat standar yang menampilkan status koneksi aktif, nama basis data, host/port, driver, dan timestamp.
   - **Cara Pengujian:**
     Akses melalui browser atau Postman: `http://127.0.0.1:8000/cek-koneksi`

3. **Penerapan Konsep MVC yang Resilien pada Controller & View**
   - **Controller:** `app/Http/Controllers/PortfolioController.php`
     - Melakukan pengecekan status PDO database secara aman (`try-catch`) agar halaman landing page tidak mengalami fatal error (500) saat server MySQL sedang offline/maintenance.
     - Mengirimkan variabel `$dbConnected` dan `$dbName` ke View.
   - **View:** `resources/views/portfolio.blade.php`
     - Menampilkan indikator status koneksi dinamis di footer portofolio.
     - Menyediakan tautan cepat untuk memverifikasi endpoint `/cek-koneksi`.

4. **Standarisasi Konfigurasi Repository**
   - **Berkas:** `.env.example`
   - Menyesuaikan nama database default target menjadi `web_porto_laravel` agar selaras dengan lingkungan Laragon.

---

### 4. Panduan Verifikasi & Pengujian

#### A. Verifikasi via Terminal (Artisan)
Jalankan perintah berikut di terminal:
```bash
php artisan app:check-backend
```
*Hasil yang diharapkan saat MySQL aktif:*
```text
==============================================================
     PRAKTIKUM PEMROGRAMAN WEB 2 - LATIHAN 4A                 
     Verifikasi Lingkungan Backend Laravel & MySQL           
==============================================================

1. LINGKUNGAN APLIKASI (FRAMEWORK & RUNTIME)
   - Nama Aplikasi   : Portofolio Mahasiswa
   - Environment     : local
   - Versi PHP       : 8.0.x / 8.3.x
   - Versi Laravel   : 8.83.29
   - Status Debug    : Aktif (True)

2. STATUS BASIS DATA (MYSQL)
   - Default Driver  : mysql
   - Host / Port     : 127.0.0.1:3306
   - Database Target : web_porto_laravel
   - User            : root

   [STATUS KONEKSI] : SUKSES TERHUBUNG! (PDO MySQL Connected)
   [DATABASE AKTIF] : web_porto_laravel

==============================================================
  SEMUA PEMERIKSAAN LATIHAN 4A BERHASIL! BACKEND BERJALAN NORMAL.
==============================================================
```

#### B. Verifikasi via Browser (Route Web)
1. Nyalakan server lokal Laravel:
   ```bash
   php artisan serve
   ```
2. Buka URL:
   - `http://127.0.0.1:8000/` &rarr; Cek indikator status di bagian footer.
   - `http://127.0.0.1:8000/cek-koneksi` &rarr; Menampilkan data verifikasi format JSON.

---
*Latihan 4A selesai dan siap dilanjutkan ke Latihan 4B (Database Migration & Seeder).*

