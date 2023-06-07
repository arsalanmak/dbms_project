<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $roles = [
            [
                'title'         => 'Admin',
                'description'   => 'admin',
                'status'        => 1
            ],
            [
                'title'         => 'Customer',
                'description'   => 'customer',
                'status'        => 1
            ],
            [
                'title'         => 'Driver',
                'description'   => 'driver',
                'status'        => 1
            ],
        ];

        foreach($roles as $role) {
            Role::create([
                'title' => $role['title'],
                'slug' => Str::slug($role['title']),
                'description' => $role['description'],
                'status' => $role['status']
            ]);
        }
    }
}
