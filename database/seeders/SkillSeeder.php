<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run()
    {
        $skills = [
            // Frontend
            ['name' => 'HTML5', 'category' => 'Frontend', 'level' => 'Advanced', 'icon' => 'html5'],
            ['name' => 'CSS3', 'category' => 'Frontend', 'level' => 'Advanced', 'icon' => 'css3'],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'level' => 'Expert', 'icon' => 'tailwindcss'],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'level' => 'Intermediate', 'icon' => 'javascript'],
            ['name' => 'Alpine.js', 'category' => 'Frontend', 'level' => 'Intermediate', 'icon' => 'alpinejs'],

            // Backend
            ['name' => 'PHP', 'category' => 'Backend', 'level' => 'Advanced', 'icon' => 'php'],
            ['name' => 'Laravel', 'category' => 'Backend', 'level' => 'Advanced', 'icon' => 'laravel'],
            ['name' => 'MySQL', 'category' => 'Backend', 'level' => 'Advanced', 'icon' => 'mysql'],
            ['name' => 'RESTful API', 'category' => 'Backend', 'level' => 'Advanced', 'icon' => 'api'],

            // Tools & Design
            ['name' => 'Git & GitHub', 'category' => 'Tools', 'level' => 'Advanced', 'icon' => 'github'],
            ['name' => 'Figma', 'category' => 'Tools', 'level' => 'Intermediate', 'icon' => 'figma'],
            ['name' => 'Postman', 'category' => 'Tools', 'level' => 'Intermediate', 'icon' => 'postman'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}

