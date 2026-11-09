<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database (Latihan 4B - BE-1b).
     * Menjalankan seeder untuk 7 tabel portofolio dengan relasi pivot many-to-many.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProfileSeeder::class,
            SkillSeeder::class,
            ProjectSeeder::class,      // Otomatis mengisi pivot project_skill
            ExperienceSeeder::class,
            CertificateSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
