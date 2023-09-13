<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'KorisnikR',
               'email'=>'korisnikR@email.com',
               'role'=> 0,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'KorisnikCR',
               'email'=>'korisnikCR@email.com',
               'role'=> 1,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'KorisnikCRUD',
               'email'=>'korisnikCRUD@email.com',
               'role'=> 2,
               'password'=> bcrypt('12345678'),
            ],
            
        ];
    
        foreach ($users as $key => $user) 
        {
            User::create($user);
        }
    }
}
