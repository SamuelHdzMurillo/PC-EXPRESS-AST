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
                'state' => 'Recibido',
                'device_type' => 'laptop',
                'brand' => 'hp',
                'damage' => 'mantenimiento , cliente refiere se le cayo',
                'accesories' => 'sin accesorios',
                'img' => 'imagen1.jpg',
                'model' => 'touch',
                'serial' => '1',
                'observations' => 'pantalla estrellada, inicia muy lento, sin cargador. sin cables, cliente solicita respaldo de informacion',
                'technican' => 'admin',
                'owner_id' => 3
            ],
            [
                'state' => 'Recibido',
                'device_type' => 'PC',
                'brand' => 'ACER',
                'damage' => 'NO PRENDE',
                'accesories' => 'NO TRAE',
                'img' => 'imagen2.jpg',
                'model' => 'AIO',
                'serial' => 'AIO1128',
                'observations' => 'equipo un dia no prendio',
                'technican' => 'admin',
                'owner_id' => 3
            ],
            [
                'state' => 'Terminado',
                'device_type' => 'Impresoras',
                'brand' => 'Epson',
                'damage' => 'Mantenimiento',
                'accesories' => 'SIN ACCESORIOAS',
                'img' => 'imagen2.jpg',
                'model' => 'L1110',
                'serial' => 'l11102823',
                'observations' => 'PARPADEA LUZ ROJA',
                'technican' => 'admin',
                'owner_id' => 4
            ],
            [
                'state' => 'Terminado',
                'device_type' => 'Impresoras',
                'brand' => 'EPSON',
                'damage' => 'ALMOHADILLAS',
                'accesories' => 'SIN ACCESORIOAS',
                'img' => 'imagen2.jpg',
                'model' => 'L3110',
                'serial' => 'L31102723',
                'observations' => 'ALMOHADILLAS',
                'technican' => 'admin',
                'owner_id' => 5
            ],
            // Agrega más elementos de ejemplo aquí
        ];
        foreach ($datosEjemplo as $dato) {
            device::create($dato);
        }

    
    }
}
