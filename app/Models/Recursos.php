<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    use HasFactory;
    protected $table = 'recursos';
    protected $fillable = [
        'aguaCaliente',
        'wifi',
        'gasDomiciliario',
        'mascotas',
        'luz',
        'agua',
        'residenciaAdventista',
        'horaDeLlegada',
    ];

    protected $casts = [
        'aguaCaliente' => 'boolean',
        'wifi' => 'boolean',
        'gasDomiciliario' => 'boolean',
        'mascotas' => 'boolean',
        'luz' => 'boolean',
        'agua' => 'boolean',
        'residenciaAdventista' => 'boolean',
        'horaDeLlegada' => 'boolean',
    ];
    public function publicaciones()
    {
        return $this->belongsToMany(Publicacion::class, 'publicacion_recursos', 'recurso_id', 'publicacion_id');
    }
}
