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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false)->unique();
            $table->timestamps();
        });

        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false);
            $table->dateTime('date')->nullable(false);
            $table->timestamps();
        });

        Schema::create('titulos', function (Blueprint $table) {
            $table->id(); // Esto crea una columna "bigint unsigned"
            $table->string('nombre')->nullable(false)->unique();
            $table->timestamps();
        });

        Schema::create('redes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique();
            $table->timestamps();
        });

        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false);
            $table->string('telefono')->nullable(false)->unique();
            $table->string('cedula')->unique()->nullable(false);
            $table->foreignId('red_id')->constrained('redes')->onDelete('cascade');
            $table->foreignId('titulo_id')->constrained('titulos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); // Aseguramos que sea UNSIGNED
            $table->string('codigo')->unique();
            $table->double('abono')->nullable();
            $table->double('precio')->nullable(false);
            $table->double('descuento')->nullable();
            $table->dateTime('fecha_descuento')->nullable();
            $table->string('estado');
            $table->foreignId('evento_id')->constrained('eventos')->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('persona_id')->nullable()->constrained('personas')->nullOnDelete(); // Permitir 'nullable' está bien si una persona no siempre se asigna
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('eventos');
        Schema::dropIfExists('titulos');
        Schema::dropIfExists('redes');
        Schema::dropIfExists('personas');
        Schema::dropIfExists('tickets');
    }
};
