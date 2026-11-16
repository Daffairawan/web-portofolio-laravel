<?php

namespace App\Http\Controllers\Api;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends BaseApiController
{
    /**
     * GET /api/experiences
     * Mengembalikan daftar pengalaman kerja, organisasi, atau pendidikan
     */
    public function index(Request $request)
    {
        $query = Experience::query();

        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', $request->type);
        }

        $experiences = $query->orderBy('start_date', 'desc')->get();

        return $this->sendResponse($experiences, 'Daftar pengalaman dan riwayat pendidikan berhasil diambil.', 200, [
            'total' => $experiences->count(),
        ]);
    }
}
