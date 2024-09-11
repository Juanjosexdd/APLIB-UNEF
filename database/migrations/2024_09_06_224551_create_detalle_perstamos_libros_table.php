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
        Schema::create('detalle_prestamos_libros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prestamos_libros_id'); // Nombre correcto de la columna
            $table->foreign('prestamos_libros_id')->references('id')->on('prestamos_libros')->onDelete('cascade');

            $table->unsignedBigInteger('libro_id');
            $table->foreign('libro_id')->references('id')->on('libros')->onDelete('cascade');

            $table->string('cantidad');
            $table->string('comentarios')->nullable();

            $table->timestamp('fecha_prestamo');
            $table->timestamp('fecha_devolucion');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_perstamos_libros');
    }
};
