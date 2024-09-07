<?php

namespace App\Models\Configuration;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];


    public function libros()
    {
        return $this->hasMany(Libro::class);
    }

}
