<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Los URIs que deberían excluirse de la verificación CSRF.
     *
     * @var array
     */
    protected $except = [
        'crear-publicacion',
        'actualizar-publicacion',
        'eliminar-publicacion',
        'opciones_alquiler', // Ruta a excluir de la verificación CSRF
    ];
}
