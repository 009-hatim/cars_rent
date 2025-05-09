<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('user')->get();
        return view('admin.adminClient', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email',
            'MotDePasse' => 'required|min:6',
            'tel' => 'required'
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'MotDePasse' => $request->MotDePasse,
        ]);

        Client::create([
            'user_id' => $user->id,
            'tel' => $request->tel,
        ]);

        return redirect()->route('admin.clients')->with('success', 'Client ajouté.');
    }

    public function edit($id)
    {
        $clients = Client::with('user')->get();
        $client = Client::findOrFail($id);
        $editMode = true;

        return view('admin.adminClient', compact('clients', 'client', 'editMode'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'tel' => 'required'
        ]);

        $client = Client::findOrFail($id);
        $client->update(['tel' => $request->tel]);

        $client->user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email
        ]);

        return redirect()->route('admin.clients')->with('success', 'Client modifié.');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->user()->delete(); // Cela supprime aussi le client via la contrainte
        return redirect()->route('admin.clients')->with('success', 'Client supprimé.');
    }
}
