<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    public function run()
    {
        Experience::create([
            'title' => 'Informatics Engineering Student',
            'organization' => 'Universitas Teknokrat Indonesia',
            'type' => 'education',
            'start_date' => '2023-08-01',
            'end_date' => null,
            'is_current' => true,
            'description' => 'Fokus pada rekayasa perangkat lunak, algoritma pemrograman, perancangan basis data relasional, dan arsitektur web modern.'
        ]);

        Experience::create([
            'title' => 'Google Developer Student Clubs Core Member',
            'organization' => 'Google Developer Student Clubs',
            'type' => 'organization',
            'start_date' => '2024-01-01',
            'end_date' => '2024-12-31',
            'is_current' => false,
            'description' => 'Berpartisipasi aktif dalam workshop teknologi cloud, AI, dan kolaborasi pengembangan aplikasi web bersama komunitas pengembang.'
        ]);

        Experience::create([
            'title' => 'Partisipan & Finalis #JuaraVibeCoding',
            'organization' => 'Tech Community Indonesia',
            'type' => 'work',
            'start_date' => '2024-05-01',
            'end_date' => '2024-08-01',
            'is_current' => false,
            'description' => 'Membangun aplikasi web inovatif secara intensif dengan standar clean code dan performa tinggi dalam kompetisi hackathon.'
        ]);

        Experience::create([
            'title' => 'IBM SkillsBuild Cloud & AI Trainee',
            'organization' => 'Dicoding Indonesia & IBM',
            'type' => 'education',
            'start_date' => '2025-01-01',
            'end_date' => null,
            'is_current' => true,
            'description' => 'Menempuh pelatihan intensif bidang Cloud Computing, Artificial Intelligence, dan fundamental Cybersecurity bersertifikasi internasional.'
        ]);
    }
}

