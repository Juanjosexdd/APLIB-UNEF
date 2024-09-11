<?php

namespace App\Livewire;

use App\Models\Configuration\Libro;
use Livewire\Component;
use App\Models\PrestamosLibro;
use App\Models\DetallePrestamosLibros;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MiSolicitudLibros extends Component
{
    public $librosDisponibles;
    public $librosSeleccionados = [];
    public $selectedLibro;
    public $cantidad = 1;
    public $fechaPrestamo;
    public $fechaDevolucion;
    public $observacionProducto = '';
    public $observacionGeneral = '';
    public $fechaMinimaDevolucion;
    public $fechaMaximaDevolucion;

    const MAX_LIBROS = 3;

    public function mount()
    {
        $this->librosDisponibles = Libro::all();

        // Inicializar con la fecha de hoy
        $this->fechaPrestamo = now()->toDateString();
        $this->actualizarRangoFechasDevolucion($this->fechaPrestamo);
    }

    public function updatedFechaPrestamo($value)
    {
        $this->actualizarRangoFechasDevolucion($value);
    }

    private function actualizarRangoFechasDevolucion($fecha)
    {
        $this->fechaMinimaDevolucion = Carbon::parse($fecha)->addDay()->toDateString();
        $this->fechaMaximaDevolucion = Carbon::parse($fecha)->addDays(3)->toDateString();

        if (is_null($this->fechaDevolucion) || $this->fechaDevolucion < $this->fechaMinimaDevolucion || $this->fechaDevolucion > $this->fechaMaximaDevolucion) {
            $this->fechaDevolucion = $this->fechaMinimaDevolucion;
        }
    }

    public function agregarLibro()
    {
        if (!$this->selectedLibro) return;

        if (count($this->librosSeleccionados) >= self::MAX_LIBROS) {
            session()->flash('message', 'No se pueden solicitar más de ' . self::MAX_LIBROS . ' libros.');
            return;
        }

        foreach ($this->librosSeleccionados as $libro) {
            if ($libro['id'] == $this->selectedLibro) {
                session()->flash('message', 'Ya ha agregado este libro.');
                return;
            }
        }

        $libro = Libro::find($this->selectedLibro);

        $this->librosSeleccionados[] = [
            'id' => $libro->id,
            'titulo' => $libro->titulo,
            'cantidad' => 1,
            'observacion' => $this->observacionProducto
        ];

        $this->reset(['selectedLibro', 'cantidad', 'observacionProducto']);
    }

    public function eliminarLibro($index)
    {
        unset($this->librosSeleccionados[$index]);
        $this->librosSeleccionados = array_values($this->librosSeleccionados);
    }

    public function guardarSolicitud()
    {
        // Verificar que al menos haya un libro seleccionado
        if (empty($this->librosSeleccionados)) {
            session()->flash('message', 'Debe seleccionar al menos un libro para solicitar.');
            return;
        }

        $this->validate([
            'fechaPrestamo' => 'required|date|after_or_equal:today',
            'fechaDevolucion' => 'required|date|after_or_equal:fechaPrestamo|before_or_equal:' . Carbon::parse($this->fechaPrestamo)->addDays(3)->toDateString(),
        ]);

        try {
            // Crear el registro del préstamo de libros
            $prestamo = PrestamosLibro::create([
                'user_id' => Auth::id(),
                'estatus' => 'Pendiente',
                'fecha_prestamo' => $this->fechaPrestamo,
                'fecha_devolucion' => $this->fechaDevolucion,
            ]);

            // Guardar los detalles de cada libro seleccionado
            foreach ($this->librosSeleccionados as $libro) {
                DetallePrestamosLibros::create([
                    'prestamos_libros_id' => $prestamo->id,
                    'libro_id' => $libro['id'],
                    'cantidad' => $libro['cantidad'],
                    'comentarios' => $libro['observacion'],
                    'fecha_prestamo' => $this->fechaPrestamo,
                    'fecha_devolucion' => $this->fechaDevolucion,
                ]);
            }

            // Resetear el formulario
            $this->reset(['librosSeleccionados', 'observacionGeneral', 'fechaPrestamo', 'fechaDevolucion']);
            session()->flash('message', 'Solicitud guardada correctamente.');
        } catch (\Exception $e) {
            // Mostrar error detallado en la consola del navegador
            session()->flash('error', 'Hubo un error al guardar la solicitud. Por favor, intenta de nuevo.');
            logger()->error('Error al guardar la solicitud: ' . $e->getMessage());
        }
    }


    public function cancelar()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.mi-solicitud-libros');
    }
}
