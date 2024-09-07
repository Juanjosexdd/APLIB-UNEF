<?php

namespace App\View\Components;

use App\Models\Configuration\Carrera;
use App\Models\Configuration\Categoria;
use App\Models\Configuration\Libro;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {

        // Obtén los datos que deseas pasar a la vista
        $categorias = Categoria::all();
        $carreras = Carrera::all();
        $libros = Libro::all();

        // Pasa los datos a la vista welcome
        return view('layouts.guest', compact('categorias','carreras','libros'));
    }
}
