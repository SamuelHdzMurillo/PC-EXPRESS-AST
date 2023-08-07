<?php

namespace Database\Factories;

use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory
{
    protected $model = Device::class;

    public function definition()
    {
        return [
            'state' => 'inactivo',
            'device_type' => 'tableta',
            'brand' => 'Apple',
            'damage' => 'batería descargada',
            'accessories' => 'cargador',
            'img' => 'E35dherYrTI2fnf2i0Dqp8it4jvrZ5fqdwwKJjX0',
            'technician' => 'María Gómez',
            'owner_id' => 2
        ];
    }
}
