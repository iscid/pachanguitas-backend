<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create([
            'nombre' => 'Administrador',
            'descripcion' => 'Acceso completo al sistema.'
        ]);

        Role::create([
            'nombre' => 'Editor',
            'descripcion' => 'Acceso a la administración de contenido.'
        ]);
    }
}
