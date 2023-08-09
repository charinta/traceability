<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

$admin = User::create([
    'username' => 'Admin',
    'npk' => '123',
    'pos_name' => 'washing',
    'role' => 'admin',
    'password' => bcrypt('admin123'),
]);

$admin->assignRole('admin');

$user = User::create([
    'username' => 'User',
    'npk' => '133',
    'pos_name' => 'washing',
    'role' => 'user',
    'password' => bcrypt('user123'),
]);

$user->assignRole('user');
