<?php

namespace App\Http\Controllers;

use App\Models\Configuration\Carrera;
use App\Models\Configuration\Categoria;
use App\Models\Configuration\Libro;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        return view('welcome');
    }
}
