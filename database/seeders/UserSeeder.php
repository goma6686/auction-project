<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $data = [
            'name' => 'teapot',
            'email' => 'judesysmail@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('demo'),
        ];

        User::create($data); //one admin
        User::factory(5)->create(); //5 random
    }
}
