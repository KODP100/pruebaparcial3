<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categoria;
use Illuminate\Database\Seeder;

class categoriaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array('nombre' => 'Mueble', 'descripcion' => 'nujm', 'cantidad' => 60),
            array('nombre' => 'Computadora', 'descripcion' => 'nujm', 'cantidad' => 50),
            array('nombre' => 'Cocina', 'descripcion' => 'nujm', 'cantidad' => 10),
            array('nombre' => 'Televisor', 'descripcion' => 'nujm', 'cantidad' => 30),
            array('nombre' => 'Celulares', 'descripcion' => 'nujm', 'cantidad' => 50),
            array('nombre' => 'Comedor', 'descripcion' => 'nujm', 'cantidad' => 20),
        ];
        Categoria::insert($data);
    }
}
