<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\device;

class deviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  
        $datosEjemplo = [
            [
                'state' => 'activo',
                'device_type' => 'teléfono',
                'brand' => 'Samsung',
                'damage' => 'pantalla rota',
                'accesories' => 'cargador, auriculares',
                'img' => 'imagen1.jpg',
                'model' => 'predator x21x',
                'observations' => 'visagras bien',
                'technican' => 'Juan Pérez',
                'owner_id' => 1
            ],
            [
                'state' => 'inactivo',
                'device_type' => 'tableta',
                'brand' => 'Apple',
                'damage' => 'batería descargada',
                'accesories' => 'cargador',
                'img' => 'imagen2.jpg',
                'model' => 'predator x21x',
                'observations' => 'visagras bien',
                'technican' => 'María Gómez',
                'owner_id' => 2
            ],
            // Agrega más elementos de ejemplo aquí
        ];
        foreach ($datosEjemplo as $dato) {
            device::create($dato);
        }

    
    }
}
