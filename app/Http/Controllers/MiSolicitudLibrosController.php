<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiSolicitudLibrosController extends Controller
{
    public function index(){

        return view('mi-solicitud-libros.index');
    }
}
