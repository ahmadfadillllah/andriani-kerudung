<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            'username' => 'owner',
            'name' => 'Owner',
            'statusenabled' => true,
            'email' => 'owner@gmail.com',
            'password' => Hash::make('Owner123@'),
            'no_hp' => '085213067944',
            'role' => 'owner',
            'avatar' => 'user.png',
            'tipe' => 'vip'
        ]);
    }
}
