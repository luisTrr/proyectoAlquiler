<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opciones_alquiler extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_opcion',
    ];

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'opciones_alquiler_id');
    }
}
