# DOKUMENTASI PRAKTIKUM PEMROGRAMAN WEB 2
## LATIHAN 4B (BE-1b): Desain Database, Migration, Eloquent Model & Seeder
**Studi Kasus:** Website Portofolio Mahasiswa  
**Pengembang:** Revaliano Daffa Irawan  
**Branch Git:** `Lat-4b_DatabaseModel`  

---

### 1. Deskripsi & Arsitektur Basis Data (ERD)
Pada Latihan 4B ini, sistem backend portofolio diperkaya dengan **7 tabel database terstruktur**, **model Eloquent dengan relasi Many-to-Many via pivot table**, serta **seeder data otomatis**.

```text
+--------------------+        +---------------------+        +--------------------+
|      profiles      |        |      projects       |        |       skills       |
+--------------------+        +---------------------+        +--------------------+
| id (PK)            |        | id (PK)             |        | id (PK)            |
| full_name          |        | title               |        | name               |
| headline           |        | slug (unique)       |        | category           |
| bio                |        | summary             |        | level              |
| photo_url          |        | description         |        | icon               |
| cv_url             |        | thumbnail_url       |        +--------------------+
| email              |        | demo_url            |                  |
| phone              |        | github_url          |                  | (Many-to-Many)
| location           |        | is_featured         |                  |
| github_url         |        +---------------------+                  |
| linkedin_url       |                   |                             |
| instagram_url      |                   +--------------+--------------+
+--------------------+                                  |
                                              +-------------------+
                                              |   project_skill   | (Pivot Table)
                                              +-------------------+
                                              | project_id (FK)   |
                                              | skill_id (FK)     |
                                              +-------------------+

+--------------------+        +---------------------+        +--------------------+
|    experiences     |        |    certificates     |        |      messages      |
+--------------------+        +---------------------+        +--------------------+
| id (PK)            |        | id (PK)             |        | id (PK)            |
| title              |        | title               |        | sender_name        |
| organization       |        | issuer              |        | sender_email       |
| type               |        | issued_date         |        | subject            |
| start_date         |        | credential_url      |        | body               |
| end_date           |        | description         |        | is_read            |
| is_current         |        +---------------------+        +--------------------+
| description        |
+--------------------+
```

---

### 2. Berkas Migration (7 Tabel)

1. `database/migrations/2026_11_09_000001_create_profiles_table.php` &rarr; Tabel data diri mahasiswa.
2. `database/migrations/2026_11_09_000002_create_skills_table.php` &rarr; Tabel keahlian/teknologi.
3. `database/migrations/2026_09_29_123818_create_projects_table.php` &rarr; Tabel proyek portofolio.
4. `database/migrations/2026_11_09_000003_create_project_skill_table.php` &rarr; Tabel pivot Many-to-Many (`project_id` & `skill_id` dengan `cascadeOnDelete`).
5. `database/migrations/2026_09_29_123825_create_experiences_table.php` &rarr; Tabel riwayat pendidikan & pengalaman.
6. `database/migrations/2026_11_09_000004_create_certificates_table.php` &rarr; Tabel sertifikat & lisensi.
7. `database/migrations/2026_09_29_123831_create_messages_table.php` &rarr; Tabel pesan masuk kontak.

---

### 3. Model Eloquent & Relasi Many-to-Many

- **`App\Models\Project`**:
  ```php
  public function skills()
  {
      return $this->belongsToMany(Skill::class, 'project_skill')->withTimestamps();
  }
  ```
- **`App\Models\Skill`**:
  ```php
  public function projects()
  {
      return $this->belongsToMany(Project::class, 'project_skill')->withTimestamps();
  }
  ```
- **`App\Models\Profile`**: Mengelola identitas, kontak, dan tautan sosial.
- **`App\Models\Experience`**: Mengelola riwayat pendidikan, magang, dan organisasi.
- **`App\Models\Certificate`**: Mengelola sertifikat kompetensi.
- **`App\Models\Message`**: Mengelola pesan masuk dari form kontak.

---

### 4. Database Seeders Otomatis

Data dummy realistis disediakan melalui seeder terpisah yang dipanggil oleh `DatabaseSeeder`:
- `ProfileSeeder` &rarr; Profil Revaliano Daffa Irawan
- `SkillSeeder` &rarr; Daftar skill Frontend, Backend, dan Tools
- `ProjectSeeder` &rarr; Daftar proyek sekaligus menghubungkan skill ke proyek melalui pivot `$project->skills()->attach(...)`
- `ExperienceSeeder` &rarr; Pengalaman kuliah di UTI, Google DSC, #JuaraVibeCoding, IBM
- `CertificateSeeder` &rarr; Sertifikat Dicoding & IBM SkillsBuild
- `MessageSeeder` &rarr; Sampel pesan kontak

---

### 5. Cara Eksekusi & Verifikasi

1. **Eksekusi Migrasi & Seeder:**
   ```bash
   php artisan migrate:fresh --seed
   ```

2. **Verifikasi via Custom Artisan Command:**
   ```bash
   php artisan app:check-backend
   ```

3. **Verifikasi via Browser:**
   Buka `http://127.0.0.1:8000/cek-koneksi` untuk melihat status tabel dan jumlah baris dalam format JSON.

