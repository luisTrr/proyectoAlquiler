<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publicaciones extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'usuario_id',
        'direccion',
        'precio',
        'imagen',
        'opciones_alquiler_id',
        'alquiler_anticretico_id',
    ];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function opcionesAlquiler()
    {
        return $this->belongsTo(OpcionAlquiler::class, 'opciones_alquiler_id');
    }

    public function alquilerAnticretico()
    {
        return $this->belongsTo(AlquilerAnticretico::class, 'alquiler_anticretico_id');
    }
    public function recursos()
    {
        return $this->belongsToMany(Recurso::class, 'publicacion_recursos', 'publicacion_id', 'recurso_id');
    }
}
