<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $table = 'subcategorias';

    protected $guarded = ['id','deleted_at','updated_at'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
