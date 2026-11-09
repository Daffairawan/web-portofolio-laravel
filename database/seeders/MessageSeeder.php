<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    public function run()
    {
        Message::create([
            'sender_name' => 'Budi Pratama',
            'sender_email' => 'budipratama@example.com',
            'subject' => 'Tawaran Kolaborasi Proyek Web',
            'body' => 'Halo Revaliano, saya sangat tertarik dengan portofolio web dan UI/UX Anda. Apakah Anda terbuka untuk kerja sama pembuatan website perusahaan kami?',
            'is_read' => true,
        ]);

        Message::create([
            'sender_name' => 'Siti Nurhaliza',
            'sender_email' => 'sitinur@startup.id',
            'subject' => 'Undangan Interview Magang Frontend',
            'body' => 'Selamat siang, kami melihat portofolio Anda di GitHub dan mengundang Anda untuk sesi perkenalan posisi magang Frontend Developer.',
            'is_read' => false,
        ]);
    }
}

