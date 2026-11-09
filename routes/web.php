<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Web Routes - Pemrograman Web 2 (Latihan 4A)
|--------------------------------------------------------------------------
| Latihan 4A: Fondasi Laravel & Konfigurasi Lingkungan Backend (MySQL)
| Memastikan lingkungan backend Laravel berjalan normal dan terhubung ke MySQL.
*/

// Halaman Utama Portofolio Mahasiswa
Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::post('/contact', [PortfolioController::class, 'storeMessage'])->name('contact.store');

// Route Khusus Verifikasi Lingkungan Backend & Koneksi Basis Data MySQL (Latihan 4A)
Route::get('/cek-koneksi', function () {
    try {
        DB::connection()->getPdo();
        $dbName = DB::connection()->getDatabaseName();
        $dbHost = config('database.connections.mysql.host');
        $dbPort = config('database.connections.mysql.port');

        return response()->json([
            'status' => 'success',
            'pesan' => 'Alhamdulillah! Lingkungan backend Laravel berjalan normal dan sukses terhubung ke MySQL.',
            'praktikum' => 'Latihan 4A - Fondasi Laravel & Konfigurasi Lingkungan Backend',
            'informasi_sistem' => [
                'nama_database'    => $dbName,
                'host_database'    => $dbHost . ':' . $dbPort,
                'driver'           => DB::connection()->getDriverName(),
                'versi_laravel'    => app()->version(),
                'versi_php'        => phpversion(),
                'environment'      => config('app.env'),
                'waktu_pemeriksaan' => now()->toDateTimeString(),
            ]
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'pesan' => 'Gagal terhubung ke database MySQL. Pastikan server MySQL di Laragon sudah dinyalakan.',
            'error' => $e->getMessage(),
            'database_target' => config('database.connections.mysql.database'),
        ], 500, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
})->name('cek.koneksi');

