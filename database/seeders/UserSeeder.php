<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'ADMIN',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'), // Recuerda que el password debe estar encriptado
            ],
            [
                'name' => 'samuel hernandez',
                'email' => 'beliko@gmail.com',
                'password' => bcrypt('belico123'),
            ],
            // Agrega más usuarios ficticios aquí
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
