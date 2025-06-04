<?php

namespace App\Http\Controllers;

use App\Models\ServiceClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceClientController extends Controller
{
    /**
     * Affiche le formulaire de contact
     */
    public function showContactForm()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $message = new ServiceClient();
        $message->titre = $validatedData['titre'];
        $message->message = $validatedData['message'];
        $message->user_id = Auth::id(); // null si non connecté

        $message->save();

        return redirect()->back()->with('success', 'Message envoyé avec succès!');
    }

    /**
     * Affiche les messages pour l'admin
     */


    public function destroy(ServiceClient $message)
    {
        $message->delete();
        return redirect()->route('admin.messages')->with('success', 'Message supprimé avec succès');
    }

    public function index()
{
    $messages = ServiceClient::with('user')->latest()->paginate(10);
    return view('admin.adminContact', compact('messages'));
}


    public function show(ServiceClient $message)
    {
        if (!$message->read_at) {
            $message->update(['read_at' => now()]);
        }
        return view('admin.messageShow', compact('message')); // Correspond à messageShow.blade.php
    }
}
