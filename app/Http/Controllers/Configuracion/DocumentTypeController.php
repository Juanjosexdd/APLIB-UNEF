<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    public function index()
    {

        return view('configuracion.tipodocumentos.index');
    }
}
