<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'adminuser',
            'password' => bcrypt('adminpassword'),
            'role' => User::ROLE_ADMIN,
        ]);

        User::create([
            'username' => 'regularuser',
            'password' => bcrypt('userpassword'),
            'role' => User::ROLE_USER,
        ]);

        // Tambahkan pengguna lain dengan role yang sesuai
    }
}
