<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    /**
     * Menampilkan Landing Page Portofolio dengan verifikasi koneksi Database (Konsep MVC - Latihan 4A)
     */
    public function index()
    {
        $dbConnected = false;
        $dbName = config('database.connections.mysql.database');
        $projects = collect();
        $experiences = collect();

        // Verifikasi koneksi MySQL secara elegan (tanpa menyebabkan crash jika database offline)
        try {
            DB::connection()->getPdo();
            $dbConnected = true;
            $projects = Project::all();
            $experiences = Experience::orderBy('start_date', 'desc')->get();
        } catch (\Exception $e) {
            $dbConnected = false;
        }

        return view('portfolio', compact('projects', 'experiences', 'dbConnected', 'dbName'));
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required'
        ]);

        Message::create($request->all());

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}

