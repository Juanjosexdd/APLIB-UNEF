<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use App\Models\Seguridad\LogSistema;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de las categorias a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('configuracion.categorias.index');
    }
}
