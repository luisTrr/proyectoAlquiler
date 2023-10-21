<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guardarPublicacion extends Model
{
    use HasFactory;
    protected $table = 'guardar_publicacions';
    protected $fillable = ['publicacion_id'];
    protected $casts = ['publicacion_id' => 'integer'];
    public function publicaciones()
    {
        return $this->belongsToMany(Publicaciones::class, 'guardar_publicacions_intermedia', 'usuario_id', 'guardar_publicacions_id');
    }
}
