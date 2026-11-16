<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\CertificateController;

/*
|--------------------------------------------------------------------------
| API Routes - Praktikum Pemrograman Web 2 (Latihan 5A)
|--------------------------------------------------------------------------
| RESTful API Publik untuk Website Portofolio Mahasiswa
| GET Endpoints: Profile, Skills, Projects, Experiences, Certificates
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 1. Endpoint GET Data Profil Mahasiswa
Route::get('/profile', [ProfileController::class, 'index'])->name('api.profile');

// 2. Endpoint GET Daftar Keahlian / Tech Stack (Mendukung filter ?category=...)
Route::get('/skills', [SkillController::class, 'index'])->name('api.skills');

// 3. Endpoint GET Daftar & Detail Proyek (dengan eager loading pivot skills)
Route::get('/projects', [ProjectController::class, 'index'])->name('api.projects');
Route::get('/projects/{idOrSlug}', [ProjectController::class, 'show'])->name('api.projects.show');

// 4. Endpoint GET Daftar Pengalaman & Pendidikan (Mendukung filter ?type=...)
Route::get('/experiences', [ExperienceController::class, 'index'])->name('api.experiences');

// 5. Endpoint GET Daftar Sertifikat & Lisensi
Route::get('/certificates', [CertificateController::class, 'index'])->name('api.certificates');
