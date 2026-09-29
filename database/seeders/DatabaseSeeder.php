<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Experience;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Experience::create([
            'title' => 'Informatics Engineering',
            'organization' => 'Universitas Teknokrat Indonesia',
            'start_date' => '2023-08-01',
            'description' => 'Mempelajari dasar-dasar ilmu komputer, algoritma, pemrograman web dan mobile.'
        ]);
        Experience::create([
            'title' => 'Google Developer Program',
            'organization' => 'Google',
            'start_date' => '2024-01-01',
            'description' => 'Berpartisipasi aktif dalam komunitas Google Developer untuk mengembangkan solusi inovatif.'
        ]);
        Experience::create([
            'title' => '#JuaraVibeCoding',
            'organization' => 'Tech Community',
            'start_date' => '2024-05-01',
            'description' => 'Pemenang atau partisipan dalam challenge #JuaraVibeCoding untuk membuat aplikasi canggih.'
        ]);
        Experience::create([
            'title' => 'IBM SkillsBuild',
            'organization' => 'Dicoding & IBM',
            'start_date' => '2025-01-01',
            'description' => 'Mempelajari Cloud Computing, AI, dan Cyber Security di platform IBM.'
        ]);

        Project::create([
            'title' => 'UI/UX Design E-Commerce',
            'description' => 'Desain prototipe aplikasi E-Commerce modern menggunakan Figma.',
            'tech_stack' => 'Figma, Canva',
            'image_path' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80&w=800'
        ]);
        Project::create([
            'title' => 'AI Chatbot Application',
            'description' => 'Aplikasi asisten pintar yang dibangun dengan Google AI Studio dan Laravel.',
            'tech_stack' => 'Laravel, Google AI Studio, MySQL',
            'image_path' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&q=80&w=800'
        ]);
    }
}
