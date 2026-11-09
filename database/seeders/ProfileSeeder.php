<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        Profile::create([
            'full_name' => 'Revaliano Daffa Irawan',
            'headline' => 'Full-Stack Developer & Informatics Student',
            'bio' => 'Mahasiswa Informatika di Universitas Teknokrat Indonesia dengan fokus pada pengembangan web modern menggunakan Laravel, Tailwind CSS, serta desain antarmuka UI/UX interaktif.',
            'photo_url' => '/images/foto-saya.jpg',
            'cv_url' => '/cv/CV-Revaliano-Daffa.pdf',
            'email' => 'daffairawan212@gmail.com',
            'phone' => '+62 812-3456-7890',
            'location' => 'Bandar Lampung, Lampung, Indonesia',
            'github_url' => 'https://github.com/revalianodaffa',
            'linkedin_url' => 'https://linkedin.com/in/revalianodaffa',
            'instagram_url' => 'https://instagram.com/daffairawan_',
        ]);
    }
}

