<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function index()
    {
        return view('configuracion.subcategorias.index');
    }
}
