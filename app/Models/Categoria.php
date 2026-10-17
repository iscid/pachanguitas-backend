<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Servicio;

class Categoria extends Model
{
    // Campos de la tabla
    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'imagen',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    public function servicios(): HasMany
    {
        return $this->hasMany(Servicio::class);
    }
}
