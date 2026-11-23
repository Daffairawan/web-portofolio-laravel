<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes - Praktikum Pemrograman Web 2 (Latihan 5A & 5B)
|--------------------------------------------------------------------------
| RESTful API Publik untuk Website Portofolio Mahasiswa
| GET Endpoints : Profile, Skills, Projects, Experiences, Certificates
| POST Endpoint : Portfolio Contact Messages (Form Request & Rate Limiting)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ==========================================
// 1. ENDPOINTS GET PUBLIK (LATIHAN 5A)
// ==========================================

// Endpoint GET Data Profil Mahasiswa
Route::get('/profile', [ProfileController::class, 'index'])->name('api.profile');

// Endpoint GET Daftar Keahlian / Tech Stack (Mendukung filter ?category=...)
Route::get('/skills', [SkillController::class, 'index'])->name('api.skills');

// Endpoint GET Daftar & Detail Proyek (dengan eager loading pivot skills)
Route::get('/projects', [ProjectController::class, 'index'])->name('api.projects');
Route::get('/projects/{idOrSlug}', [ProjectController::class, 'show'])->name('api.projects.show');

// Endpoint GET Daftar Pengalaman & Pendidikan (Mendukung filter ?type=...)
Route::get('/experiences', [ExperienceController::class, 'index'])->name('api.experiences');

// Endpoint GET Daftar Sertifikat & Lisensi
Route::get('/certificates', [CertificateController::class, 'index'])->name('api.certificates');


// ==========================================
// 2. ENDPOINTS POST PESAN KONTAK (LATIHAN 5B)
// ==========================================

// Endpoint POST Pengiriman Pesan Kontak dengan FormRequest Validation & Rate Limiting (Maks 5 request/menit)
Route::post('/portfolio/messages', [MessageController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('api.portfolio.messages.store');

// Alias untuk fleksibilitas pemanggilan endpoint
Route::post('/messages', [MessageController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('api.messages.store');

// Endpoint GET Riwayat Pesan Masuk Portofolio (Opsional)
Route::get('/portfolio/messages', [MessageController::class, 'index'])
    ->name('api.portfolio.messages.index');
