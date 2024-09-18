<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class PrestamosLibro extends Model
{
    use HasFactory;
    use HasSlug;


    protected $fillable = [
        'user_id', 'estatus', 'fecha_prestamo', 'fecha_devolucion'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('id')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function detalles()
    {
        return $this->hasMany(DetallePrestamosLibros::class, 'prestamos_libros_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
