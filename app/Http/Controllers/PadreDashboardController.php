<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PadreDashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $padre */
        $padre = User::find(Auth::id());

        // Obtenemos los hijos, si no hay, devolvemos colección vacía
        $hijos = $padre ? $padre->hijos()->with('consumos.producto')->get() : collect();

        return view('dashboard.padre', compact('padre', 'hijos'));
    }
}
