<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //para crear un solo usuario con credenciales

        User::create([
            'name' => 'Edwin Castillo',
            'email'=> 'admin@example.com',
            'password'=> bcrypt('admin')
        ])->assignRole('Admin');
        // crear datos falsos
        User::factory(99)->create();
    }
}
