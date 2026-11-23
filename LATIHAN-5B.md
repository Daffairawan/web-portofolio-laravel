# DOKUMENTASI PRAKTIKUM PEMROGRAMAN WEB 2
## LATIHAN 5B (BE-2b): Membangun RESTful API — POST Endpoint, FormRequest Validation & Sanitasi Data
**Studi Kasus:** Website Portofolio Mahasiswa (Endpoint Pengiriman Pesan Kontak)  
**Pengembang:** Revaliano Daffa Irawan  
**Branch Git:** `Lat-5b_RestAPI_POST`  

---

### 1. Deskripsi & Roadmap Milestone
Pada milestone **Latihan 5B (BE-2b)**, kita membangun fitur interaksi dua arah berupa endpoint **`POST /api/portfolio/messages`** agar calon klien, perekrut (*recruiter*), atau pengunjung dapat mengirimkan pesan melalui formulir kontak portofolio secara aman.

```
FE-1 s/d FE-3 (Frontend Tailwind) ✅
         ↓
BE-1a & BE-1b (Setup Laravel, MySQL, Model, Seeder) ✅
         ↓
BE-2a (RESTful API — GET Endpoints) ✅
         ↓
BE-2b (RESTful API — POST & Validasi) ← (LATIHAN INI)
         ↓
INT-1 (Integrasi Fetch API ke Tampilan Frontend Tailwind)
```

---

### 2. Spesifikasi Endpoint POST Pesan Kontak

- **URL Utama:** `/api/portfolio/messages`
- **URL Alias:** `/api/messages`
- **Method:** `POST`
- **Header Wajib:**
  - `Accept: application/json`
  - `Content-Type: application/json`

---

### 3. Lapisan Validasi & Sanitasi Data (`StoreMessageRequest`)

Validasi diisolasi secara profesional menggunakan Form Request [`app/Http/Requests/StoreMessageRequest.php`](file:///c:/web%20porto%20laravel/app/Http/Requests/StoreMessageRequest.php):

#### A. Sanitasi Data Otomatis (`prepareForValidation`)
Sebelum data divalidasi, sistem melakukan pembersihan otomatis terhadap input pengguna:
- **Proteksi XSS:** Pembersihan tag HTML berbahaya menggunakan `strip_tags()`.
- **Trimming:** Menghapus spasi berlebih pada awal dan akhir input string.
- **Normalisasi Email:** Mengubah alamat email menjadi huruf kecil (*lowercase*).
- **Fleksibilitas Parameter:** Mendukung payload standar (`sender_name`, `sender_email`, `body`) maupun payload form HTML (`name`, `email`, `content`).

#### B. Aturan Validasi Ketat (`rules`)
```php
public function rules()
{
    return [
        'sender_name'  => 'required|string|min:3|max:100',
        'sender_email' => 'required|email|max:150',
        'subject'      => 'nullable|string|max:200',
        'body'         => 'required|string|min:10|max:5000',
    ];
}
```

#### C. Penanganan Validasi Gagal (`failedValidation` & HTTP 422)
Ketika input tidak valid, sistem mengembalikan kode HTTP **422 Unprocessable Entity** dengan rincian pesan kesalahan dalam Bahasa Indonesia:
```json
{
  "success": false,
  "message": "Validasi gagal. Silakan periksa kembali data yang Anda kirimkan.",
  "errors": {
    "sender_name": [
      "Nama pengirim minimal harus memiliki 3 karakter."
    ],
    "sender_email": [
      "Format alamat email tidak valid (contoh: nama@domain.com)."
    ],
    "body": [
      "Isi pesan terlalu pendek, tuliskan minimal 10 karakter."
    ]
  }
}
```

---

### 4. Controller & Kode Status Sukses (`MessageController` & HTTP 201)

Logika penyimpanan ditangani oleh [`app/Http/Controllers/Api/MessageController.php`](file:///c:/web%20porto%20laravel/app/Http/Controllers/Api/MessageController.php). Ketika data berhasil disimpan ke basis data MySQL, controller mengembalikan kode status standar industri **201 Created**:

```json
{
  "success": true,
  "message": "Pesan Anda berhasil dikirim! Terima kasih telah menghubungi saya.",
  "data": {
    "id": 5,
    "sender_name": "Alexander Graham",
    "sender_email": "alexander@techcorp.com",
    "subject": "Tawaran Kolaborasi Proyek Full-Stack Web",
    "body": "Halo Revaliano, kami sangat terkesan dengan portofolio web dan desain UI/UX Anda...",
    "is_read": false,
    "created_at": "2026-11-23T12:50:00.000000Z",
    "updated_at": "2026-11-23T12:50:00.000000Z"
  }
}
```

---

### 5. Proteksi Keamanan: API Rate Limiting (Anti-Spam)

Untuk mencegah serangan spam bot atau pengiriman formulir berulang secara berlebihan (*flooding/brute force*), rute dilindungi dengan middleware rate limiting:

```php
Route::post('/portfolio/messages', [MessageController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('api.portfolio.messages.store');
```
*Aturan: Maksimal 5 permintaan POST per 1 menit per alamat IP. Jika melebihi batas, server mengembalikan status **429 Too Many Requests**.*

---

### 6. Panduan Pengujian via Postman / Thunder Client

File koleksi pengujian telah diperbarui di [`postman_collection.json`](file:///c:/web%20porto%20laravel/postman_collection.json):

1. **Jalankan Server Laravel:**
   ```bash
   php artisan serve
   ```
2. **Buka Postman / Thunder Client** &rarr; Import `postman_collection.json`.
3. **Uji Kasus Sukses (201 Created):**
   - Pilih request: `8. POST Kirim Pesan Kontak (Valid - 201 Created)`
   - Klik **Send** &rarr; Status harus **201 Created** dan test assertion bertanda hijau.
4. **Uji Kasus Validasi Gagal (422 Unprocessable Entity):**
   - Pilih request: `9. POST Kirim Pesan Kontak (Gagal Validasi - 422 Unprocessable Entity)`
   - Klik **Send** &rarr; Status harus **422 Unprocessable Entity** dan menampilkan rincian error tiap field.
5. **Uji Kasus Normalisasi Parameter Form:**
   - Pilih request: `10. POST Kirim Pesan Kontak (Alias Endpoint /api/messages)`
   - Klik **Send** &rarr; Status harus **201 Created**.
