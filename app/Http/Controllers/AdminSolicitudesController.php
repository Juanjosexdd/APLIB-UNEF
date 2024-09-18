<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSolicitudesController extends Controller
{
    public function index()
    {
        return view('configuracion.solicitudes.index');
    }
}
