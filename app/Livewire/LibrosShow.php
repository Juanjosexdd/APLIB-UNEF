<?php

namespace App\Livewire;

use App\Models\Configuration\Carrera;
use App\Models\Configuration\Categoria;
use App\Models\Configuration\Libro;
use App\Models\Configuration\Subcategoria;
use Livewire\Component;
use Livewire\WithPagination;

class LibrosShow extends Component
{

    use WithPagination;
    
    public function agregarAlCarrito($libroId)
    {
        $this->emit('agregarAlCarrito', $libroId);
    }

    public $subcategoria_id;
    public $carrera_id;
    public function render()
    {
        $carreras = Carrera::all();
        $subcategorias = Subcategoria::all();
        $libros = Libro::where('estatus', '=' ,'activo' )
                         ->subcategoria($this->subcategoria_id)
                         ->carrera($this->carrera_id)
                         ->latest('id')->paginate(8);

        return view('livewire.libros-show', compact('libros','subcategorias','carreras'));
    }

    public function resetfilters()
    {
        $this->reset(['subcategoria_id','carrera_id']);
    }

}
