<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique()->nullable(false);
            $table->timestamps();
        });

        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false);
            $table->string('image_path')->nullable();
            $table->dateTime('fecha');
            $table->boolean('is_active')->nullable(false);
            $table->timestamps();
        });

        Schema::create('titulos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique()->nullable(false);
            $table->timestamps();
        });

        Schema::create('redes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique()->nullable(false);
            $table->boolean('is_active');
            $table->string('lider_de_red')->unique()->nullable();
            $table->timestamps();
        });

        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false);
            $table->string('genero')->nullable(false);
            $table->string('telefono')->unique()->nullable(false);
            $table->string('cedula')->unique()->nullable();
            $table->boolean('is_active');
            $table->foreignId('red_id')->nullable()->constrained('redes')->onDelete('cascade');
            $table->foreignId('titulo_id')->nullable()->constrained('titulos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique()->nullable(false);
            $table->double('abono')->nullable();
            $table->double('precio')->nullable(false);
            $table->double('descuento')->nullable();
            $table->dateTime('fecha_descuento')->nullable();
            $table->string('estado');
            $table->foreignId('evento_id')->constrained('eventos')->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('persona_id')->nullable()->constrained('personas')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('escuelas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nombre')->unique();
            $table->string('image_path')->nullable();
            $table->boolean('is_active');
            $table->foreignId('escuela_anterior_id')->nullable()->constrained('escuelas')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('retiros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('image_path')->nullable();
            $table->date('fecha');
            $table->text('descripcion')->nullable();
            $table->foreignId('escuela_id')->constrained('escuelas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique()->nullable(false);
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->boolean('is_active');
            $table->foreignId('escuela_id')->constrained('escuelas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('grupo_persona', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo_id')->constrained('grupos')->onDelete('cascade');
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grupo_persona');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('retiros');
        Schema::dropIfExists('escuelas');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('personas');
        Schema::dropIfExists('redes');
        Schema::dropIfExists('titulos');
        Schema::dropIfExists('eventos');
        Schema::dropIfExists('categorias');
    }
};
