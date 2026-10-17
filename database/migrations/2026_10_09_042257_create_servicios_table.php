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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('categoria_id')
                ->constrained('categorias')
                ->restrictOnDelete();

            $table->string('nombre', 150);
            $table->string('slug', 170)->unique();
            $table->string('descripcion_corta', 255)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen_principal')->nullable();
            $table->unsignedTinyInteger('duracion')->default(4);
            $table->unsignedTinyInteger('capacidad')->nullable();
            $table->unsignedTinyInteger('orden')->default(0);
            $table->boolean('destacado')->default(false);
            $table->boolean('activo')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
