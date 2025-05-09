<?php

namespace App\Http\Controllers;

use App\Models\Avis;

class AdminAvisController extends Controller
{
    public function index()
    {
        $avis = Avis::with('client.user')->latest()->get();
        return view('admin.adminAvis', compact('avis'));
    }

    public function destroy($id)
    {
        $avis = Avis::findOrFail($id);
        $avis->delete();

        return redirect()->route('admin.avis')->with('success', 'Avis supprimé avec succès.');
    }
}
