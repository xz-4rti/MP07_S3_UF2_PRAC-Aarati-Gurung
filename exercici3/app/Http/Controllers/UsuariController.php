<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariController extends Controller
{
    public function index()
    {
        $usuaris = DB::table('usuaris')
            ->join('comandas', 'usuaris.id', '=', 'comandas.usuari_id')
            ->select('usuaris.nom', DB::raw('COUNT(comandas.id) as total_comandes'))
            ->groupBy('usuaris.nom')
            ->havingRaw('COUNT(comandas.id) > 0')
            ->get();

        return view('usuaris.index', compact('usuaris'));
    }
}
