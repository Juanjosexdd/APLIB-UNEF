<?php

namespace App\Livewire\Configuracion;

use App\Models\Configuration\Categoria;
use Livewire\Component;
use Illuminate\Validation\ValidationException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;


class Catagoria extends Component
{

    use LivewireAlert;
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public $openCreate= false;
    public $openEdit= false;
    public $categoriaId;

    #[Validate]
    public $nombre ='', $descripcion='';
    protected $listeners = ['confirmingDeleteCategoria'];

    public $confirmCategoriaDeletion = false;
    public $password;

    public function rules()
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required'
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

        Categoria::create($validated);

        $this->reset();

        $this->openCreate = false;
        $this->alert('success', 'Categoria registrado satisfactoriamente.', [
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

    public function edit(Categoria $categoria)
    {
        $this->reset();
        $this->categoriaId = $categoria->id;
        $this->nombre = $categoria->nombre;
        $this->descripcion = $categoria->descripcion;

        $this->openEdit = true;
    }

    public function update()
    {
        $validated = $this->validate();

        $categoria = Categoria::find($this->categoriaId);
        $categoria->update($validated);

        $this->reset();

        $this->alert('success', 'Categoria actualizada satisfactoriamente.', [
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

    public function confirmDeleteCategoria($categoriaId)
    {
        $this->resetErrorBag();
        $this->password = '';
        $this->categoriaId = $categoriaId;
        $this->confirmCategoriaDeletion = true;
    }


    public function deleteCategoria()
    {
        $this->resetErrorBag();

        if (!Hash::check($this->password, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'password' => __('La contraseña no coincide con nuestros registros.'),
            ]);
        }

        $categoria = Categoria::find($this->categoriaId);

        // Verificar si hay usuarios asociados
        // if ($categoria->users()->exists()) {
        //     $this->alert('error', 'No se puede eliminar la categoria porque hay usuarios asociados.', [
        //         'position' => 'top-end',
        //         'timer' => 4000,
        //         'toast' => true,
        //         'width' => '500',
        //         'timerProgressBar' => true,
        //     ]);
        //     return;
        // }

        $categoria->delete();

        $this->confirmCategoriaDeletion = false;

        $this->alert('success', 'Categoria eliminado satisfactoriamente.', [
            'position' => 'top-end',
            'timer' => 4000,
            'toast' => true,
            'width' => '500',
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        $categorias = Categoria::where('nombre', 'like', '%' . $this->search . '%')
                            ->orWhere('descripcion','like', '%' .$this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(8);

        return view('livewire.configuracion.catagoria', compact('categorias'));

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
