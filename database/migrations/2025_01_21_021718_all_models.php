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
            $table->string('nombre')->nullable(false)->unique();
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

        // 1️⃣ Crear tabla redes
        Schema::create('redes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 2️⃣ Crear tabla personas
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('genero', ['M', 'F'])->nullable(false);
            $table->string('telefono')->unique();
            $table->string('cedula')->unique()->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_baptized')->default(false);
            $table->boolean('is_single')->default(true);
            $table->foreignId('red_id')->nullable()->constrained('redes')->onDelete('set null'); // Relación con Red
            $table->foreignId('titulo_id')->nullable()->constrained('titulos')->onDelete('set null'); // Relación con Red
            $table->timestamps();
        });

        // 3️⃣ Agregar líderes a redes (ya que ahora la tabla personas existe)
        Schema::table('redes', function (Blueprint $table) {
            $table->foreignId('lider_de_red_id')->nullable()->constrained('personas')->onDelete('set null');
            $table->foreignId('lider_de_red_2_id')->nullable()->constrained('personas')->onDelete('set null');
        });

        // 4️⃣ Crear tabla discipulados
        Schema::create('discipulados', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->foreignId('red_id')->nullable()->constrained('redes')->onDelete('cascade'); // Relación con Red
            $table->timestamps();
        });

        // 5️⃣ Agregar relación discipulado a personas
        Schema::table('personas', function (Blueprint $table) {
            $table->foreignId('discipulado_id')->nullable()->constrained('discipulados')->onDelete('set null');
        });

        // 6️⃣ Agregar líderes a discipulados
        Schema::table('discipulados', function (Blueprint $table) {
            $table->foreignId('mentor_1_id')->nullable()->constrained('personas')->onDelete('set null');
            $table->foreignId('mentor_2_id')->nullable()->constrained('personas')->onDelete('set null');
        });

        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique()->nullable(false);
            $table->timestamps();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique()->nullable(false);
            $table->double('abono')->nullable();
            $table->double('precio')->nullable(false);
            $table->double('descuento')->nullable();
            $table->dateTime('fecha_descuento')->nullable();
            $table->foreignId('estado_id')->constrained('estados')->onDelete('cascade');
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
