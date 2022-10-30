<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin@gmail.com'),
            'role'     => true,
        ]);
        User::create([
            'name'     => 'user',
            'email'    => 'user@gmail.com',
            'password' => Hash::make('user@gmail.com'),
            'role'     => false,
        ]);
    }
}
