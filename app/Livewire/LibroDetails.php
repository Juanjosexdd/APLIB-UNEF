<?php

namespace App\Livewire;

use App\Models\Configuration\Libro;
use Livewire\Component;

class LibroDetails extends Component
{

    public $libro;

    public function mount(Libro $libro)
    {
        $this->libro = $libro;
    }

    public function render()
    {
        return view('livewire.libro-details');
    }
}
