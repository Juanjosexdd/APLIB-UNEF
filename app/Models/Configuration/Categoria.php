<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $guarded = ['id','deleted_at','updated_at'];

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }

}
