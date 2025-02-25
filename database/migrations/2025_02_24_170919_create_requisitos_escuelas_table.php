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
        Schema::create('requisitos_escuelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('escuela_id')->constrained('escuelas')->onDelete('cascade');
            $table->double('nota_minima')->default(70); // Nota mínima para aprobar
            $table->integer('min_invitados')->default(0); // Cantidad mínima de invitados
            $table->integer('min_asistencia')->default(80); // Porcentaje mínimo de asistencia
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitos_escuelas');
    }
};
