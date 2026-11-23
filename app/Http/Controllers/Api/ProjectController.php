<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends BaseApiController
{
    /**
     * GET /api/projects
     * Mengembalikan daftar proyek portofolio beserta relasi many-to-many ke skills
     */
    public function index(Request $request)
    {
        $query = Project::with(['skills' => function ($q) {
            $q->select('skills.id', 'skills.name', 'skills.category', 'skills.level', 'skills.icon');
        }]);

        if ($request->has('featured')) {
            $isFeatured = filter_var($request->featured, FILTER_VALIDATE_BOOLEAN);
            $query->where('is_featured', $isFeatured);
        }

        $projects = $query->latest()->get();

        return $this->sendResponse($projects, 'Daftar proyek portofolio berhasil diambil.', 200, [
            'total' => $projects->count(),
        ]);
    }

    /**
     * GET /api/projects/{idOrSlug}
     * Mengembalikan detail 1 proyek berdasarkan ID atau slug unik
     */
    public function show($idOrSlug)
    {
        $project = Project::with(['skills' => function ($q) {
            $q->select('skills.id', 'skills.name', 'skills.category', 'skills.level', 'skills.icon');
        }])
        ->where('id', $idOrSlug)
        ->orWhere('slug', $idOrSlug)
        ->first();

        if (!$project) {
            return $this->sendError('Proyek portofolio tidak ditemukan.', 404);
        }

        return $this->sendResponse($project, 'Detail proyek portofolio berhasil diambil.');
    }
}

