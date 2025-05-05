<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function showSignupForm(){
        return view('insc');
    }



    public function create(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'MotDePasse' => 'required|string|min:6',
            'tel' => 'required|string|max:20',
        ]);


        $user =User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'MotDePasse' => $request->MotDePasse,
            'admin' => false,
        ]);

        Client::create([
            'user_id' => $user->id,
            'tel' => $request->tel,
        ]);
        return redirect()->route('login')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
    }
}
