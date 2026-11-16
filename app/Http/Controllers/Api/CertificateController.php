<?php

namespace App\Http\Controllers\Api;

use App\Models\Certificate;

class CertificateController extends BaseApiController
{
    /**
     * GET /api/certificates
     * Mengembalikan daftar sertifikat dan lisensi kompetensi
     */
    public function index()
    {
        $certificates = Certificate::orderBy('issued_date', 'desc')->get();

        return $this->sendResponse($certificates, 'Daftar sertifikat dan lisensi berhasil diambil.', 200, [
            'total' => $certificates->count(),
        ]);
    }
}
