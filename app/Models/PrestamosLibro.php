<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamosLibro extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'estatus', 'fecha_prestamo', 'fecha_devolucion'
    ];

    public function detalles()
    {
        return $this->hasMany(DetallePrestamosLibros::class, 'prestamos_libros_id');
    }
}
