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
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password123'), // Recuerda que el password debe estar encriptado
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => bcrypt('securepassword'),
            ],
            // Agrega más usuarios ficticios aquí
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
