<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PrestamosLibro;
use Livewire\WithPagination;

class AdminSolicitudes extends Component
{
    use WithPagination;

    public $search = '';
    public $estatus;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function actualizarEstatus($solicitudId, $nuevoEstatus)
    {
        $solicitud = PrestamosLibro::find($solicitudId);

        if ($solicitud) {
            $solicitud->estatus = $nuevoEstatus;
            $solicitud->save();

            session()->flash('message', 'Estatus actualizado correctamente.');
        } else {
            session()->flash('error', 'Error al actualizar el estatus.');
        }
    }

    public function render()
    {
        $solicitudes = PrestamosLibro::where('user_id', 'like', '%' . $this->search . '%')
            ->orWhereHas('user', function($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.admin-solicitudes', compact('solicitudes'));
    }
}
