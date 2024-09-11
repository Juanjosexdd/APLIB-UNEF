<?php

namespace App\Livewire\Configuracion;

use App\Models\Configuration\Carrera;
use App\Models\Configuration\Categoria;
use App\Models\Configuration\Libro;
use App\Models\Configuration\Subcategoria;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ShowLibros extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public $openCreate = false;
    public $openEdit = false;
    public $libroId;

    public $titulo = '';
    public $editorial = '';
    public $edicion = '';
    public $autor = '';
    public $serial = '';
    public $cota = '';
    public $cota_universal = '';
    public $nro_ejemplares = 1;
    public $procedencia = '';
    public $estatus = '';
    public $condicion = '';
    public $observacion = '';
    public $categoria_id = null;
    public $subcategoria_id = null;
    public $carrera_id = null;

    protected $listeners = ['confirmingDeleteLibro'];

    public $confirmLibroDeletion = false;
    public $password;

    public $subcategorias = [];
    public $categorias = [];
    public $carreras = [];

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'editorial' => 'nullable|string|max:255',
            'edicion' => 'nullable|string|max:255',
            'autor' => 'nullable|string|max:255',
            'serial' => 'nullable|string|max:255',
            'cota' => 'nullable|string|max:255',
            'cota_universal' => 'nullable|string|max:255',
            'nro_ejemplares' => 'required|integer|min:1',
            'procedencia' => 'nullable|string|max:255',
            'estatus' => 'nullable|string|max:255',
            'condicion' => 'nullable|string|max:255',
            'observacion' => 'nullable|string|max:1000',
            'categoria_id' => 'required|exists:categorias,id',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'carrera_id' => 'required|exists:carreras,id',
        ];
    }

    public function mount()
    {
        $this->categorias = Categoria::all();
        $this->carreras = Carrera::all();
        $this->subcategorias = collect();
    }

    public function updatedCategoriaId($value)
    {
        $this->subcategorias = Subcategoria::where('categoria_id', $value)->get();
        $this->subcategoria_id = null; // reset subcategory selection
    }

    public function create()
    {
        $this->reset();
        $this->resetValidation();
        $this->reset();
        $this->openCreate = true;
    }
    public function save()
    {
        $validatedData = $this->validate();

        // Obtener la primera letra de la carrera
        $letraCarrera = Carrera::find($this->carrera_id)->nombre[0];

        // Loop para crear los ejemplares y generar las cotas
        for ($i = 1; $i <= $this->nro_ejemplares; $i++) {
            $cota = $letraCarrera . str_pad($i, 1, '0', STR_PAD_LEFT) . $this->serial;

            // Crear el libro con la cota generada
            Libro::create(array_merge($validatedData, ['cota' => $cota]));
        }

        $this->openCreate = false;

        $this->reset();

        $this->alert('success', 'Libros registrados satisfactoriamente.', [
            'position' => 'top-end',
            'timer' => 4000,
            'toast' => true,
            'width' => '500',
            'timerProgressBar' => true,
        ]);
    }



    // public function save()
    // {
    //     $validatedData = $this->validate();

    //     Libro::create($validatedData);

    //     $this->openCreate = false;

    //     $this->reset();

    //     $this->alert('success', 'Libro registrado satisfactoriamente.', [
    //         'position' => 'top-end',
    //         'timer' => 4000,
    //         'toast' => true,
    //         'width' => '500',
    //         'timerProgressBar' => true,
    //     ]);
    // }

    public function edit(Libro $libro)
    {
        dd($libro);
        $this->resetValidation();
        $this->libroId = $libro->id;
        $this->titulo = $libro->titulo;
        $this->editorial = $libro->editorial;
        $this->edicion = $libro->edicion;
        $this->autor = $libro->autor;
        $this->serial = $libro->serial;
        $this->cota = $libro->cota;
        $this->cota_universal = $libro->cota_universal;
        $this->nro_ejemplares = $libro->nro_ejemplares;
        $this->procedencia = $libro->procedencia;
        $this->estatus = $libro->estatus;
        $this->condicion = $libro->condicion;
        $this->observacion = $libro->observacion;
        $this->categoria_id = $libro->categoria_id;
        $this->subcategoria_id = $libro->subcategoria_id;
        $this->carrera_id = $libro->carrera_id;

        // Llamar al método para cargar las subcategorías correspondientes
        $this->updatedCategoriaId($this->categoria_id);

        $this->openEdit = true;
    }


    public function update()
    {
        $validatedData = $this->validate();

        $libro = Libro::findOrFail($this->libroId);
        $libro->update($validatedData);

        $this->reset();

        $this->alert('success', 'Libro actualizado satisfactoriamente.', [
            'position' => 'top-end',
            'timer' => 4000,
            'toast' => true,
            'width' => '500',
            'timerProgressBar' => true,
        ]);
    }

    public function confirmDeleteLibro($libroId)
    {
        $this->resetErrorBag();
        $this->password = '';
        $this->libroId = $libroId;
        $this->confirmLibroDeletion = true;
    }

    public function deleteLibro()
    {
        $this->resetErrorBag();

        if (!Hash::check($this->password, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'password' => __('La contraseña no coincide con nuestros registros.'),
            ]);
        }

        $libro = Libro::findOrFail($this->libroId);
        $libro->delete();

        $this->confirmLibroDeletion = false;

        $this->alert('success', 'Libro eliminado satisfactoriamente.', [
            'position' => 'top-end',
            'timer' => 4000,
            'toast' => true,
            'width' => '500',
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        $libros = Libro::where('titulo', 'like', '%' . $this->search . '%')
            ->orWhere('cota','like', '%' .$this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(8);

        return view('livewire.configuracion.show-libros', compact('libros'));
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
