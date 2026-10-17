<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categoria = Categoria::firstOrCreate(
            ['slug' => 'stands-infantiles'],
            [
                'nombre' => 'Stands infantiles',
                'descripcion' => 'Experiencias y atracciones para fiestas infantiles.',
                'activo' => true
            ]
        );

        $servicios = [
            [
                'nombre' => 'Stand de burbujas',
                'descripcion_corta' => 'Una experiencia llena de burbujas, diversión y magia.',
            ],
            [
                'nombre' => 'Stand de Carritos Chocones',
                'descripcion_corta' => 'Diversión sobre ruedas con una pista de carritos chocones.'
            ],
            [
                'nombre' => 'Stand de carrera de Caballos de Madera',
                'descripcion_corta' => 'Carreras infantiles con caballitos de madera.'
            ],
            [
                'nombre' => 'Stand de Construcción',
                'descripcion_corta' => 'Una zona de juego para pequeños constructores.'
            ],

        ];

        foreach ($servicios as $datos) {
            Servicio::firstOrCreate(
                ['slug' => Str::slug($datos['nombre'])],
                [
                    'categoria_id' => $categoria->id,
                    'nombre' => $datos['nombre'],
                    'descripcion_corta' => $datos['descripcion_corta'],
                    'duracion' => 4,
                    'orden' => 0,
                    'destacado' => false,
                    'activo' => true
                ]
            );
        }
    }
}