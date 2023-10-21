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
        Schema::create('guardar_publicacions_intermedia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('guardar_publicacions_id');
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('guardar_publicacions_id')->references('id')->on('guardar_publicacions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardar_publicacions_intermedia');
    }
};
