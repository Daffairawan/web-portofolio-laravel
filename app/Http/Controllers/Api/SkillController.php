<?php

namespace App\Http\Controllers\Api;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends BaseApiController
{
    /**
     * GET /api/skills
     * Mengembalikan daftar keahlian/teknologi (bisa difilter via ?category=Frontend)
     */
    public function index(Request $request)
    {
        $query = Skill::query();

        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        $skills = $query->orderBy('name', 'asc')->get();

        return $this->sendResponse($skills, 'Daftar keahlian berhasil diambil.', 200, [
            'total' => $skills->count(),
        ]);
    }
}

