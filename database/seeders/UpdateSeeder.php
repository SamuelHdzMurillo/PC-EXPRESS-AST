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

        // Crear actualizaciones para cada dispositivo
        foreach ($devices as $device) {
            Update::create([
                'description' => 'Lorem ipsum dolor sit amet',
                'images' => ['image1.jpg', 'image2.jpg'],
                'device_id' => $device->id,
            ]);
        }
    }
}
