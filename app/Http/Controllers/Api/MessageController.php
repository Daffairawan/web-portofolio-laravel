<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;

class MessageController extends BaseApiController
{
    /**
     * POST /api/portfolio/messages
     * Menyimpan pesan baru dari formulir kontak portofolio publik.
     * Mengembalikan status HTTP 201 Created jika berhasil, atau 422 jika gagal validasi.
     */
    public function store(StoreMessageRequest $request)
    {
        // Ambil data yang telah lolos validasi dan sanitasi
        $validated = $request->validated();

        $message = Message::create([
            'sender_name'  => $validated['sender_name'],
            'sender_email' => $validated['sender_email'],
            'subject'      => $validated['subject'] ?? 'Pesan dari Formulir Kontak Portofolio',
            'body'         => $validated['body'],
            'is_read'      => false,
        ]);

        return $this->sendResponse(
            $message,
            'Pesan Anda berhasil dikirim! Terima kasih telah menghubungi saya.',
            201
        );
    }

    /**
     * GET /api/portfolio/messages
     * Mengambil daftar pesan masuk dari portofolio (opsional untuk monitoring)
     */
    public function index()
    {
        $messages = Message::latest()->get();

        return $this->sendResponse(
            $messages,
            'Daftar pesan masuk berhasil diambil.',
            200,
            ['total' => $messages->count()]
        );
    }
}
