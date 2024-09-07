<?php

namespace App\Livewire\Configuracion;

use App\Models\Configuration\Categoria;
use Livewire\Component;

use App\Models\Configuration\Subcategoria as Subcategorias;
use Illuminate\Validation\ValidationException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;

class Subcategoria extends Component
{

    use LivewireAlert;
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public $openCreate= false;
    public $openEdit= false;
    public $subcategoriaId;
    public $categorias=[];

    #[Validate]
    public $nombre ='', $descripcion='', $categoria_id;
    protected $listeners = ['confirmingDeleteSubcategoria'];

    public $confirmSubcategoriaDeletion = false;
    public $password;

    public function mount()
    {
        $this->categorias = Categoria::all();
    }
    public function rules()
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required|exists:categorias,id' // Añadir validación para categoria_id
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

        Subcategorias::create($validated);

        $this->reset();

        $this->openCreate = false;
        $this->alert('success', 'Subcategoria registrado satisfactoriamente.', [
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

    public function edit(Subcategorias $subcategoria)
    {
        $this->reset();
        $this->subcategoriaId = $subcategoria->id;
        $this->nombre = $subcategoria->nombre;
        $this->descripcion = $subcategoria->descripcion;
        $this->categoria_id = $subcategoria->categoria_id; // Añadir categoria_i

        $this->openEdit = true;
    }

    public function update()
    {
        $validated = $this->validate();

        $subcategoria = Subcategorias::find($this->subcategoriaId);
        $subcategoria->update($validated);

        $this->reset();

        $this->alert('success', 'Subcategoria actualizada satisfactoriamente.', [
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

    public function confirmDeleteSubcategoria($subcategoriaId)
    {
        $this->resetErrorBag();
        $this->password = '';
        $this->subcategoriaId = $subcategoriaId;
        $this->confirmSubcategoriaDeletion = true;
    }


    public function deleteSubcategoria()
    {
        $this->resetErrorBag();

        if (!Hash::check($this->password, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'password' => __('La contraseña no coincide con nuestros registros.'),
            ]);
        }

        $subcategoria = Subcategorias::find($this->subcategoriaId);

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

        $subcategoria->delete();

        $this->confirmSubcategoriaDeletion = false;

        $this->alert('success', 'Subcategoria eliminado satisfactoriamente.', [
            'position' => 'top-end',
            'timer' => 4000,
            'toast' => true,
            'width' => '500',
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        $subcategorias = Subcategorias::where('nombre', 'like', '%' . $this->search . '%')
                            ->orWhere('descripcion','like', '%' .$this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(8);

        return view('livewire.configuracion.subcategoria', compact('subcategorias'));

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
