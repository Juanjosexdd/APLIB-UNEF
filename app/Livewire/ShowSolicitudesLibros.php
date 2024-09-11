<?php

namespace App\Livewire;

use App\Models\PrestamosLibro;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSolicitudesLibros extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $missolicitudes = PrestamosLibro::where('user_id', auth()->user()->id)
                ->where(function($query) {
                    $query->where('estatus', 'like', '%' . $this->search . '%')
                          ->orWhere('id', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate(10);

        return view('livewire.show-solicitudes-libros', compact('missolicitudes'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
