<?php

namespace App\Http\Controllers\Api;

use App\Models\Profile;

class ProfileController extends BaseApiController
{
    /**
     * GET /api/profile
     * Mengembalikan data profil mahasiswa pemilik portofolio
     */
    public function index()
    {
        $profile = Profile::first();

        if (!$profile) {
            return $this->sendError('Data profil belum tersedia di database.', 404);
        }

        return $this->sendResponse($profile, 'Data profil mahasiswa berhasil diambil.');
    }
}

