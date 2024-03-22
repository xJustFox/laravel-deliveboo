<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userArray = [
            'utente1' => [
                'name' => 'Utente1',
                'email' => 'utente1@example.com',
                'password' => 'password1'
            ],
            'utente2' => [
                'name' => 'Utente2',
                'email' => 'utente2@example.com',
                'password' => 'password2'
            ],
            'utente3' => [
                'name' => 'Utente3',
                'email' => 'utente3@example.com',
                'password' => 'password3'
            ],
            'utente4' => [
                'name' => 'Utente4',
                'email' => 'utente4@example.com',
                'password' => 'password4'
            ],
            'utente5' => [
                'name' => 'Utente5',
                'email' => 'utente5@example.com',
                'password' => 'password5'
            ],
            'utente6' => [
                'name' => 'Utente6',
                'email' => 'utente6@example.com',
                'password' => 'password6'
            ],
            'utente7' => [
                'name' => 'Utente7',
                'email' => 'utente7@example.com',
                'password' => 'password7'
            ],
            'utente8' => [
                'name' => 'Utente8',
                'email' => 'utente8@example.com',
                'password' => 'password8'
            ],
            'utente9' => [
                'name' => 'Utente9',
                'email' => 'utente9@example.com',
                'password' => 'password9'
            ],
            'utente10' => [
                'name' => 'Utente10',
                'email' => 'utente10@example.com',
                'password' => 'password10'
            ]
        ];

        foreach ($userArray as $key => $value) {
            User::create([
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => Hash::make($value['password']),
            ]); 
        }

        
    }
}
