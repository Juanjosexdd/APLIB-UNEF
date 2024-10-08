<?php

namespace App\Livewire\Seguridad;

use App\Models\Seguridad\Login;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSesiones extends Component
{

    use LivewireAlert;
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';


    public function render()
    {

        $logs = Login::where('user_id', 'like', '%' . $this->search . '%')
                            ->orWhere('ip_address','like', '%' .$this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(8);
        return view('livewire.seguridad.show-sesiones', compact('logs'));
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
