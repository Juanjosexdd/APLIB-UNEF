<?php

namespace App\Livewire\Seguridad;

use App\Models\Seguridad\LogSistema;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class ShowLog extends Component
{

    use LivewireAlert;
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';


    public function render()
    {
        $logsistemas = LogSistema::where('user_id', 'like', '%' . $this->search . '%')
                            ->orWhere('tx_descripcion','like', '%' .$this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(8);
        return view('livewire.seguridad.show-log', compact('logsistemas'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }

        $this->sort = $sort;
    }
}
