<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Libro extends Model
{
    use HasFactory;
    use HasProfilePhoto;
    use HasSlug;

    protected $guarded = [
        'id','created_at','updated_at'
    ];


    protected $appends = [
        'profile_photo_url',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('titulo')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Query scope
    public function scopeSubcategoria($query, $subcategoria_id)
    {
        if ($subcategoria_id) {
            return $query->where('subcategoria_id', $subcategoria_id);
        }
    }
    public function scopeCarrera($query, $carrera_id)
    {
        if ($carrera_id) {
            return $query->where('carrera_id', $carrera_id);
        }
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }
}
