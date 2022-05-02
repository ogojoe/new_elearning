<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::create([
            "name"=>"Gonzalo Ochoa",
            "email"=>"ogojoe@gmail.com",
            "password"=>bcrypt("12345678")
        ]);

        $user->assignRole('Admin');

        $user = User::create([
            "name"=>"Eduardo",
            "email"=>"eduardo@test.com",
            "password"=>bcrypt("12345678")
        ]);

        $user->assignRole('Admin');

        /* $user = User::create([
            "name"=>"Pedro",
            "email"=>"pedro@gmail.com",
            "password"=>bcrypt("12345678")
        ]);

        $user->assignRole('Docente');

        $user = User::create([
            "name"=>"Daniel",
            "email"=>"daniel@gmail.com",
            "password"=>bcrypt("12345678")
        ]);

        $user->assignRole('Alumno');

        User::factory(30)->create(); */
    }
}
