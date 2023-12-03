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
                'name' => 'OCTAVIO LOPEZ',
                'phone_number' => '+526121401985',
                'email' => 'juan@example.com',
            ],
            [
                'name' => 'SAMUEL HERNANDEZ',
                'phone_number' => '+526121172745',
                'email' => 'maria@example.com',
            ],
            [
                'name' => 'ELISA JIMENEZ',
                'phone_number' => '+526121981476',
                'email' => '',
            ],
            [
                'name' => 'ELVIRA TORRES',
                'phone_number' => '+526121071829',
                'email' => '',
            ],
            [
                'name' => 'MARTIN VENTURA',
                'phone_number' => '+526121007640',
                'email' => '',
            ],
            
            // Agrega más elementos de ejemplo aquí
        ];

        foreach ($datosEjemplo as $dato) {
            owner::create($dato);
        }
    }
}
