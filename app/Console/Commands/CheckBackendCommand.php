<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckBackendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-backend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifikasi lingkungan backend Laravel dan status koneksi database MySQL (Latihan 4A)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('');
        $this->info('==============================================================');
        $this->info('     PRAKTIKUM PEMROGRAMAN WEB 2 - LATIHAN 4A                 ');
        $this->info('     Verifikasi Lingkungan Backend Laravel & MySQL           ');
        $this->info('==============================================================');
        $this->line('');

        // 1. Cek Lingkungan Aplikasi & Framework
        $this->line('<fg=cyan;options=bold>1. LINGKUNGAN APLIKASI (FRAMEWORK & RUNTIME)</>');
        $this->line('   - Nama Aplikasi   : ' . config('app.name'));
        $this->line('   - Environment     : ' . config('app.env'));
        $this->line('   - Versi PHP       : ' . phpversion());
        $this->line('   - Versi Laravel   : ' . app()->version());
        $this->line('   - Status Debug    : ' . (config('app.debug') ? 'Aktif (True)' : 'Nonaktif (False)'));

        $this->line('');

        // 2. Cek Konfigurasi & Koneksi Basis Data MySQL
        $this->line('<fg=cyan;options=bold>2. STATUS BASIS DATA (MYSQL)</>');
        $dbConnection = config('database.default');
        $dbHost = config("database.connections.{$dbConnection}.host");
        $dbPort = config("database.connections.{$dbConnection}.port");
        $dbName = config("database.connections.{$dbConnection}.database");
        $dbUser = config("database.connections.{$dbConnection}.username");

        $this->line("   - Default Driver  : {$dbConnection}");
        $this->line("   - Host / Port     : {$dbHost}:{$dbPort}");
        $this->line("   - Database Target : {$dbName}");
        $this->line("   - User            : {$dbUser}");

        try {
            DB::connection()->getPdo();
            $connectedDb = DB::connection()->getDatabaseName();

            $this->line('');
            $this->info('   [STATUS KONEKSI] : SUKSES TERHUBUNG! (PDO MySQL Connected)');
            $this->info("   [DATABASE AKTIF] : {$connectedDb}");
            $this->line('');
            $this->info('==============================================================');
            $this->info('  SEMUA PEMERIKSAAN LATIHAN 4A BERHASIL! BACKEND BERJALAN NORMAL.');
            $this->info('==============================================================');
            $this->line('');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->line('');
            $this->error('   [STATUS KONEKSI] : GAGAL TERHUBUNG KE MYSQL');
            $this->warn('   Pesan Error      : ' . $e->getMessage());
            $this->line('');
            $this->comment('   Petunjuk Solusi:');
            $this->comment('   1. Pastikan server MySQL di Laragon / XAMPP sudah di-START.');
            $this->comment('   2. Pastikan database "' . $dbName . '" sudah dibuat di phpMyAdmin / HeidiSQL.');
            $this->comment('   3. Periksa kecocokan port dan password di file .env.');
            $this->line('');
            return Command::FAILURE;
        }
    }
}

