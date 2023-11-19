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
        'celular',
        'longitud',
        'latitud',
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function opcionesAlquiler()
    {
        return $this->belongsTo(Opciones_alquiler::class, 'opciones_alquiler_id');
    }

    public function alquilerAnticretico()
    {
        return $this->belongsTo(alquiler_anticretico::class, 'alquiler_anticretico_id');
    }
    public function recursos()
    {
        return $this->belongsToMany(Recursos::class, 'publicacion_recursos', 'publicacion_id', 'recurso_id');
    }
}
