<?php

namespace App\Http\Livewire;

use App\Models\Configuration\Libro;
use Livewire\Component;

class Carrito extends Component
{
    public $items = [];

    protected $listeners = [
        'agregarAlCarrito' => 'agregarAlCarrito',
    ];

    public function agregarAlCarrito($libroId)
    {
        // Agrega el libro al carrito
        $this->items[] = $libroId;
    }

    public function removerDelCarrito($index)
    {
        // Elimina un libro del carrito
        unset($this->items[$index]);
        $this->items = array_values($this->items); // Re-indexar el array
    }

    public function render()
    {
        return view('livewire.carrito', [
            'libros' => Libro::whereIn('id', $this->items)->get(),
        ]);
    }
}
