<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'          => 'Arsalan',
                'email'         => 'arsalan.g20696@iqra.edu.pk',
                'password'      => Hash::make('password'),
                'role'          => 1
            ]
        ];

        foreach($users as $user) {
            if(!User::where('email', $user['email'])->first()){
                $newUser = User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                ]);
                $newUser->roles()->attach($user['role']);
            }
        }
    }
}
