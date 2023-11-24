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
                'name' => 'octavio lopez',
                'phone_number' => '+526121401985',
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
