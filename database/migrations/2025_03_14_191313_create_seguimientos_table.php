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
        Schema::create('grupos_seguimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->dateTime('fecha');
            $table->foreignId('red_id')->nullable()->constrained('redes')->onDelete('cascade'); // Relación con red
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
            $table->boolean('is_call_answer')->default(false);
            $table->boolean('is_current_visitor')->default(false);
            $table->boolean('is_in_cpz')->default(false);
            $table->boolean('is_back_to_church')->default(false);
            $table->boolean('had_number')->default(false);
            $table->boolean('is_phone_on')->default(false);
            $table->boolean('is_from_other_church')->default(false);
            $table->boolean('other')->default(false);
            $table->foreignId('telefonia_id')->nullable(true)->constrained('telefonias')->onDelete('cascade'); // Relación con telefonia
            $table->foreignId('consolidador_id')->nullable(true)->constrained('personas')->onDelete('cascade'); // Relación con telefonia
            $table->foreignId('grupo_seguimiento_id')->nullable(true)->constrained('grupos_seguimientos')->onDelete('cascade'); // Relación con telefonia
            $table->timestamps();
        });

        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->string('comentario');
            $table->foreignId('persona_seguimiento_id')->constrained('personas_seguimientos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
        Schema::dropIfExists('grupos_seguimientos');
        Schema::dropIfExists('personas_seguimientos');
    }
};
