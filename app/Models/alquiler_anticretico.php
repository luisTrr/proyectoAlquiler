<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alquiler_anticretico extends Model
{
    use HasFactory;
    protected $table = 'alquiler_anticretico';
    protected $fillable = [
        'estadoPublicacion',
    ];
    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'alquiler_anticretico_id');
    }
}
