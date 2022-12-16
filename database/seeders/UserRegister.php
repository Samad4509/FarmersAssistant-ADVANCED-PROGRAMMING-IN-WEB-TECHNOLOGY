<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserRegister extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            ['firstname'=>'Rafie','lastname'=>'Robie','username'=>'Rafi1000','email'=>'abscd@gmail.com','Password'=>'123456','gender'=>'male','city'=>'Dhaka','postalCode'=>'1229','address'=>'Dhaka','phone'=>'01791779238']

            ];
            User::insert($users);
    }
}
