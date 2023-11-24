<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Update;
use App\Models\Device;

class UpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener algunos dispositivos existentes de la base de datos
        $devices = Device::all();

        // Crear 5 actualizaciones para cada dispositivo
        foreach ($devices as $device) {
            for ($i = 1; $i <= 5; $i++) {
                Update::create([
                    'title' => 'Lorem ipsum dolor sit amet ' . $i,
                    'description' => 'Lorem ipsum dolor sit amet',
                    'images' => 'image1.jpg',
                    'device_id' => $device->id,
                ]);
            }
        }
    }
}
