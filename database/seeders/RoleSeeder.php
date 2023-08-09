<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
// reset cache roles dan permission
app()[PermissionRegistrar::class]->forgetCachedPermissions();

class RoleSeeder extends Seeder
{

    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
    }
}
