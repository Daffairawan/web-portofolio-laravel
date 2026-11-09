<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certificate;

class CertificateSeeder extends Seeder
{
    public function run()
    {
        Certificate::create([
            'title' => 'Belajar Dasar Pemrograman Web',
            'issuer' => 'Dicoding Indonesia',
            'issued_date' => '2024-02-15',
            'credential_url' => 'https://www.dicoding.com/certificates/EXAMPLE-WEB-001',
            'description' => 'Sertifikasi kompetensi mengenai dasar HTML5 semantik, CSS3 responsif flexbox/grid, dan manipulasi DOM menggunakan JavaScript murni.'
        ]);

        Certificate::create([
            'title' => 'Membangun Aplikasi Web Berbasis Framework Laravel',
            'issuer' => 'Dicoding Indonesia',
            'issued_date' => '2024-06-20',
            'credential_url' => 'https://www.dicoding.com/certificates/EXAMPLE-LARAVEL-002',
            'description' => 'Sertifikasi penguasaan arsitektur MVC, Eloquent ORM, migrasi skema basis data, RESTful routing, serta autentikasi pengguna.'
        ]);

        Certificate::create([
            'title' => 'Cloud Computing & Cyber Security Fundamentals',
            'issuer' => 'IBM SkillsBuild',
            'issued_date' => '2025-01-10',
            'credential_url' => 'https://www.credly.com/badges/EXAMPLE-IBM-003',
            'description' => 'Sertifikasi pemahaman fundamental arsitektur awan, keamanan data, enkripsi, dan tata kelola infrastruktur teknologi informasi.'
        ]);
    }
}

