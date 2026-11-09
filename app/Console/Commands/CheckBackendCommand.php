<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
    protected $description = 'Verifikasi lingkungan backend Laravel, status MySQL, dan skema 7 tabel portofolio (Latihan 4A & 4B)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('');
        $this->info('==============================================================');
        $this->info('     PRAKTIKUM PEMROGRAMAN WEB 2 - LATIHAN 4B                 ');
        $this->info('     Verifikasi Skema 7 Tabel Database & Relasi Pivot        ');
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

        $this->line("   - Default Driver  : {$dbConnection}");
        $this->line("   - Host / Port     : {$dbHost}:{$dbPort}");
        $this->line("   - Database Target : {$dbName}");

        try {
            DB::connection()->getPdo();
            $this->info('   [STATUS KONEKSI] : SUKSES TERHUBUNG! (PDO MySQL Connected)');
            $this->line('');

            // 3. Cek Status 7 Tabel ERD Portofolio
            $this->line('<fg=cyan;options=bold>3. STATUS 7 TABEL SKEMA ERD PORTOFOLIO (LATIHAN 4B)</>');
            $tables = [
                'profiles'      => 'Profil Mahasiswa',
                'skills'        => 'Keahlian / Tech Stack',
                'projects'      => 'Proyek Portofolio',
                'project_skill' => 'Pivot Relasi Many-to-Many',
                'experiences'   => 'Pengalaman / Pendidikan',
                'certificates'  => 'Sertifikat & Lisensi',
                'messages'      => 'Pesan Masuk (Form Kontak)',
            ];

            $allExist = true;
            $tableData = [];

            foreach ($tables as $table => $desc) {
                if (Schema::hasTable($table)) {
                    $count = DB::table($table)->count();
                    $tableData[] = [$table, $desc, '<fg=green>Tersedia</>', $count . ' data'];
                } else {
                    $allExist = false;
                    $tableData[] = [$table, $desc, '<fg=red>Belum Migrasi</>', '-'];
                }
            }

            $this->table(['Nama Tabel', 'Deskripsi Entitas', 'Status Skema', 'Jumlah Baris'], $tableData);

            if ($allExist) {
                $this->info('==============================================================');
                $this->info('  SEMUA 7 TABEL PORTOFOLIO LENGKAP & TERVERIFIKASI!');
                $this->info('  SIAP DIGUNAKAN UNTUK LATIHAN 5 (RESTFUL API).');
                $this->info('==============================================================');
            } else {
                $this->comment('Petunjuk: Jalankan `php artisan migrate:fresh --seed` untuk membuat seluruh tabel dan mengisinya.');
            }

            $this->line('');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->line('');
            $this->error('   [STATUS KONEKSI] : GAGAL TERHUBUNG KE MYSQL');
            $this->warn('   Pesan Error      : ' . $e->getMessage());
            $this->line('');
            $this->comment('   Petunjuk Solusi:');
            $this->comment('   1. Pastikan server MySQL di Laragon sudah di-START.');
            $this->comment('   2. Pastikan database "' . $dbName . '" sudah dibuat.');
            $this->line('');
            return Command::FAILURE;
        }
    }
}
