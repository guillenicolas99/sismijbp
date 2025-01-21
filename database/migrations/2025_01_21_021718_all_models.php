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
            $table->id('id_categoria');
            $table->string('nombre')->nullable(false);
            $table->timestamps();
        });

        Schema::create('eventos', function (Blueprint $table) {
            $table->id('id_evento');
            $table->string('nombre')->nullable(false);
            $table->dateTime('fecha')->nullable(false);
            $table->timestamps();
        });
        
        Schema::create('nivel_liderazgos', function (Blueprint $table) {
            $table->id('id_nivel_liderazgo'); // Esto crea una columna "bigint unsigned"
            $table->string('nombre')->nullable(false);
            $table->timestamps();
        });        

        Schema::create('reds', function (Blueprint $table) {
            $table->id('id_red')->unsigned(); // Aseguramos que sea UNSIGNED
            $table->string('nombre')->nullable(false);
            $table->timestamps();
        });
        
        Schema::create('personas', function (Blueprint $table) {
            $table->id('id_persona');
            $table->string('nombre')->nullable(false);
            $table->foreignId('id_red')->constrained('reds', 'id_red')->cascadeOnDelete();
            $table->foreignId('id_nivel_liderazgo')->constrained('nivel_liderazgos', 'id_nivel_liderazgo')->cascadeOnDelete();
            $table->timestamps();
        });        

        Schema::create('tickets', function (Blueprint $table) {
            $table->id('id_ticket')->unsigned(); // Aseguramos que sea UNSIGNED
            $table->string('codigo');
            $table->double('abono')->nullable();
            $table->double('precio')->nullable(false);
            $table->double('descuento')->nullable();
            $table->dateTime('fecha_descuento')->nullable();
            $table->string('estado');
            $table->foreignId('id_evento')->constrained('eventos', 'id_evento')->cascadeOnDelete();
            $table->foreignId('id_categoria')->constrained('categorias', 'id_categoria')->cascadeOnDelete();
            $table->foreignId('id_persona')->nullable()->constrained('personas', 'id_persona')->nullOnDelete(); // Permitir 'nullable' está bien si una persona no siempre se asigna
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
        Schema::dropIfExists('nivel_liderazgos');
        Schema::dropIfExists('reds');
        Schema::dropIfExists('personas');
        Schema::dropIfExists('tickets');
    }
};
