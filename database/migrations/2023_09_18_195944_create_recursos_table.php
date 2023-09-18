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
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->boolean('aguaCaliente');
            $table->boolean('wifi');
            $table->boolean('gasDomiciliario');
            $table->boolean('mascotas');
            $table->boolean('luz');
            $table->boolean('agua');
            $table->boolean('residenciaAdventista');
            $table->boolean('horaDeLlegada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursos');
    }
};
