<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use App\Models\Message;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        return view('portfolio', compact('projects', 'experiences'));
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
