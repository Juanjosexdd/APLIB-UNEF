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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug');
            $table->string('editorial');
            $table->string('edicion');
            $table->string('autor');
            $table->string('serial');
            $table->string('cota');
            $table->string('cota_universal');
            $table->string('nro_ejemplares');
            $table->string('procedencia');
            $table->string('estatus');
            $table->string('condicion');
            $table->string('observacion');
            $table->foreignId('subcategoria_id')->constrained();
            $table->foreignId('carrera_id')->constrained();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
