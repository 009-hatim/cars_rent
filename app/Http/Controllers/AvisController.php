<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvisController extends Controller
{
    public function index()
    {
        $avis = Avis::with(['client.user'])->get();
        return view('index', compact('avis'));
    }

    public function store(Request $request)
{
    $request->validate([
        'commentaire' => 'required|string|max:500',
        'note' => 'required|integer|between:1,5'
    ]);

    $client = Auth::user()->client;

    Avis::create([
        'commentaire' => $request->commentaire,
        'note' => $request->note,
        'client_id' => $client->id
        // created_at will be auto-set by Laravel
    ]);

    return back()->with('success', 'Merci pour votre avis!');
}
}
