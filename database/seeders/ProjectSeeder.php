<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Skill;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // 1. Project 1: Web Portofolio Mahasiswa Modern
        $proj1 = Project::create([
            'title' => 'Web Portofolio Mahasiswa Modern',
            'slug' => 'web-portofolio-mahasiswa-modern',
            'summary' => 'Website portofolio interaktif berbasis Laravel dan Tailwind CSS dengan arsitektur MVC.',
            'description' => 'Membangun antarmuka landing page responsif lengkap dengan dark mode, filter proyek dinamis, mobile drawer, serta backend Laravel yang terhubung ke database MySQL untuk menyajikan data secara dinamis.',
            'thumbnail_url' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&q=80&w=800',
            'demo_url' => 'http://127.0.0.1:8000',
            'github_url' => 'https://github.com/revalianodaffa/web-porto-laravel',
            'is_featured' => true,
        ]);
        $skills1 = Skill::whereIn('name', ['Tailwind CSS', 'Laravel', 'MySQL', 'Alpine.js'])->pluck('id');
        $proj1->skills()->attach($skills1);

        // 2. Project 2: UI/UX Design E-Commerce
        $proj2 = Project::create([
            'title' => 'UI/UX Design E-Commerce Platform',
            'slug' => 'ui-ux-design-ecommerce-platform',
            'summary' => 'Desain prototipe aplikasi E-Commerce modern berbasis mobile dan web.',
            'description' => 'Merancang alur wireframing, user journey, serta high-fidelity prototype aplikasi toko online dengan prinsip Atomic Design di Figma.',
            'thumbnail_url' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80&w=800',
            'demo_url' => 'https://figma.com/@revalianodaffa',
            'github_url' => null,
            'is_featured' => true,
        ]);
        $skills2 = Skill::whereIn('name', ['Figma', 'HTML5', 'CSS3'])->pluck('id');
        $proj2->skills()->attach($skills2);

        // 3. Project 3: AI Chatbot Assistant System
        $proj3 = Project::create([
            'title' => 'AI Chatbot Assistant System',
            'slug' => 'ai-chatbot-assistant-system',
            'summary' => 'Aplikasi asisten cerdas yang memanfaatkan integrasi REST API kecerdasan buatan.',
            'description' => 'Pengembangan layanan chatbot otomatis untuk menangani interaksi pengguna secara real-time dengan backend PHP Laravel dan database MySQL.',
            'thumbnail_url' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&q=80&w=800',
            'demo_url' => 'https://demo-ai-assistant.com',
            'github_url' => 'https://github.com/revalianodaffa/ai-chatbot-laravel',
            'is_featured' => true,
        ]);
        $skills3 = Skill::whereIn('name', ['Laravel', 'PHP', 'RESTful API', 'MySQL'])->pluck('id');
        $proj3->skills()->attach($skills3);

        // 4. Project 4: Sistem Inventaris & Manajemen Barang
        $proj4 = Project::create([
            'title' => 'Sistem Inventaris & Manajemen Barang',
            'slug' => 'sistem-inventaris-manajemen-barang',
            'summary' => 'Sistem pengelolaan stok dan transaksi inventaris berbasis web.',
            'description' => 'Sistem informasi pengelolaan barang masuk/keluar, pelaporan stok periodik, serta multi-user authentication.',
            'thumbnail_url' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=800',
            'demo_url' => null,
            'github_url' => 'https://github.com/revalianodaffa/inventory-system',
            'is_featured' => false,
        ]);
        $skills4 = Skill::whereIn('name', ['Laravel', 'MySQL', 'Tailwind CSS', 'Git & GitHub'])->pluck('id');
        $proj4->skills()->attach($skills4);
    }
}

