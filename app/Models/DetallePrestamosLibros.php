<?php

namespace App\Models;

use App\Models\Configuration\Libro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePrestamosLibros extends Model
{
    use HasFactory;

    protected $fillable = [
        'prestamos_libros_id', 'libro_id', 'cantidad', 'comentarios', 'fecha_prestamo', 'fecha_devolucion'
    ];

    public function prestamo()
    {
        return $this->belongsTo(PrestamosLibro::class, 'prestamos_libros_id');
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}
