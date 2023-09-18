<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->text('descripcion');
            $table->unsignedBigInteger('usuario_id');
            $table->string('direccion', 200);
            $table->decimal('precio', 10, 2);
            $table->string('imagen', 191);
            $table->unsignedBigInteger('opciones_alquiler_id');
            $table->unsignedBigInteger('alquiler_anticretico_id');
            $table->timestamps();

            // Definir las relaciones
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('opciones_alquiler_id')->references('id')->on('opciones_alquiler');
            $table->foreign('alquiler_anticretico_id')->references('id')->on('alquiler_anticretico');
        });
        Schema::create('publicacion_recursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publicacion_id');
            $table->unsignedBigInteger('recurso_id');
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('publicacion_id')->references('id')->on('publicaciones')->onDelete('cascade');
            $table->foreign('recurso_id')->references('id')->on('recursos')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('publicacion_recursos');
        Schema::dropIfExists('publicaciones');
    }
};
