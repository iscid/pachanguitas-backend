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
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('servicio_id')
                ->constrained('servicios')
                ->restrictOnDelete();

            $table->foreignId('paquete_padre_id')
                ->nullable()
                ->constrained('paquetes')
                ->restrictOnDelete();

            $table->string('nombre', 100);
            $table->string('slug', 120);
            $table->text('descripcion')->nullable();

            $table->decimal('precio', 10, 2);
            $table->unsignedTinyInteger('duracion')->default(4);

            $table->unsignedInteger('orden')->default(0);
            $table->boolean('es_recomendado')->default(false);
            $table->boolean('activo')->default(true);

            $table->timestamps();

            $table->unique(['servicio_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquetes');
    }
};