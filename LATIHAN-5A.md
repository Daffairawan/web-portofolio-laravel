# DOKUMENTASI PRAKTIKUM PEMROGRAMAN WEB 2
## LATIHAN 5A (BE-2a): Merancang & Membangun RESTful API — GET Endpoints Portofolio Publik
**Studi Kasus:** Website Portofolio Mahasiswa  
**Pengembang:** Revaliano Daffa Irawan  
**Branch Git:** `lat5a` / `Lat-5a_RestAPI_GET`  

---

### 1. Deskripsi & Roadmap Milestone
Pada Latihan 5A ini, kita membangun arsitektur **RESTful API** berbasis metode HTTP **GET** untuk menyajikan data portofolio dari database MySQL ke klien (frontend atau penguji API) dalam format standar **JSON**:

```
FE-1 s/d FE-3 (Frontend Tailwind) ✅
         ↓
BE-1a (Setup Laravel & DB) ✅
         ↓
BE-1b (Migration, Model & Seeder) ✅
         ↓
BE-2a (RESTful API — GET Endpoints) ← (LATIHAN INI)
         ↓
BE-2b (RESTful API — POST & Validasi) → INT-1 (Integrasi Fetch Frontend)
```

---

### 2. Daftar 5 Endpoint GET API Aktif

Seluruh rute API terdaftar pada berkas [`routes/api.php`](file:///c:/web%20porto%20laravel/routes/api.php):

| No | Endpoint URI | Method | Controller & Method | Parameter Opsional | Deskripsi |
| :---: | :--- | :---: | :--- | :--- | :--- |
| **1** | `/api/profile` | `GET` | `Api\ProfileController@index` | - | Mengambil data profil lengkap mahasiswa pemilik portofolio |
| **2** | `/api/skills` | `GET` | `Api\SkillController@index` | `?category=Frontend` | Mengambil daftar keahlian/teknologi (bisa difilter per kategori) |
| **3** | `/api/projects` | `GET` | `Api\ProjectController@index` | `?featured=true` | Mengambil daftar proyek lengkap dengan eager loading relasi many-to-many ke `skills` |
| **-** | `/api/projects/{idOrSlug}` | `GET` | `Api\ProjectController@show` | - | Mengambil detail 1 proyek berdasarkan ID atau slug |
| **4** | `/api/experiences` | `GET` | `Api\ExperienceController@index` | `?type=education` | Mengambil riwayat pengalaman kerja/organisasi dan pendidikan |
| **5** | `/api/certificates` | `GET` | `Api\CertificateController@index` | - | Mengambil daftar sertifikat kompetensi & lisensi |

---

### 3. Struktur Format Respons JSON Standar

Semua response API mengadopsi standar industri melalui [`BaseApiController`](file:///c:/web%20porto%20laravel/app/Http/Controllers/Api/BaseApiController.php):

#### A. Respons Berhasil (HTTP 200 OK):
```json
{
  "success": true,
  "message": "Daftar proyek portofolio berhasil diambil.",
  "total": 4,
  "data": [
    {
      "id": 1,
      "title": "Web Portofolio Mahasiswa Modern",
      "slug": "web-portofolio-mahasiswa-modern",
      "summary": "Website portofolio interaktif berbasis Laravel dan Tailwind CSS...",
      "description": "...",
      "thumbnail_url": "...",
      "demo_url": "http://127.0.0.1:8000",
      "github_url": "https://github.com/revalianodaffa/web-porto-laravel",
      "is_featured": true,
      "skills": [
        {
          "id": 1,
          "name": "Tailwind CSS",
          "category": "Frontend",
          "level": "Expert",
          "icon": "tailwindcss"
        },
        {
          "id": 2,
          "name": "Laravel",
          "category": "Backend",
          "level": "Advanced",
          "icon": "laravel"
        }
      ]
    }
  ]
}
```

#### B. Respons Error / Data Tidak Ditemukan (HTTP 404 Not Found):
```json
{
  "success": false,
  "message": "Proyek portofolio tidak ditemukan.",
  "data": null
}
```

---

### 4. Pengujian dengan Postman / Thunder Client

File koleksi Postman telah disediakan di repositori: [`postman_collection.json`](file:///c:/web%20porto%20laravel/postman_collection.json).

#### Cara Mengimpor ke Postman / Thunder Client:
1. Buka aplikasi **Postman** atau ekstensi **Thunder Client** di VS Code.
2. Klik tombol **Import** &rarr; pilih berkas `postman_collection.json`.
3. Jalankan server lokal Laravel:
   ```bash
   php artisan serve
   ```
4. Jalankan setiap request:
   - `1. GET Profile Mahasiswa` &rarr; `http://127.0.0.1:8000/api/profile`
   - `2. GET Daftar Skills (Semua)` &rarr; `http://127.0.0.1:8000/api/skills`
   - `3. GET Filter Skills (Frontend)` &rarr; `http://127.0.0.1:8000/api/skills?category=Frontend`
   - `4. GET Daftar Projects (Relasi Skills)` &rarr; `http://127.0.0.1:8000/api/projects`
   - `5. GET Detail Project by Slug` &rarr; `http://127.0.0.1:8000/api/projects/web-portofolio-mahasiswa-modern`
   - `6. GET Daftar Experiences` &rarr; `http://127.0.0.1:8000/api/experiences`
   - `7. GET Daftar Certificates` &rarr; `http://127.0.0.1:8000/api/certificates`
5. Seluruh test assertion akan otomatis berstatus **PASSED (Status 200 OK & Valid JSON)**.
