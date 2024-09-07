<?php

namespace App\Livewire\Configuracion;

use App\Models\Configuration\Carrera as ConfigurationCarrera;
use Livewire\Component;
use Illuminate\Validation\ValidationException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;

class Carrera extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public $openCreate= false;
    public $openEdit= false;
    public $carreraId;

    #[Validate]
    public $nombre ='';
    protected $listeners = ['confirmingDeleteCarrera'];

    public $confirmCarreraDeletion = false;
    public $password;

    public function rules()
    {
        return [
            'nombre' => 'required'
        ];
    }

    public function search()
    {
        $this->reset();
    }

    public function create()
    {
        $this->reset();
        $this->openCreate = true;
    }

    public function cancel()
    {
        $this->reset();
    }

    public function save()
    {
        $validated = $this->validate();

        ConfigurationCarrera::create($validated);

        $this->reset();

        $this->openCreate = false;
        $this->alert('success', 'Carrera creada satisfactoriamente.', [
            'position' => 'top-end',
            'timer' => '4000',
            'toast' => true,
            'width' => '500',
            'timerProgressBar' => true,
            'text' => '',
            'showConfirmButton' => false,
            'onConfirmed' => '',
            'showDenyButton' => false,
            'onDenied' => '',
        ]);
    }

    public function edit(ConfigurationCarrera $carrera)
    {
        $this->reset();
        $this->carreraId = $carrera->id;
        $this->nombre = $carrera->nombre;

        $this->openEdit = true;
    }

    public function update()
    {
        $validated = $this->validate();

        $carrera = ConfigurationCarrera::find($this->carreraId);
        $carrera->update($validated);

        $this->reset();

        $this->alert('success', 'Carrera actualizada satisfactoriamente.', [
            'position' => 'top-end',
            'timer' => '4000',
            'toast' => true,
            'width' => '500',
            'timerProgressBar' => true,
            'text' => '',
            'showConfirmButton' => false,
            'onConfirmed' => '',
            'showDenyButton' => false,
            'onDenied' => '',
        ]);
    }

    public function confirmDeleteCarrera($carreraId)
    {
        $this->resetErrorBag();
        $this->password = '';
        $this->carreraId = $carreraId;
        $this->confirmCarreraDeletion = true;
    }


    public function deleteCarrera()
    {
        $this->resetErrorBag();

        if (!Hash::check($this->password, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'password' => __('La contraseña no coincide con nuestros registros.'),
            ]);
        }

        $carrera = ConfigurationCarrera::find($this->carreraId);

        // Verificar si hay usuarios asociados
        // if ($carrera->users()->exists()) {
        //     $this->alert('error', 'No se puede eliminar la carrera porque hay usuarios asociados.', [
        //         'position' => 'top-end',
        //         'timer' => 4000,
        //         'toast' => true,
        //         'width' => '500',
        //         'timerProgressBar' => true,
        //     ]);
        //     return;
        // }

        $carrera->delete();

        $this->confirmCarreraDeletion = false;

        $this->alert('success', 'Carrera eliminado satisfactoriamente.', [
            'position' => 'top-end',
            'timer' => 4000,
            'toast' => true,
            'width' => '500',
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        $carreras = ConfigurationCarrera::where('nombre', 'like', '%' . $this->search . '%')
                                        ->orderBy($this->sort, $this->direction)
                                        ->paginate(8);

        return view('livewire.configuracion.carrera', compact('carreras'));
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
