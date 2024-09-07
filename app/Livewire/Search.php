<?php

namespace App\Livewire;

use App\Models\Configuration\Libro;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $open = false;

    public function updatedSearch($value)
    {
        if ($value) {
            $this->open = true;
        }else {
            $this->open = false;

        }
    }

    public function render()
    {
        $libros = Libro::where('titulo', 'LIKE', "%" . $this->search . "%")
            // ->where('estatus', 2)
            ->take(8)
            ->get();

        return view('livewire.search', compact('libros'));
    }
}


