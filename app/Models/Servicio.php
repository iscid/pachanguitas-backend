<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicio extends Model
{
    //
    protected $fillable = [
        'categoria_id',
        'nombre',
        'slug',
        'descripcion_corta',
        'descripcion',
        'imagen_principal',
        'duracion',
        'capacidad',
        'orden',
        'destacado',
        'activo'
    ];

    protected $casts = [
        'duracion' => 'integer',
        'capacidad' => 'integer',
        'orden' => 'integer',
        'destacado' => 'boolean',
        'activo' => 'boolean'
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function paquetes(): HasMany
    {
        return $this->hasMany(Paquete::class);
    }
}
