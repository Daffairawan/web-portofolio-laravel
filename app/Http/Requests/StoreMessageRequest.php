<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMessageRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diotorisasi untuk membuat request ini.
     * Terbuka untuk umum (pengunjung portofolio).
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Sanitasi dan normalisasi data sebelum validasi dijalankan.
     * Mencegah serangan injeksi skrip (XSS) dan merapikan whitespace.
     */
    protected function prepareForValidation()
    {
        $senderName = $this->sender_name ?? $this->name;
        $senderEmail = $this->sender_email ?? $this->email;
        $subject = $this->subject;
        $body = $this->body ?? $this->content;

        $this->merge([
            'sender_name'  => $senderName ? strip_tags(trim($senderName)) : null,
            'sender_email' => $senderEmail ? strtolower(trim($senderEmail)) : null,
            'subject'      => $subject ? strip_tags(trim($subject)) : 'Pesan dari Formulir Kontak Portofolio',
            'body'         => $body ? strip_tags(trim($body)) : null,
        ]);
    }

    /**
     * Aturan validasi ketat untuk data pesan kontak.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sender_name'  => 'required|string|min:3|max:100',
            'sender_email' => 'required|email|max:150',
            'subject'      => 'nullable|string|max:200',
            'body'         => 'required|string|min:10|max:5000',
        ];
    }

    /**
     * Pesan kesalahan validasi kustom dalam Bahasa Indonesia yang informatif.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sender_name.required'  => 'Nama pengirim wajib diisi.',
            'sender_name.string'    => 'Nama pengirim harus berupa teks yang valid.',
            'sender_name.min'       => 'Nama pengirim minimal harus memiliki 3 karakter.',
            'sender_name.max'       => 'Nama pengirim tidak boleh lebih dari 100 karakter.',

            'sender_email.required' => 'Alamat email pengirim wajib diisi.',
            'sender_email.email'    => 'Format alamat email tidak valid (contoh: nama@domain.com).',
            'sender_email.max'      => 'Alamat email tidak boleh lebih dari 150 karakter.',

            'subject.max'           => 'Subjek pesan tidak boleh lebih dari 200 karakter.',

            'body.required'         => 'Isi pesan tidak boleh kosong.',
            'body.string'           => 'Isi pesan harus berupa teks yang valid.',
            'body.min'              => 'Isi pesan terlalu pendek, tuliskan minimal 10 karakter.',
            'body.max'              => 'Isi pesan tidak boleh melebihi 5000 karakter.',
        ];
    }

    /**
     * Mengembalikan respons JSON terstruktur dengan status HTTP 422 Unprocessable Entity
     * saat validasi data formulir gagal.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validasi gagal. Silakan periksa kembali data yang Anda kirimkan.',
            'errors'  => $validator->errors(),
        ], 422, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}
