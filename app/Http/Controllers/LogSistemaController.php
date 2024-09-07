<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogSistemaController extends Controller
{

    public function index()
    {
        return view('seguridad.logs.index');
    }
}
