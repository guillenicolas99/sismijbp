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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->string('comentario');
            $table->timestamps();
        });

        Schema::create('grupo_seguimiento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->dateTime('fecha');
            $table->timestamps();
        });

        Schema::create('personas_seguimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono')->unique();
            $table->dateTime('fecha');
            $table->integer('edad');
            $table->enum('genero', ['M', 'F'])->nullable(false);
            $table->string('direccion');
            $table->string('correo')->unique();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_baptized')->default(false);
            $table->foreignId('telefonia_id')->nullable()->constrained('telefonias')->onDelete('cascade'); // Relación con telefonia
            $table->foreignId('comentario_id')->nullable()->constrained('comentarios')->onDelete('cascade'); // Relación con telefonia
            $table->foreignId('persona_id')->nullable()->constrained('personas')->onDelete('cascade'); // Relación con telefonia
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
        Schema::dropIfExists('grupo_seguimiento');
        Schema::dropIfExists('personas_seguimientos');
    }
};
