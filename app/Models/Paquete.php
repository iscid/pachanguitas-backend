<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paquete extends Model
{
    //
    protected $fillable = [
        'servicio_id',
        'paquete_padre_id',
        'nombre',
        'slug',
        'descripcion',
        'precio',
        'duracion',
        'orden',
        'es_recomendado',
        'activo',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'duracion' => 'integer',
        'orden' => 'integer',
        'es_recomendado' => 'boolean',
        'activo' => 'boolean',
    ];

    public function servicio(): BelongsTo
    {
        return $this->belongsTo(Servicio::class);
    }

    public function paquetePadre(): BelongsTo
    {
        return $this->belongsTo(
            Paquete::class,
            'paquete_padre_id'
        );
    }

    public function mejoras(): HasMany
    {
        return $this->hasMany(
            Paquete::class,
            'paquete_padre_id'
        );
    }
}