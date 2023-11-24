<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\owner;

class ownerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datosEjemplo = [
            [
                'name' => 'Juan Pérez',
                'phone_number' => '1234567890',
                'email' => 'juan@example.com',
            ],
            [
                'name' => 'samuel hernandez',
                'phone_number' => '+526121172745',
                'email' => 'maria@example.com',
            ],
            // Agrega más elementos de ejemplo aquí
        ];

        foreach ($datosEjemplo as $dato) {
            owner::create($dato);
        }
    }
}
